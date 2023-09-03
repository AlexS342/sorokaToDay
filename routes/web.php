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

//При создании приложения:
//Route::get('/', function () {
//    return view('welcome');
//});

//Выполнено на первом уроке
//Route::get('/', function () {
//    return view('home');
//});
//Route::get('/about', function () {
//    return view('about');
//});
//Route::get('/categoryNews', function () {
//    return view('categoryNews');
//});
//Route::get('/itemNews', function () {
//    return view('itemNews');
//});

//Выполнено на втором уроке
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categoryNews', [CategoryController::class, 'index'])->name('category');
Route::get('/itemCategory/{id}/index', [ItemCategoryController::class, 'index'])->name('itemCategory');
Route::get('/itemNews/{id}/show', [ItemNewsController::class, 'index'])->name('itemNews');
Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin');
Route::get('/addNews', [AddNewsController::class, 'index'])->name('addNews');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/login', [LoginController::class, 'index'])->name('login');



Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');

