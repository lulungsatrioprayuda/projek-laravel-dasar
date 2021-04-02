<?php

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
    return view('index');
});

Route::get('/crud', 'CrudController@index')->name('halaman-crud-dasar');
Route::get('/crud/add', 'CrudController@add')->name('halaman-add');
Route::post('/crud/simpan', 'CrudController@save')->name('save-action');
Route::delete('/crud/delete/{id}', 'CrudController@delete')->name('delete-action');
