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
    return view('welcome');
});
Auth::routes();

//routes for our controller resources
Route::resources([
    'stores' => 'StoreController',
    'customers' => 'CustomerController'
]);
Route::get('stores/{id}/newCustomerForm','StoreController@newCustomerForm')->name('addNewCustomerForm');
Route::get('storeSearchForm','StoreController@storeSearchForm')->name('storeSearchForm');
Route::get('storeFinder','StoreController@storeFinder')->name('storeFinder');
Route::post('stores/{id}/addNewCustomer','StoreController@addNewCustomer')->name('addNewCustomer');
Route::post('stores/{id}/update','StoreController@update')->name('updateStore');

Route::get('customerCounter','CustomerController@customerCounter')->name('customerCounter');

Route::get('home', 'HomeController@index');
