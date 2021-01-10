<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin'], function(){
	route::get('/dashboard','App\Http\Controllers\Backend\Dashboard@index')->name('dashboard');
	//Brand Route
	route::group(['prefix'=>'brand'], function(){
		route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage');
		route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create');
		route::post('/store','App\Http\Controllers\Backend\BrandController@store')->name('brand.store');
		route::get('/edit/{id}','App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');
		route::post('/update/{id}','App\Http\Controllers\Backend\BrandController@update')->name('brand.update');
		route::get('/delete/{id}','App\Http\Controllers\Backend\BrandController@destroy')->name('brand.delete');
	});
	//category Route
	route::group(['prefix'=>'category'], function(){
		route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('category.manage');
		route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->name('category.create');
		route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
		route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');
		route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('category.update');
		route::get('/delete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('category.delete');
	});

	//Shop Based Route
	Route::group(['prefix'=>'shop'], function(){
		//Product Route
		route::group(['prefix'=>'Product'], function(){
			route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('product.manage');
			route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('product.create');
			route::post('/store','App\Http\Controllers\Backend\ProductController@store')->name('product.store');
			route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('product.edit');
			route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('product.update');
			route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('product.delete');
		});
	});


});
