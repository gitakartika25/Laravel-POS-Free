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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {  
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products','RestoController');
    //sorry kalau ada typo penggunaan bahasa inggris krn saya orang indonesia yang mencoba belajar b.inggris
    Route::get('/transcation', 'TransactionController@index');
    Route::post('/transcation/addproduct/{id}', 'TransactionController@addProductCart');
    Route::post('/transcation/removeproduct/{id}', 'TransactionController@removeProductCart');
    Route::post('/transcation/clear', 'TransactionController@clear');
    Route::post('/transcation/increasecart/{id}', 'TransactionController@increasecart');
    Route::post('/transcation/decreasecart/{id}', 'TransactionController@decreasecart');
    Route::post('/transcation/bayar','TransactionController@bayar');
    Route::get('/transcation/history','TransactionController@history');
    Route::get('/transcation/laporan/{id}','TransactionController@laporan');

Route::get('/manageusers', 'UserController@usersView')->name('manageusers');
Route::get('/users/register', 'UserController@register');
Route::post('/users/createUser', 'UserController@create');
Route::get('/users/editUser/{id}', 'UserController@edit');
Route::post('/users/updateUser/{id}', 'UserController@update');
Route::get('/users/dropUser/{id}', 'UserController@drop');
Route::get('/users/cetak_pdf', 'UserController@cetak_pdf');
});





