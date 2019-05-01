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

//Page Routes
Route::get('/', 'PagesController@index');
Route::get('/adoption list', 'PagesController@adoptionList');
Route::get('/profile', 'PagesController@profile');
Route::get('/contact', 'PagesController@contact');

//Controler Routes
Route::resource('animals', 'AnimalsController');
Route::resource('adoptions', 'AdoptionReqsController');

Route::get('adoptions/store/{id}', 'AdoptionReqsController@store');
Auth::routes();


Route::get('/dashboard', 'DashboardController@index');
