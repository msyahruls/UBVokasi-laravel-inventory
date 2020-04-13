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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::group(['middleware' => 'admin.only'], function(){
		Route::get('jurusan/export', 'JurusanController@export');
		Route::get('barang/export', 'BarangController@export');

		Route::resource('fakultas', 'FakultasController');
		Route::resource('jurusan', 'JurusanController');
		Route::resource('ruangan', 'RuanganController');
		Route::resource('barang', 'BarangController');
	});
	Route::resource('barang', 'BarangController', ['only' => ['index','edit','update']]);
	Route::get('dashboard', function () {
	    return view('dashboard.index');
	})->name('dashboard');
});

