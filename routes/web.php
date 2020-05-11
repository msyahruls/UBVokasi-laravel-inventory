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


// Route::get('/', function () {
//     return view('welcome');
// })->name('landing');
Route::get('/', 'WelcomeController@index')->name('landing');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mail', 'MailController@send')->name('mail');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::group(['middleware' => 'admin.only'], function(){
		Route::get('fakultas/export', 'FakultasController@export')->name('fakultas.export');
		Route::get('jurusan/export', 'JurusanController@export')->name('jurusan.export');
		Route::get('ruangan/export', 'RuanganController@export')->name('ruangan.export');
		Route::get('barang/export', 'BarangController@export')->name('barang.export');

		Route::post('fakultas/import', 'FakultasController@import')->name('fakultas.import');

		Route::resource('fakultas', 'FakultasController');
		Route::resource('jurusan', 'JurusanController');
		Route::resource('ruangan', 'RuanganController');
		Route::resource('barang', 'BarangController');
	});
	Route::resource('barang', 'BarangController', ['only' => ['index','edit','update']]);
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

