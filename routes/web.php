<?php

use Illuminate\Support\Facades\Auth;
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

// Route::post('/', 'Authtentication\AuthController@login')->name('process-login');
// Route::get('/', 'Authtentication\AuthController@index')->name('login');
Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');

// middleware('CekLoginMiddleware')
//menggunakan fitur protek route dengan bantuan middleware"CekLoginMiddleware"
// Route::group(['middleware' => 'CekLoginMiddleware'], function () {

// menggunakan fitur protek route dengan middleware yang sudah di sediakan oleh laravel itu sendiri
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get('crud', 'CrudController@index')->name('halaman-crud-dasar');
    Route::get('crud/add', 'CrudController@add')->name('halaman-add');
    Route::post('crud', 'CrudController@save')->name('save-action');
    Route::delete('crud/{id}', 'CrudController@delete')->name('delete-action');
    Route::get('crud/{id}/edit', 'CrudController@edit')->name('edit-page');
    Route::patch('crud/{id}', 'CrudController@editAction')->name('edit-action');
    // logout
    Route::get('logout', 'Authtentication\AuthController@logout')->name('process-logout');
});



Route::get('/home', 'HomeController@index')->name('home');
