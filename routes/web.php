<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/video-testimonials', [PageController::class, 'videoTestimonials'])->name('video-testimonials');
Route::get('/treatments/{category}', [PageController::class, 'treatmentCategory'])->name('treatments.category');
Route::get('/services/{category}/{slug}', [PageController::class, 'service'])->name('service.detail');

// Auth Routes
Auth::routes();

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Gallery
    Route::resource('gallery', GalleryController::class)->except(['show']);

    // Blogs
    Route::resource('blogs', BlogController::class)->except(['show']);

    // Appointments
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])->name('appointments.status');
    Route::delete('/appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])->name('appointments.destroy');
});
