<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\RegisterController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\InquiryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\VideoController;
use Illuminate\Support\Facades\Route;


Route::middleware(['AsAGuest'])->group(function () {
    Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/admin/login', [LoginController::class, 'login']);

    Route::get('/admin/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/admin/register', [RegisterController::class, 'register']);
});

Route::middleware(['AlreadyLoggedIn'])->group(function () {

    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::post('/admin/save-category', [CategoryController::class, 'store']);
    Route::get('/admin/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/admin/update-category', [CategoryController::class, 'update']);
    Route::get('/admin/delete-category/{id}', [CategoryController::class, 'delete']);


    Route::get('/admin/blog', [PostController::class, 'index']);
    Route::get('/admin/blog/create', [PostController::class, 'create']);
    Route::post('/admin/save-blog', [PostController::class, 'store']);
    Route::get('/admin/edit-blog/{id}', [PostController::class, 'edit']);
    Route::post('/admin/update-blog/{id}', [PostController::class, 'update']);
    Route::get('/admin/delete-blog/{id}', [PostController::class, 'delete']);


    Route::get('/admin/gallery', [GalleryController::class, 'index']);
    Route::get('/admin/gallery/create', [GalleryController::class, 'create']);
    Route::post('/admin/save-gallery', [GalleryController::class, 'store']);
    Route::get('/admin/edit-gallery/{id}', [GalleryController::class, 'edit']);
    Route::post('/admin/update-gallery/{id}', [GalleryController::class, 'update']);
    Route::get('/admin/delete-gallery/{id}', [GalleryController::class, 'delete']);


    // VIDEO ROUTES
    Route::get('/admin/video', [VideoController::class, 'index']);
    Route::get('/admin/video/create', [VideoController::class, 'create']);
    Route::post('/admin/save-video', [VideoController::class, 'store']);
    Route::get('/admin/edit-video/{id}', [VideoController::class, 'edit']);
    Route::post('/admin/update-video/{id}', [VideoController::class, 'update']);
    Route::get('/admin/delete-video/{id}', [VideoController::class, 'delete']);

    // TOUR PACKAGE ROUTES
    Route::get('/admin/tour-packages', [App\Http\Controllers\Backend\TourPackageController::class, 'index'])->name('admin.tour_packages');
    Route::get('/admin/tour-package/create', [App\Http\Controllers\Backend\TourPackageController::class, 'create'])->name('admin.tour_package.create');
    Route::post('/admin/save-tour-package', [App\Http\Controllers\Backend\TourPackageController::class, 'store'])->name('admin.tour_package.store');
    Route::get('/admin/tour-package/edit/{id}', [App\Http\Controllers\Backend\TourPackageController::class, 'edit'])->name('admin.tour_package.edit');
    Route::post('/admin/update-tour-package/{id}', [App\Http\Controllers\Backend\TourPackageController::class, 'update'])->name('admin.tour_package.update');
    Route::get('/admin/tour-package/delete/{id}', [App\Http\Controllers\Backend\TourPackageController::class, 'delete'])->name('admin.tour_package.delete');

    // INQUIRY ROUTES
    Route::get('/admin/inquiries', [InquiryController::class, 'index'])->name('admin.inquiries');
    Route::get('/admin/inquiry/create', [InquiryController::class, 'create'])->name('admin.inquiry.create');
    Route::post('/admin/inquiry', [InquiryController::class, 'store'])->name('admin.inquiry.store');
    Route::get('/admin/inquiry/{id}', [InquiryController::class, 'show'])->name('admin.inquiry.show');
    Route::get('/admin/inquiry/{id}/edit', [InquiryController::class, 'edit'])->name('admin.inquiry.edit');
    Route::post('/admin/inquiry/{id}/update', [InquiryController::class, 'update'])->name('admin.inquiry.update');
    Route::post('/admin/inquiry/{id}/delete', [InquiryController::class, 'destroy'])->name('admin.inquiry.destroy');
    Route::post('/admin/inquiry/{id}/status', [InquiryController::class, 'updateStatus'])->name('admin.inquiry.status');


    Route::get('/admin/profile', [ProfileController::class, 'edit']);
    Route::post('/save-profile/update-details/{userId}', [ProfileController::class, 'updateDetails']);
    Route::post('/save-profile/update-password/{userId}', [ProfileController::class, 'updatePassword']);
});