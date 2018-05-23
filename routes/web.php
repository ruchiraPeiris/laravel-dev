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

Route::get('/search','SearchController@search');


Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'PostController');
Route::get('/instagram', 'InstagramController@index');
Route::get('/instagram/user/{user}', 'InstagramController@user');
Route::get('/instagram/tag/{tag}', 'InstagramController@tag');
