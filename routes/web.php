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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);
Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getaddtocart',
	'as' => 'product.addtocart'
]);
Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
Route::get('/increase/{id}', [
    'uses' => 'ProductController@getincreaseByOne',
    'as' => 'product.increaseByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);
Route::get('/shopping-cart', [
	'uses' => 'ProductController@getcart',
	'as' => 'product.shoppingcart'
]);
Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);
Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);


Route::group(['prefix'=>'user'], function(){
	Route::group(['middleware'=>'guest'], function(){
		Route::get('/signup', [
	'uses' => 'UserController@getSignup',
	'as' => 'user.signup',
	'middleware' => 'guest'
]);
Route::post('/signup', [
	'uses' => 'UserController@postSignup',
	'as' => 'user.signup',
	'middleware' => 'guest'
]);
Route::post('/signin', [
	'uses' => 'UserController@postSignin',
	'as' => 'user.signin',
	'middleware' => 'guest'
]);
Route::get('/signin', [
	'uses' => 'UserController@getSignin',
	'as' => 'user.signin',
	'middleware' => 'guest'
]);
	});
Route::group(['middleware'=>'auth'], function(){
Route::get('/profile', [
	'uses' => 'UserController@getprofile',
	'as' => 'user.profile',
]);
Route::get('/logout', [
	'uses' => 'UserController@getLogout',
	'as' => 'user.logout',
]);
});
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin/product/new', 'ProductController@newProduct');
// Route::get('/admin/products', 'ProductController@index');
// Route::get('/admin/product/destroy/{id}', 'ProductController@destroy');
// Route::post('/admin/product/save', 'ProductController@add');

// Route::get('/addProduct/{productId}', 'CartController@addItem');
// Route::get('/removeItem/{productId}', 'CartController@removeItem');
// Route::get('/cart', 'CartController@showCart');