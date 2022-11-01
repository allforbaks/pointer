<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.posts.store');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/create', [TagController::class, 'create'])->name('admin.tags.create');
        Route::get('/', [TagController::class, 'index'])->name('admin.tags.index');
        Route::get('/{tag}', [TagController::class, 'show'])->name('admin.tags.show');
        Route::patch('/{tag}', [TagController::class, 'update'])->name('admin.tags.update');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
        Route::delete('/{tag}', [TagController::class, 'delete'])->name('admin.tags.delete');
        Route::post('/', [TagController::class, 'store'])->name('admin.tags.store');
    });
});
