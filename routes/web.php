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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('about', 'PageController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

Route::get('/admin/visits','Admin\VisitController@index')->name('admin.visits.index');
Route::get('/admin/visits/create','Admin\VisitController@create')->name('admin.visits.create');
Route::get('/admin/visits{id}','Admin\VisitController@show')->name('admin.visits.show');
Route::post('/admin/visits/store','Admin\VisitController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit','Admin\VisitController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}/update','Admin\VisitController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}','Admin\VisitController@destroy')->name('admin.visits.destroy');

Route::get('/user/visits','User\VisitController@index')->name('user.visits.index');
Route::get('/user/visits{id}','User\VisitController@show')->name('user.visits.show');
