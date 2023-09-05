<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemNewsController;
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

//Выполнено на втором уроке
//Страница приветствия
//http://soroka/
Route::get('/', [HomeController::class, 'index'])->name('home');
//Старница категории новостей
//http://soroka/categoryNews
Route::get('/categoryNews', [CategoryController::class, 'index'])->name('category');
//Страница выводит новости во конкретной категории
//http://soroka/itemCategory/4/index
Route::get('/itemCategory/{id}/index', [ItemCategoryController::class, 'index'])->where('id', '\d+')->name('itemCategory');
//Страница выводит одну конкретную новость
//http://soroka/itemNews/3/show
Route::get('/itemNews/{id}/show', [ItemNewsController::class, 'index'])->where('id', '\d+')->name('itemNews');
//Страница регистрации  [В задании не фигурирует]
//http://soroka/checkin
Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin');
//Страница добавления новости
//http://soroka/addNews
Route::get('/addNews', [AddNewsController::class, 'index'])->name('addNews');
//Страница О проекте (дополнение к главной странице) [В задании не фигурирует]
//http://soroka/about
Route::get('/about', [AboutController::class, 'index'])->name('about');
//Старница входа в акаунт
//http://soroka/login
Route::get('/login', [LoginController::class, 'index'])->name('login');


//Повторяю за преподавателем.
//http://soroka/news
Route::get('/news', [NewsController::class, 'index'])->name('news');
//http://soroka/news/3
Route::get('/news/{id}', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    //http://soroka/admin
    Route::get('/', AdminController::class)->name('index');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
});

//Route::get('/admin', AdminController::class)->name('index');
//Route::get('/admin/news', AdminNewsController::class)->name('index');
//Route::get('/admin/categories', AdminCategoryController::class)->name('index');

//App\Http\Controllers\admin\NewsController@index
//app/Http/Controllers/Admin/NewsController.php
