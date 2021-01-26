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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/gallery', function () {
    return view('gallery');
});
Route::resource('/product', 'ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shopping-cart', 'CartController@index')->name('cart.index');

Route::get('add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::resource('/contacts', 'ContactController');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');