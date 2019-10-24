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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/farmer/add', 'FarmerController@create')->name('farmer.add');
Route::post('/farmer/savefarm', 'FarmerController@savefarm')->name('farmer.savefarm');
Route::get('/farmer/getfarm/{id}', 'FarmerController@getfarm')->name('farmer.getfarm');
Route::post('/farmer/store', 'FarmerController@store')->name('farmer.store');
Route::resource('farmer', 'FarmerController',['except'=>['show','create','store']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
   Route::resource('users', 'UserController',['except'=>['show','create','store']]); 
   
});
