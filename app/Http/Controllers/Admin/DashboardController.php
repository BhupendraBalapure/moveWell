<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalContacts = Contact::count();
        $unreadContacts = Contact::where('is_read', false)->count();
        $totalGallery = Gallery::count();
        $totalBlogs = Blog::count();

        return view('admin.dashboard', compact('totalContacts', 'unreadContacts', 'totalGallery', 'totalBlogs'));
    }
}
