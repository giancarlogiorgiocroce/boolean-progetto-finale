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


Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){

        Route::get('/','HomeController@index')->name('home');
        Route::resource('items', 'ItemController');
        Route::resource('orders', 'OrderController');

});



// Route::get('/home', 'HomeController@index')->name('home');




Route::get('{any?}', function(){
    return view('welcome');
})->where('any', '.*')->name('homepage');