<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $blogs = Blog::where('is_published', true)->latest('published_at')->take(3)->get();
        $galleries = Gallery::where('is_active', true)->orderBy('sort_order')->latest()->take(6)->get();
        return view('pages.home', compact('blogs', 'galleries'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function blogs()
    {
        $blogs = Blog::where('is_published', true)->latest('published_at')->get();
        return view('pages.blogs', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedBlogs = Blog::where('is_published', true)->where('id', '!=', $blog->id)->where('category', $blog->category)->take(3)->get();
        return view('pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

    public function gallery()
    {
        $galleries = Gallery::where('is_active', true)->orderBy('sort_order')->latest()->get();
        return view('pages.gallery', compact('galleries'));
    }

    public function videoTestimonials()
    {
        return view('pages.video-testimonials');
    }

    public function treatmentCategory($category)
    {
        $categoryTitles = [
            'knee' => 'Knee Treatments',
            'shoulder' => 'Shoulder Treatments',
            'hip' => 'Hip Treatments',
            'elbow' => 'Elbow Treatments',
            'ankle' => 'Ankle Treatments',
            'wrist' => 'Wrist Treatments',
        ];

        if (!array_key_exists($category, $categoryTitles)) {
            abort(404);
        }

        $title = $categoryTitles[$category];
        $services = collect(config('services_data'))->where('category', $category)->values()->all();

        return view('pages.treatment-category', compact('category', 'title', 'services'));
    }

    public function service($category, $slug)
    {
        $services = config('services_data');
        $service = collect($services)->where('category', $category)->where('slug', $slug)->first();

        if (!$service) {
            abort(404);
        }

        $relatedServices = collect($services)->where('category', $category)->where('slug', '!=', $slug)->values()->all();

        return view('pages.service-detail', compact('service', 'relatedServices', 'category'));
    }
}
