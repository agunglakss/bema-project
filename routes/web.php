<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
	
	//Dashboard Admin
	Route::get('/dashboard', 'DashboardController@index');

	// profile
	//Route::get('/profile', 'UserController@show');

	// tentang kami
	Route::get('/tentang-kami/edit', 'AboutUsController@edit');
	Route::put('/tentang-kami/edit', 'AboutUsController@update');
	
	// admin kategori
	Route::get('/kategori-motor', 'KategoriController@index');
	Route::get('/kategori-motor/create', 'KategoriController@create');
	Route::get('/kategori-motor/{kategori:slug}/edit', 'KategoriController@edit');
	Route::patch('/kategori-motor/{kategori:slug}/edit', 'KategoriController@update');
	Route::delete('/kategori-motor/{kategori:slug}/delete', 'KategoriController@destroy');
	Route::post('/kategori-motor', 'KategoriController@store');
	
	// admin tipe
	Route::get('/tipe-motor', 'TipeController@index');
	Route::get('/tipe-motor/create', 'TipeController@create');
	Route::get('/tipe-motor/{tipe:slug}/edit', 'TipeController@edit');
	Route::patch('/tipe-motor/{tipe:slug}/edit', 'TipeController@update');
	Route::delete('/tipe-motor/{tipe:slug}/delete', 'TipeController@destroy');
	Route::post('/tipe-motor', 'TipeController@store');
	
	// admin motor
	Route::get('/motor', 'MotorController@index');
	Route::get('/motor/create', 'MotorController@create');
	Route::get('/motor/{motor:slug}/edit', 'MotorController@edit');
	Route::patch('/motor/{motor:slug}/edit', 'MotorController@update');
	Route::get('/motor/{motor:slug}/detail', 'MotorController@show');
	Route::delete('/motor/{motor:slug}/delete', 'MotorController@destroy');
	Route::post('/motor', 'MotorController@store');
	
	// admin pricelist
	Route::post('/pricelists/import-harga-motor', 'PricelistController@import_excel');
	Route::get('/pricelists/{motor:slug}/create', 'PricelistController@create');
	Route::get('/pricelists/{motor:slug}/{pricelist:id}/edit', 'PricelistController@edit');
	Route::patch('/pricelists/{motor:slug}/{pricelist:id}/edit', 'PricelistController@update');
	Route::delete('/pricelists/{motor:slug}/delete', 'PricelistController@destroyAllPricelist');
	Route::delete('/pricelists/{motor:slug}/{pricelist:id}/delete', 'PricelistController@destroy');
	Route::post('/pricelists/{motor:slug}', 'PricelistController@store');

	// admin banner
	Route::get('/banners', 'BannerController@index');
	Route::get('/banners/create', 'BannerController@create');
	Route::get('/banners/{id}/edit', 'BannerController@edit');
	Route::patch('/banners/{id}/edit', 'BannerController@update');
	Route::delete('/banners/{id}/delete', 'BannerController@destroy');
	Route::post('/banners', 'BannerController@store');

	// order
	Route::get('/order', 'OrderController@index');

	// testimonial
	Route::get('/testimonial', 'TestimoniController@index');
	Route::delete('/testimonial/{id}/delete', 'TestimoniController@destroy');
	Route::post('/testimonial', 'TestimoniController@store');
	
	// logout
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('reset-password', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

// Product
Route::get('/products', 'ProductController@index');
Route::get('/products/search', 'ProductController@search');
Route::get('/products/{kategori:slug}/{tipe:slug}/{motor:slug}', 'ProductController@show');
Route::get('/products/{kategori:slug}/{tipe:slug}', 'ProductController@getMotorByType');
Route::get('/products/{kategori:slug}', 'ProductController@getMotorByCategory');

// Home User
Route::get('/', 'HomeController@index');

// order
Route::post('/pemesanan', 'OrderController@store');

//Schema
Route::get('/schema', function() {
	return view('user.schema');
});

//About us
Route::get('/about-us', 'AboutUsController@index');

// Testimoni user
Route::get('/testimoni', 'TestimoniController@gallery');