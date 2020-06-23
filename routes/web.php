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
})->middleware('guest');

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard');

Route::resource('usuarios', 'UserController')->except(['create', 'edit']);
Route::resource('precios', 'PrecioController')->except(['create', 'edit']);
Route::resource('personas', 'PersonaController')->except(['create', 'edit']);
Route::resource('animales', 'AnimalController');
