<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as HomeController; 
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

//posts routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('category/{category}/posts', [HomeController::class, 'postsByCategory'])
    ->name('category.posts');
Route::get('tag/{tag}/posts', [HomeController::class, 'postsByTag'])
    ->name('tag.posts');
Route::get('posts/{post}/show', [HomeController::class, 'show'])
    ->name('posts.show');

//settings routes
Route::get('change/{lang}/lang', [SettingController::class, 'toggleLang'])
    ->name('change.lang');


//admin routes
Route::prefix("admin")->middleware("admin")->group(function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.index');
    Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');
    //categories routes
    Route::get('categories',[CategoryController::class,'index'])->name('admin.categories.index');
    Route::get('categories/create',[CategoryController::class,'create'])->name('admin.categories.create');
    Route::post('categories/store',[CategoryController::class,'store'])->name('admin.categories.store');
    Route::get('categories/{category}/edit',[CategoryController::class,'edit'])->name('admin.categories.edit');
    Route::put('categories/{category}/update',[CategoryController::class,'update'])->name('admin.categories.update');
    Route::delete('categories/{category}/delete',[CategoryController::class,'delete'])->name('admin.categories.delete');
    //posts routes
    Route::get('posts',[PostController::class,'index'])->name('admin.posts.index');
    Route::get('posts/create',[PostController::class,'create'])->name('admin.posts.create');
    Route::post('posts/store',[PostController::class,'store'])->name('admin.posts.store');
    Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}/update',[PostController::class,'update'])->name('admin.posts.update');
    Route::delete('posts/{post}/delete',[PostController::class,'delete'])->name('admin.posts.delete');
});

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');