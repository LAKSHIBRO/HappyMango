<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use App\Models\TourItinerary;
use App\Models\Category; // Added Category model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourPackageController extends Controller
{
    public function index()
    {
        $tourPackages = TourPackage::orderBy('created_at', 'desc')->get();
        $totalPackages = TourPackage::count();
        return view('backend.pages.tour_package.index', compact('tourPackages', 'totalPackages'));
    }

    public function create()
    {
        // Fetch 'Tour' categories (ID 1) that are active (status_id 1), ordered by name
        $categories = Category::where('category_type_id', 1)
                                ->where('status_id', 1) // Assuming 1 is for active status
                                ->orderBy('name')
                                ->get();
        return view('backend.pages.tour_package.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            // First, validate the incoming request data
            $request->validate($this->getValidationRules());

            // Handle main tour package image upload with proper naming
            $imageName = time() . '-' . Str::slug($request->name) . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('tour_packages', $imageName, 'public');

            // Handle gallery images upload
            $galleryImagePaths = [];
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $key => $galleryFile) {
                    $galleryImageName = time() . '-' . Str::slug($request->name) . '-gallery-' . ($key + 1) . '.' . $galleryFile->extension();
                    $path = $galleryFile->storeAs('tour_packages/gallery', $galleryImageName, 'public');
                    $galleryImagePaths[] = $path;
                }
            }

            // Create tour package
            $tourPackage = TourPackage::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'type' => $request->type,
                'price' => $request->price,
                'duration' => $request->duration,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'image' => $imagePath,
                'locations' => $request->locations,
                'category_id' => $request->category_id,
                'people_count' => $request->people_count ?? 0,
                'gallery_images' => $galleryImagePaths,
                'included' => $request->included,
                'excluded' => $request->excluded,
                'featured' => $request->has('featured'),
                'active' => $request->has('active'),
            ]);

            // Sort the itinerary by day number to ensure correct order
            $itinerary = collect($request->itinerary)->sortBy('day')->values()->all();

            // Create tour itinerary for each day
            foreach ($itinerary as $index => $day) {
                $itineraryImagePath = null;

                // Handle itinerary day image if provided
                if (isset($day['image']) && $day['image']) {
                    $itineraryImageName = time() . '-' . Str::slug($request->name) . '-day-' . $day['day'] . '.' . $day['image']->extension();
                    $itineraryImagePath = $day['image']->storeAs('tour_itineraries', $itineraryImageName, 'public');
                }

                // Create the itinerary record
                TourItinerary::create([
                    'tour_package_id' => $tourPackage->id,
                    'day' => $day['day'],
                    'title' => $day['title'],
                    'location' => $day['location'],
                    'description' => $day['description'],
                    'image' => $itineraryImagePath,
                ]);
            }

            return redirect()->route('admin.tour_packages')->with('success', 'Tour package created successfully!');

        } catch (\Exception $e) {
            // Log the error and return with a user-friendly message
            \Log::error('Error creating tour package: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'There was a problem creating the tour package: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $tourPackage = TourPackage::with('itinerary')->findOrFail($id);
        // Fetch 'Tour' categories (ID 1) that are active (status_id 1), ordered by name
        $categories = Category::where('category_type_id', 1)
                                ->where('status_id', 1) // Assuming 1 is for active status
                                ->orderBy('name')
                                ->get();
        return view('backend.pages.tour_package.edit', compact('tourPackage', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate($this->getValidationRules(true));

            $tourPackage = TourPackage::findOrFail($id);

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($tourPackage->image) {
                    Storage::disk('public')->delete($tourPackage->image);
                }
                // Store with better naming
                $imageName = time() . '-' . Str::slug($request->name) . '.' . $request->file('image')->extension();
                $imagePath = $request->file('image')->storeAs('tour_packages', $imageName, 'public');
            } else {
                $imagePath = $tourPackage->image;
            }

            // Handle gallery images update
            $galleryImagePaths = $tourPackage->gallery_images ?? [];

            // Remove selected gallery images
            if ($request->has('remove_gallery_images')) {
                foreach ($request->remove_gallery_images as $imagePathToRemove) {
                    if (in_array($imagePathToRemove, $galleryImagePaths)) {
                        Storage::disk('public')->delete($imagePathToRemove);
                        $galleryImagePaths = array_diff($galleryImagePaths, [$imagePathToRemove]);
                    }
                }
            }

            // Add new gallery images
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $key => $galleryFile) {
                    $galleryImageName = time() . '-' . Str::slug($request->name) . '-gallery-new-' . ($key + 1) . '.' . $galleryFile->extension();
                    $path = $galleryFile->storeAs('tour_packages/gallery', $galleryImageName, 'public');
                    $galleryImagePaths[] = $path;
                }
            }

            // Update tour package
            $tourPackage->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'type' => $request->type,
                'price' => $request->price,
                'duration' => $request->duration,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'image' => $imagePath,
                'locations' => $request->locations,
                'category_id' => $request->category_id,
                'people_count' => $request->people_count ?? 0,
                'gallery_images' => array_values($galleryImagePaths), // Re-index array
                'included' => $request->included,
                'excluded' => $request->excluded,
                'featured' => $request->has('featured'),
                'active' => $request->has('active'),
            ]);

            // Get existing itinerary item IDs
            $existingItineraryIds = $tourPackage->itinerary->pluck('id')->toArray();
            $updatedItineraryIds = [];

            // Sort the itinerary by day number to ensure correct order
            $itinerary = collect($request->itinerary)->sortBy('day')->values()->all();

            // Update existing itinerary items and create new ones
            foreach ($itinerary as $day) {
                if (isset($day['id'])) {
                    // Update existing itinerary item
                    $itinerary = TourItinerary::find($day['id']);

                    if ($itinerary) {
                        $itineraryImagePath = $itinerary->image;

                        // Handle image upload if a new image is provided
                        if (isset($day['image']) && $day['image']) {
                            // Delete the old image if it exists
                            if ($itinerary->image) {
                                Storage::disk('public')->delete($itinerary->image);
                            }
                            // Store with better naming
                            $itineraryImageName = time() . '-' . Str::slug($request->name) . '-day-' . $day['day'] . '.' . $day['image']->extension();
                            $itineraryImagePath = $day['image']->storeAs('tour_itineraries', $itineraryImageName, 'public');
                        }

                        $itinerary->update([
                            'day' => $day['day'],
                            'title' => $day['title'],
                            'location' => $day['location'],
                            'description' => $day['description'],
                            'image' => $itineraryImagePath,
                        ]);

                        $updatedItineraryIds[] = $itinerary->id;
                    }
                } else {
                    // Create new itinerary item
                    $itineraryImagePath = null;
                    if (isset($day['image']) && $day['image']) {
                        $itineraryImageName = time() . '-' . Str::slug($request->name) . '-day-' . $day['day'] . '.' . $day['image']->extension();
                        $itineraryImagePath = $day['image']->storeAs('tour_itineraries', $itineraryImageName, 'public');
                    }

                    $newItinerary = TourItinerary::create([
                        'tour_package_id' => $tourPackage->id,
                        'day' => $day['day'],
                        'title' => $day['title'],
                        'location' => $day['location'],
                        'description' => $day['description'],
                        'image' => $itineraryImagePath,
                    ]);

                    $updatedItineraryIds[] = $newItinerary->id;
                }
            }

            // Delete itinerary items that were not updated or created
            $removedItineraryIds = array_diff($existingItineraryIds, $updatedItineraryIds);
            foreach ($removedItineraryIds as $itineraryId) {
                $itinerary = TourItinerary::find($itineraryId);
                if ($itinerary) {
                    // Delete the image if it exists
                    if ($itinerary->image) {
                        Storage::disk('public')->delete($itinerary->image);
                    }
                    $itinerary->delete();
                }
            }

            return redirect()->route('admin.tour_packages')->with('success', 'Tour package updated successfully!');

        } catch (\Exception $e) {
            // Log the error and return with a user-friendly message
            \Log::error('Error updating tour package: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'There was a problem updating the tour package: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $tourPackage = TourPackage::findOrFail($id);

            // Delete associated itinerary images
            foreach ($tourPackage->itinerary as $itinerary) {
                if ($itinerary->image) {
                    Storage::disk('public')->delete($itinerary->image);
                }
            }

            // Delete tour package image
            if ($tourPackage->image) {
                Storage::disk('public')->delete($tourPackage->image);
            }

            // Delete gallery images
            if ($tourPackage->gallery_images) {
                foreach ($tourPackage->gallery_images as $galleryImage) {
                    Storage::disk('public')->delete($galleryImage);
                }
            }


            // Delete associated itinerary items
            $tourPackage->itinerary()->delete();

            // Delete the tour package
            $tourPackage->delete();

            return redirect()->route('admin.tour_packages')->with('success', 'Tour package deleted successfully!');

        } catch (\Exception $e) {
            \Log::error('Error deleting tour package: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete tour package: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $tourPackage = TourPackage::with(['itinerary' => function($query) {
                $query->orderBy('day', 'asc');
            }])->findOrFail($id);

            return view('backend.pages.tour_package.show', compact('tourPackage'));
        } catch (\Exception $e) {
            return redirect()->route('admin.tour_packages')
                ->with('error', 'Tour package not found or cannot be displayed.');
        }
    }

    /**
     * Get the validation rules for tour package data
     *
     * @param bool $isUpdate Whether this is an update (image not required)
     * @return array
     */
    private function getValidationRules($isUpdate = false)
    {
        $imageRule = $isUpdate ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';

        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:tailor-made,round-tour',
            'price' => 'required|numeric',
            'duration' => 'required|string|max:100',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'image' => $imageRule,
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // For new gallery images
            'category_id' => 'nullable|exists:categories,id',
            'people_count' => 'nullable|integer|min:0',
            'locations' => 'required|string',
            'included' => 'required|array',
            'included.*' => 'required|string',
            'excluded' => 'required|array',
            'excluded.*' => 'required|string',
            'featured' => 'boolean',
            'active' => 'boolean',
            'itinerary' => 'required|array',
            'itinerary.*.day' => 'required|integer|min:1',
            'itinerary.*.title' => 'required|string|max:255',
            'itinerary.*.location' => 'required|string|max:255',
            'itinerary.*.description' => 'required|string',
            'itinerary.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }
}