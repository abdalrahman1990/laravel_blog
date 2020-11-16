<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts','App\Http\Controllers\PostController');
Route::resource('comments','App\Http\Controllers\CommentController');

//Route::POST('/like', [App\Http\Controllers\PostController::class, 'postLikePost'])->name('like');

Route::post('/like','App\Http\Controllers\LikeController@like')->name('like');

