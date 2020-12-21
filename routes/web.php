<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
	Route::view('dashboard', 'admin.dashboard')->name('dashboard');
	
	//Articles
	Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
	Route::view('/articles/create', 'admin.articles.create')->name('admin.articles.create');
	Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
	
	//Comments
	Route::view('/comments', 'admin.comments.index')->name('admin.comments.index');
	Route::view('/comments/approved', 'admin.comments.approved')->name('admin.comments.approved');
	Route::view('/comments/disapproved', 'admin.comments.disapproved')->name('admin.comments.disapproved');
	
	//Categories
	Route::view('/categories', 'admin.categories.index')->name('admin.categories.index');

	//Users
	Route::view('/users', 'admin.users.index')->name('admin.users.index');
	Route::view('/users/create', 'admin.users.create')->name('admin.users.create');

	Route::get('/profile', [UserController::class, 'profile'])->name('admin.profile');	
});

Route::get('/latest', [ArticleController::class, 'latest'])->name('front.latest');
Route::get('/trending', [ArticleController::class, 'trending'])->name('front.trending');
Route::get('/tag/{tag:name}', [ArticleController::class, 'tag'])->name('front.tag');

Route::view('/', 'welcome')->name('front.home');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('front.article');
Route::get('/category/{category:name}', [CategoryController::class, 'show'])->name('front.category');
Route::get('/subcategory/{subcategory:name}', [SubcategoryController::class, 'show'])->name('front.subcategory');