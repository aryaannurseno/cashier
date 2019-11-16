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

// Route::get('/','AuthController@login');
// Route::get('index', function (){
//    return view('index');
// });

Route::post('/checkLogin', 'AuthController@checkLogin')->name('checkLogin');
Route::get('/login', 'AuthController@indexLogin')->name('login');

Route::get('adminselu', 'MenuController@getMenuAdmin')->name('getMenuAdmin');


Route::get('/menu', 'MenuController@getMenu')->name('getMenu');
Route::get('/cart', 'MenuController@getCart')->name('getCart');
Route::get('add-to-cart/{id}', 'MenuController@addToCart');
Route::delete('remove-menu-from-cart', 'MenuController@removeMenuFromCart');




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
