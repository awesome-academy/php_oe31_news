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
Route::group(['middleware' => ['localization']], function () {

});
Route::get('change-languages/{language}', 'LangController@changeLanguage')->name('change-languages');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

