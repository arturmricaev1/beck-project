<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
  
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

Route::get('/', 'App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::get('/personal-area', 'App\Http\Controllers\HomeController@personal');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/all', 'App\Http\Controllers\HomeController@all')->name('all');
Route::get('/one/{code}', 'App\Http\Controllers\HomeController@one')->name('detailed');
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('admin', AdminController::class);
    Route::get('/discount/{id}', 'App\Http\Controllers\HomeController@discount')->name('discount');
    Route::post('/discount/{id}', 'App\Http\Controllers\HomeController@store')->name('discount.store');
    Route::get('/favorites/{id}', 'App\Http\Controllers\HomeController@favorites')->name('favorites');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/basket/add/{id}', 'App\Http\Controllers\BasketController@add')->name('basket.add');    
Route::get('/basket/index', 'App\Http\Controllers\BasketController@index')->name('basket.index');
Route::get('/basket/checkout', 'App\Http\Controllers\BasketController@checkout')->name('basket.checkout');
