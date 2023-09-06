<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemCategoryController;
//use App\Http\Controllers\ItemNewsController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('news.home');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');
Route::get('/news/about', [AboutController::class, 'index'])->name('news.about');
Route::get('/news/login', [LoginController::class, 'index'])->name('news.login');
Route::get('/news/checkin', [CheckinController::class, 'index'])->name('news.checkin');
Route::get('/news/groups', [CategoryController::class, 'index'])->name('news.groups');
Route::get('/news/{id}/category', [ItemCategoryController::class, 'index'])->name('news.category');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    //http://soroka/admin
    Route::get('/', AdminController::class)->name('index');
    //http://soroka/admin/news
    Route::resource('news', AdminNewsController::class);
    //http://soroka/admin/categories
    Route::resource('categories', AdminCategoryController::class);
});
