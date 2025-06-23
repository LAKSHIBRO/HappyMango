<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\GalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(Request $request)
    {

        $rows = $request->input('rows');

        // Changed GalleryImages to Album to list actual albums
        $albums = Album::with('category')->orderBy('created_at', 'desc')->paginate($rows ?? 10);
        $totalAlbums = Album::count();

        return view('backend.pages.gallery.index')->with('datas', $albums)
            ->with('totalAlbums', $totalAlbums);
    }

    public function create()
    {
        $category = Category::where('category_type_id', '2')
            ->where('status_id', '1')
            ->get();

        return view('backend.pages.gallery.create')->with('categories', $category);
    }

    public function edit($id)
    {
        $album = Album::find($id);
        $galleryImages = GalleryImages::where('album_id', $id)->get();
        $category = Category::where('category_type_id', '2')
            ->where('status_id', '1')
            ->get();
        return view('backend.pages.gallery.edit')->with('album', $album)->with('galleryImages', $galleryImages)->with('categories', $category);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'status_id' => 'required|in:0,1',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a jpeg, png, jpg, gif, or webp file.',
            'category_id.required' => 'The category field is required.',
            'status_id.required' => 'The visibility field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageFilename = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFilename = hash('sha256', uniqid() . '_' . $imageFile->getClientOriginalName()) . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads/album/'), $imageFilename);
        }

        Album::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')), // Auto-generate slug
            'caption' => $request->input('caption'),
            'image' => $imageFilename,
            'category_id' => $request->input('category_id'),
            'status_id' => $request->input('status_id'),
        ]);

        return redirect()->route('admin.gallery')->with('success', 'Gallery item created successfully.');
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:albums,slug,' . $album->id,
            'caption' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Image is not required on update
            'category_id' => 'required|exists:categories,id',
            'status_id' => 'required|in:0,1',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // For AJAX response, which the original JS might expect
            // return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
            // For standard form submission:
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageFilename = $album->image;
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($album->image) {
                $oldImagePath = public_path('uploads/album/' . $album->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            // Upload new image
            $imageFile = $request->file('image');
            $imageFilename = hash('sha256', uniqid() . '_' . $imageFile->getClientOriginalName()) . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads/album/'), $imageFilename);
        } elseif ($request->input('remove_existing_image') == '1' && $album->image) {
            // Handle explicit image removal if a checkbox `remove_existing_image` is added to the form
            $oldImagePath = public_path('uploads/album/' . $album->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            $imageFilename = null;
        }


        $album->update([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('slug')), // Ensure slug is updated if title/slug changes
            'caption' => $request->input('caption'),
            'image' => $imageFilename,
            'category_id' => $request->input('category_id'),
            'status_id' => $request->input('status_id'),
        ]);

        // The original edit form used JavaScript `updateAlbum(id)` which implies AJAX.
        // If sticking to AJAX, this response is fine.
        // return response()->json(['success' => true, 'message' => 'Album updated successfully.']);
        // For standard form submission:
        return redirect()->route('admin.gallery')->with('success', 'Gallery item updated successfully.');
    }

    public function delete($id)
    {
        // This delete method was deleting GalleryImages, not Albums.
        // It should be changed to delete an Album and its associated image.
        $album = Album::find($id);

        if ($album) {
            if (!empty($album->image)) {
                $filePath = public_path('uploads/album/' . $album->image);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
            $album->delete();
            return redirect()->route('admin.gallery')->with('success', 'Gallery item deleted successfully.');
            // return response()->json(['success' => true, 'message' => 'Gallery item deleted successfully.']);
        }
        return redirect()->route('admin.gallery')->with('error', 'Gallery item not found.');
        // return response()->json(['success' => false, 'message' => 'Gallery item not found.']);
    }
}
