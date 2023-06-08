<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ProjectController;
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

Route::resource('category', CategoryController::class);
Route::resource('galery', GaleryController::class);
Route::resource('project', ProjectController::class);

Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
