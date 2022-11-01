<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
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
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    });
});
