<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemCategoryController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('news.home');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}/show', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/about', [AboutController::class, 'index'])->name('news.about');
Route::get('/news/login', [LoginController::class, 'index'])->name('news.login');
Route::get('/news/checkin', [CheckinController::class, 'index'])->name('news.checkin');
Route::get('/news/groups', [CategoryController::class, 'index'])->name('news.groups');
Route::get('/news/{news}/category', [ItemCategoryController::class, 'index'])->name('news.category');
Route::get('/news/{category}/categoryId', [ItemCategoryController::class, 'indexById'])->name('news.categoryId');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/', AdminController::class)->name('index');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
});
