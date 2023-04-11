<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\addProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\myBlogsController;
use App\Http\Controllers\myBlogsCRUDController;

// login & register page :
Route::get('/', [UsersController::class, 'index']) -> name('blog.login');
Route::get('/register',[UsersController::class, 'register']) -> name('blog.register');
Route::post('/register/user',[UsersController::class, 'user']) -> name('user.register');
Route::post('/login',[UsersController::class, 'login']) -> name('user.login');
Route::post('/logout',[UsersController::class, 'logout']) -> name('user.logout');

// Home Page :
Route::get('/index', [BlogsController::class, 'index']);
Route::get('/index/blog', [BlogsController::class, 'blogs']) -> name('home') -> middleware('is_login');

// Add-blogs Page :
Route::get('/add/blog', [addProductController::class, 'index']) -> name('add.blogs')  -> middleware('is_login');
Route::post('/add-new-blog', [addProductController::class, 'blogs']) -> name('store');


// Detail Page Page :
Route::get('/detail-blog/{slug}', [BlogsController::class, 'show']) -> name('detail.blogs')  -> middleware('is_login');


// category Page :
Route::get('/category/{category}', [CategoryController::class, 'index']) -> name('category');

// My Blogs Page
Route::get('/my-blog/{id}', [myBlogsController::class, 'index']) -> name('my.blog') -> middleware('is_login');
Route::resource('/my-blog', myBlogsCRUDController::class) -> middleware('is_login');
