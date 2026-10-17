<?php

use App\Http\Controllers\adminControllers\AdminController;
use App\Http\Controllers\adminControllers\CategoryController;
use App\Http\Controllers\adminControllers\PostController;
use App\Http\Controllers\adminControllers\TagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/qurno', [PublicController::class, 'index'])->name('index');
Route::get('/qurno/{slug}', [PublicController::class, 'post'])->name('post');
Route::post('/qurno/{post}/comments', [PublicController::class, 'storeComment'])->name('comment.store');

Route::get('/dashboard', function () {
    return redirect()->route('admin::dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin::')->group(function () {
    Route::get('/qurnoDasboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/qurnoPosts', [PostController::class, 'index'])->name('post');
    Route::get('/qurnoComments', [AdminController::class, 'comment'])->name('comments');
    Route::get('/qurnoCategories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/qurnoTags', [TagController::class, 'index'])->name('tags');

    
    Route::post('/qurnoComments/{comment}', [AdminController::class, 'commentUpdateStatus'])->name('comments.updateStatus');    

    Route::get('/qurnoAddPost', [PostController::class, 'add'])->name('post.add');
    Route::post('/qurnoPosts', [PostController::class, 'store'])->name('post.store');
    Route::delete('/qurnoPosts/{post}', [PostController::class, 'destroy'])->name('post.delete');
    Route::patch('/qurnoPosts/{post}', [PostController::class, 'updateStatus'])->name('post.updateStatus');

    Route::post('/qurnoTags', [TagController::class, 'store'])->name('tag.store');
    Route::delete('/qurnoTags/{tag}', [TagController::class, 'destroy'])->name('tag.delete');
    Route::get('/qurnoTags/{tag}', [TagController::class, 'show'])->name('tag.show');
    Route::patch('/qurnoTags/{tag}', [TagController::class, 'update'])->name('tag.update');

    Route::post('/qurnoCategories', [CategoryController::class, 'store'])->name('categories.add');
    Route::get('/qurnoCategories/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::delete('/qurnoCategory/{category}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::put('/qurnoCategory/{category}', [CategoryController::class, 'update'])->name('category.edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
