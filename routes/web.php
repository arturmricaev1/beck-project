<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/error', 'App\Http\Controllers\HomeController@error')->name('error');
Route::resource('posts', PostController::class);
Auth::routes();
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('admin', AdminController::class);
    Route::get('users', 'App\Http\Controllers\UserRoleController@index')->name('users');
    Route::get('permissions', 'App\Http\Controllers\UserRoleController@permissions')->name('permissions');
    Route::post('change/{user}/role/{roleId}', 'App\Http\Controllers\UserRoleController@changeRole')->name('change-role');
});



