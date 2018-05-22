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
    return view('index');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
Route::resource('api/news', 'Api\NewsController');
Route::resource('api/users', 'Api\UserController');

Route::view('/profile', 'profile')->where('profile', '.*');


//Route::resource('api/schedules', 'Api\SchedulesController')
//    ->only(['index', 'show']);
Route::get('/', 'FrontController@index');
Route::get('/articles/{id}', 'FrontController@show')->name('articles');
Route::get('/articles', 'FrontController@all')->name('news');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/articles/search', 'FrontController@search');