<?php

use App\Http\Controllers\admin\KategoriMenuController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('menu/kategori', \admin\KategoriMenuController::class);
    Route::resource('menu/daftar', \admin\DaftarMenuController::class);

    Route::resource('user', \admin\UserController::class);
});


Route::get('/about', function () {
    return view('about');
})->name('about');
