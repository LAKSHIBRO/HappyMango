<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\GalleryImages;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    public function home()
    {
        $tailorMadeTours = TourPackage::where('type', 'tailor-made')
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $roundTours = TourPackage::where('type', 'round-tour')
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        return view('frontend.pages.new_home', compact('tailorMadeTours', 'roundTours'));
    }

    public function about()
    {
        return view('frontend.pages.new_about');
    }

    public function service()
    {
        $tourPackages = TourPackage::where('active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $tailorMadeTours = TourPackage::where('type', 'tailor-made')
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $roundTours = TourPackage::where('type', 'round-tour')
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $featuredTours = TourPackage::where('featured', true)
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        return view('frontend.pages.new_service', compact('tourPackages', 'tailorMadeTours', 'roundTours', 'featuredTours'));
    }

    public function contact()
    {
        return view('frontend.pages.new_contact');
    }
    public function gallery()
    {
        // Changed to use Album model and paginate
        $galleries = \App\Models\Album::where('status_id', 1) // Assuming status_id 1 is visible
            ->orderBy('created_at', 'desc')
            ->paginate(9); // Paginate by 9 items per page, adjust as needed

        // The view name was 'frontend.pages.new_gallery', assuming 'frontend.pages.gallery' is the one we are targeting.
        // If 'new_gallery' is different, changes need to be applied there too.
        // For now, proceeding with 'frontend.pages.gallery' as the target based on previous edits.
        return view('frontend.pages.gallery', compact('galleries'));
    }

    public function blog(Request $request)
    {

        $type = $request->input('type');

        if ($type) {
            $category = Category::where('name', $type)->first();

            $categoryIds = Category::where('category_type_id', '1')->where('id', $category->id)->pluck('id');
            $posts = Post::whereIn('category_id', $categoryIds)->limit(10)->get();
            $allPosts = Post::whereIn('category_id', $categoryIds)->get();
        } else {
            $categoryIds = Category::where('category_type_id', '1')->pluck('id');
            $posts = Post::whereIn('category_id', $categoryIds)->limit(10)->get();
            $allPosts = Post::whereIn('category_id', $categoryIds)->get();
        }


        $types = Category::where('category_type_id', 1)->get();
        return view('frontend.pages.new_blog', compact('posts', 'types', 'allPosts'));
    }

    public function loardMoreBlogs(Request $request)
    {

        $count = (int) $request->count;

        $type = $request->type ?? null;

        if ($type) {
            $category = Category::where('name', $type)->first();

            if (!$category) {
                return redirect('/');
            }

            $categoryIds = Category::where('category_type_id', '1')->where('id', $category->id)->pluck('id');
            $posts = Post::whereIn('category_id', $categoryIds);
            $allPosts = Post::whereIn('category_id', $categoryIds)->get();
        } else {
            $categoryIds = Category::where('category_type_id', '1')->pluck('id');
            $posts = Post::whereIn('category_id', $categoryIds);
            $allPosts = Post::whereIn('category_id', $categoryIds)->get();
        }
        $posts = $posts->limit($count + 10)->get();

        $hasMore = ($count + 10) < count($allPosts);


        $data = [
            'success' => true,
            'message' => 'success',
            'html' => view('frontend.components.blog.new_load_more_blogs', compact('posts', 'hasMore'))->render(),
            'count' => $count
        ];

        return response()->json($data, 200);
    }

    public function loardMoreGallery(Request $request)
    {

        $count = (int) $request->count;

        $galleries = GalleryImages::limit($count + 10)->get();

        $allGalleries = GalleryImages::all();

        $hasMore = ($count + 10) < count($allGalleries);

        $data = [
            'success' => true,
            'message' => 'success',
            'html' => view('frontend.components.gallery.new_load_more_galleries', compact('galleries', 'hasMore'))->render(),
            'count' => $count
        ];
        return response()->json($data, 200);
    }

    public function blogDetail($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $recentPosts = Post::where('id', '!=', $post->id)->latest()->limit(3)->get();
        $categories = Category::where('category_type_id', 1)->get();

        return view('frontend.pages.new_blog_detail', compact('post', 'recentPosts', 'categories'));
    }
}