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
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::post('register', 'Auth\RegisterController@register')->middleware('register');

\Illuminate\Support\Facades\Auth::routes();
Route::post('register', 'Auth\RegisterController@register')->middleware('register');

Route::get('/home', 'HomeController@index')->name('home');
