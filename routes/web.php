<?php
use App\Http\Controllers\LanguageController;
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


// Route url
Route::get('/', 'EcommerceAppController@ecommerce_shop');

Route::get('/app-ecommerce-shop', 'EcommerceAppController@ecommerce_shop');
Route::post('/ecommerce-products', 'EcommerceAppController@products');
Route::post('/addToCart', 'EcommerceAppController@addToCart');
Route::post('/removeItemFromCart', 'EcommerceAppController@removeItemFromCart');

Route::get('/app-ecommerce-checkout', 'EcommerceAppController@ecommerce_checkout');


// locale Route
Route::get('lang/{locale}',[LanguageController::class,'swap']);
