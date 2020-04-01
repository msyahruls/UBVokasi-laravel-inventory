<?php

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

// Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
Route::resource('fakultas', 'FakultasController');
Route::resource('jurusan', 'JurusanController');
Route::resource('ruangan', 'RuanganController');
Route::resource('barang', 'BarangController');
