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

    route::group(['prefix'=>'product'], function(){
        route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('product.manage');
        route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('product.create');
        route::post('/store','App\Http\Controllers\Backend\ProductController@store')->name('product.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('product.edit');
        route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('product.update');
        route::post('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('product.delete');
    });

    route::group(['prefix'=>'shipping-address'],function(){

        route::group(['prefix'=>'country'], function(){
            route::get('/manage','App\Http\Controllers\Backend\CountryController@index')->name('country.manage');
            route::get('/create','App\Http\Controllers\Backend\CountryController@create')->name('country.create');
            route::post('/store','App\Http\Controllers\Backend\CountryController@store')->name('country.store');
            route::get('/edit/{id}','App\Http\Controllers\Backend\CountryController@edit')->name('country.edit');
            route::post('/update/{id}','App\Http\Controllers\Backend\CountryController@update')->name('country.update');
            route::get('/delete/{id}','App\Http\Controllers\Backend\CountryController@destroy')->name('country.delete');
        });
        route::group(['prefix'=>'division'], function(){
            route::get('/manage','App\Http\Controllers\Backend\DivisionController@index')->name('division.manage');
            route::get('/create','App\Http\Controllers\Backend\DivisionController@create')->name('division.create');
            route::post('/store','App\Http\Controllers\Backend\DivisionController@store')->name('division.store');
            route::get('/edit/{id}','App\Http\Controllers\Backend\DivisionController@edit')->name('division.edit');
            route::post('/update/{id}','App\Http\Controllers\Backend\DivisionController@update')->name('division.update');
            route::get('/delete/{id}','App\Http\Controllers\Backend\DivisionController@destroy')->name('division.delete');
        });
        route::group(['prefix'=>'district'], function(){
            route::get('/manage','App\Http\Controllers\Backend\DistrictController@index')->name('district.manage');
            route::get('/create','App\Http\Controllers\Backend\DistrictController@create')->name('district.create');
            route::post('/store','App\Http\Controllers\Backend\DistrictController@store')->name('district.store');
            route::get('/edit/{id}','App\Http\Controllers\Backend\DistrictController@edit')->name('district.edit');
            route::post('/update/{id}','App\Http\Controllers\Backend\DistrictController@update')->name('district.update');
            route::get('/delete/{id}','App\Http\Controllers\Backend\DistrictController@destroy')->name('district.delete');
        });
    });


});
