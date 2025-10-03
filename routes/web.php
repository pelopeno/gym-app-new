<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ActivityLogController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('guest.homepage');
})->name('homepage');

Route::prefix('guest')->group(function () {
    Route::get('/about', function () {
        return view('guest.about');
    })->name('guest.about');

    Route::get('/join', function () {
        return view('guest.join');
    })->name('guest.join');

    Route::get('/plans', function () {
        return view('guest.plans');
    })->name('guest.plans');

    Route::get('/classes', function () {
        return view('guest.classes');
    })->name('guest.classes');
});

Route::middleware([
    'auth',
    'role:user',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::get('/users/reviews', [ReviewController::class, 'index'])->name('user.show');

    Route::get('/users/create', [ReviewController::class, 'create'])->name('user.create');

    Route::post('/users/store', [ReviewController::class, 'store'])->name('user.store');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/posts', [AnnouncementController::class, 'index'])->name('admin.posts.index');
        Route::get('/posts/add', [AnnouncementController::class, 'addPost'])->name('admin.posts.add');
        Route::post('/posts/store', [AnnouncementController::class, 'storePost'])->name('admin.posts.store');
        Route::get('/posts/edit/{id}', [AnnouncementController::class, 'editPost'])->name('admin.posts.edit');
        Route::put('/posts/update/{id}', [AnnouncementController::class, 'updatePost'])->name('admin.posts.update'); 
        Route::delete('/posts/destroy/{id}', [AnnouncementController::class, 'deletePost'])->name('admin.posts.delete');
        Route::get('/pending-reviews', [ReviewController::class, 'Reviews'])->name('admin.reviews.index');
        Route::post('/reviews/approve/{id}', [ReviewController::class, 'approveReview'])->name('admin.reviews.approve'); 
        Route::post('/reviews/rejected/{id}', [ReviewController::class, 'rejectReview'])->name('admin.reviews.reject'); 
        Route::post('/announcements/restore/{id}', [AnnouncementController::class, 'restorePost'])->name('admin.announce.restore');
        Route::delete('/announcements/force-delete/{id}', [AnnouncementController::class, 'forceDeletePost'])->name('admin.announce.force-delete');
    });
