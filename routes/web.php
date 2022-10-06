<?php

use App\Http\Controllers\HobbyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\hobbyTagController;
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

Route::get('/', function () {
    return view('startseite');
});
Route::get('/info', function () {
    return view('info');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('hobby', HobbyController::class);

Route::resource('tag', TagController::class);
Route::resource('user', UserController::class);

Route::get('/hobby/tag/{tag_id}', [App\Http\Controllers\hobbyTagController::class, 'getFilteredHobbies'])->name('hobby_tag');
