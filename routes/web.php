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

//Schema
Route::get('/schema', function() {
	return view('user.schema');
});

//About us
Route::get('/about-us', function() {
	return view('user.about-us');
});

Route::group(['middleware' => ['auth']], function () {

	//Dashboard Admin
	Route::get('/admin', 'DashboardController@index');
	
	// Admin Kategori
	Route::get('/products/kategori-motor', 'KategoriController@index');
	Route::get('/products/kategori-motor/create', 'KategoriController@create');
	Route::get('/products/kategori-motor/{kategori:slug}/edit', 'KategoriController@edit');
	Route::patch('/products/kategori-motor/{kategori:slug}/edit', 'KategoriController@update');
	Route::post('/products/kategori-motor', 'KategoriController@store');
	
	// Admin Tipe
	Route::get('/products/tipe-motor', 'TipeController@index');
	Route::get('/products/tipe-motor/create', 'TipeController@create');
	Route::get('/products/tipe-motor/{tipe:slug}/edit', 'TipeController@edit');
	Route::patch('/products/tipe-motor/{tipe:slug}/edit', 'TipeController@update');
	Route::post('/products/tipe-motor', 'TipeController@store');
	
	// Admin Motor
	Route::get('/products/motor', 'MotorController@index');
	Route::get('/products/motor/create', 'MotorController@create');
	Route::get('/products/motor/{motor:slug}/edit', 'MotorController@edit');
	Route::patch('/products/motor/{motor:slug}/edit', 'MotorController@update');
	Route::post('/products/motor', 'MotorController@store');
	
	// Admin Pricelists
	Route::get('/pricelists', 'PricelistController@index');
	Route::get('/pricelists/create', 'PricelistController@create');
	Route::post('/pricelists/importExcel', 'PricelistController@import_excel');
	Route::get('/pricelists/{id}/edit', 'PricelistController@edit');
	Route::patch('/pricelists/{id}/edit', 'PricelistController@update');
	Route::post('/pricelists', 'PricelistController@store');
	
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

// Product
Route::get('/product', 'ProductController@index');
Route::get('/product/{kategori:slug}', 'ProductController@getMotorByCategory');
Route::get('/product/{kategori:slug}/{tipe:slug}', 'ProductController@getMotorByType');

// Home User
Route::get('/', 'HomeController@index');
