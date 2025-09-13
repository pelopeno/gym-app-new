<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

    Route::get('/users', [UserController::class, 'listPosts'])->name('user.show');

    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');

    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/posts', [AdminController::class, 'listPosts'])->name('admin.posts.index');
        Route::get('/posts/add', [AdminController::class, 'addPost'])->name('admin.posts.add');
        Route::post('/posts/store', [AdminController::class, 'storePost'])->name('admin.posts.store');
        Route::get('/posts/{id}/edit', [AdminController::class, 'editPost'])->name('admin.posts.edit');
        Route::patch('/posts/{id}', [AdminController::class, 'updatePost'])->name('admin.posts.update');

        //for testing lang para mag reset ung session
        Route::get('/posts/reset', function () {
            session()->forget('posts');
            return redirect()->route('admin.posts.index')->with('success', 'Posts reset!');
        });
    });
