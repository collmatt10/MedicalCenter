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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('about', 'PageController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');

Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');

Route::get('/doctor/visits','Doctor\VisitController@index')->name('doctor.visits.index');
Route::get('/doctor/visits/create','Doctor\VisitController@create')->name('doctor.visits.create');
Route::get('/doctor/visits{id}','Doctor\VisitController@show')->name('doctor.visits.show');
Route::post('/doctor/visits/store','Doctor\VisitController@store')->name('doctor.visits.store');
Route::get('/doctor/visits/{id}/edit','Doctor\VisitController@edit')->name('doctor.visits.edit');
Route::put('/doctor/visits/{id}/update','Doctor\VisitController@update')->name('doctor.visits.update');
Route::delete('/doctor/visits/{id}','Doctor\VisitController@destroy')->name('doctor.visits.destroy');

Route::get('/admin/visits','Admin\VisitController@index')->name('admin.visits.index');
Route::get('/admin/visits/create','Admin\VisitController@create')->name('admin.visits.create');
Route::get('/admin/visits{id}','Admin\VisitController@show')->name('admin.visits.show');
Route::post('/admin/visits/store','Admin\VisitController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit','Admin\VisitController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}/update','Admin\VisitController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}','Admin\VisitController@destroy')->name('admin.visits.destroy');

Route::get('/user/visits','User\VisitController@index')->name('user.visits.index');
Route::get('/user/visits{id}','User\VisitController@show')->name('user.visits.show');
