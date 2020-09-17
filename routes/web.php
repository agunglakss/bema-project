<?php

use Illuminate\Support\Facades\Route;

//Schema
Route::get('/schema', function() {
	return view('user.schema');
});

//About us
Route::get('/about-us', function() {
	return view('user.about-us');
});

Route::group(['middleware' => ['auth']], function () {
	// modal ajax pricelist
	Route::get('/motor/pricelists/{id}', 'PricelistController@showPricelistByIdMotor');
	
	//Dashboard Admin
	Route::get('/dashboard', 'DashboardController@index');
	
	// admin kategori
	Route::get('/kategori-motor', 'KategoriController@index');
	Route::get('/kategori-motor/create', 'KategoriController@create');
	Route::get('/kategori-motor/{kategori:slug}/edit', 'KategoriController@edit');
	Route::patch('/kategori-motor/{kategori:slug}/edit', 'KategoriController@update');
	Route::post('/kategori-motor', 'KategoriController@store');
	
	// admin tipe
	Route::get('/tipe-motor', 'TipeController@index');
	Route::get('/tipe-motor/create', 'TipeController@create');
	Route::get('/tipe-motor/{tipe:slug}/edit', 'TipeController@edit');
	Route::patch('/tipe-motor/{tipe:slug}/edit', 'TipeController@update');
	Route::post('/tipe-motor', 'TipeController@store');
	
	// admin motor
	Route::get('/motor', 'MotorController@index');
	Route::get('/motor/create', 'MotorController@create');
	Route::get('/motor/{motor:slug}/edit', 'MotorController@edit');
	Route::patch('/motor/{motor:slug}/edit', 'MotorController@update');
	Route::get('/motor/{motor:slug}/detail', 'MotorController@show');
	Route::get('/motor/{motor:slug/pricelist/{id}/edit', 'MotorController@editPricelist')->name('motor.pricelist');
	Route::patch('/motor{motor:slug/pricelist/{id}/edit', 'MotorController@updatePricelist')->name('motor.pricelist');
	Route::post('/motor', 'MotorController@store');
	
	// admin pricelist
	Route::get('/pricelists', 'PricelistController@index');
	Route::get('/pricelists/create', 'PricelistController@create');
	Route::post('/pricelists/importExcel', 'PricelistController@import_excel');
	Route::get('/pricelists/{id}/edit', 'PricelistController@edit');
	Route::patch('/pricelists/{id}/edit', 'PricelistController@update');
	Route::post('/pricelists', 'PricelistController@store');

	// admin banner
	Route::get('/banners', 'BannerController@index');
	Route::get('/banners/create', 'BannerController@create');
	Route::get('/banners/{id}/edit', 'BannerController@edit');
	Route::patch('/banners/{id}/edit', 'BannerController@update');
	Route::post('/banners', 'BannerController@store');
	
	// logout
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

// Product
Route::get('/product', 'ProductController@index');
Route::get('/product/{kategori:slug}/{tipe:slug}/{motor:slug}', 'ProductController@show');
Route::get('/product/{kategori:slug}/{tipe:slug}', 'ProductController@getMotorByType');
Route::get('/product/{kategori:slug}', 'ProductController@getMotorByCategory');

// Home User
Route::get('/', 'HomeController@index');
