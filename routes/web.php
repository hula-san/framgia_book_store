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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/newbooks', 'HomeController@showNewbook')->name('newbooks');
Route::get('/store', 'HomeController@store')->name('store');

Route::get('search/', 'BookController@searchByName')->name('search');
Route::get('category/{id?}', 'BookController@searchCategory')->name('category');
Route::get('publishser/{id?}', 'BookController@searchPublisher')->name('publisher');
Route::get('author/{id?}', 'BookController@searchAuthor')->name('author');

Route::get('/cart', 'CartController@index')->name('cartIndex');
Route::post('/add-cart', 'CartController@cart')->name('cart');
Route::post('/plus-cart', 'CartController@plusCart')->name('plusCart');
Route::post('/minus-cart', 'CartController@minusCart')->name('minusCart');
Route::post('/delete-cart', 'CartController@deleteCart')->name('deleteCart');

Route::get('/detail/{id?}', 'BookController@getBookDetail')->name('detailBook');

Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/payment', 'CheckoutController@payment')->name('payment');


Route::group(['prefix' => 'admin'], function () {
	Route::resource('list-books', 'BookController');
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('destroy', function() {
	Cart::destroy();
});
