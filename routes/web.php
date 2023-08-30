<?php

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
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/categoryNews', function () {
    return view('categoryNews');
});
Route::get('/itemNews', function () {
    return view('itemNews');
});

//Выполнено на втором уроке
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');

