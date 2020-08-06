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

Route::get('/', function() {
	return view('user.home.index');
});

//Product
Route::get('/products', function() {
	return view('user.product.index');
});

//Schema
Route::get('/schema', function() {
	return view('user.schema');
});

//About us
Route::get('/about-us', function() {
	return view('user.about-us');
});


//admin
Route::get('/admin', function() {
	$title = 'Dashboard - Beranda';

	return view('admin.dashboard.index', compact('title'));
});

Route::get('/products/tipe-motor', 'TipeController@index');
Route::get('/products/tipe-motor/create', 'TipeController@create');
Route::get('/products/tipe-motor/{tipe:slug}/edit', 'TipeController@edit');
Route::patch('/products/tipe-motor/{tipe:slug}/edit', 'TipeController@update');
Route::post('/products/tipe-motor', 'TipeController@store');

Route::get('/products/kategori-motor', 'KategoriController@index');
Route::get('/products/kategori-motor/create', 'KategoriController@create');
Route::get('/products/kategori-motor/{kategori:slug}/edit', 'KategoriController@edit');
Route::patch('/products/kategori-motor/{kategori:slug}/edit', 'KategoriController@update');
Route::post('/products/kategori-motor', 'KategoriController@store');

Route::get('/products/motor', 'MotorsController@index');
Route::get('/products/motor/create', 'MotorsController@create');
Route::post('/products/motor', 'MotorsController@store');
