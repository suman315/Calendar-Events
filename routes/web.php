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

Route::get('/event/get-events', 'Event\EventController@getEvents');

Route::get('/event', 'Event\EventController@index')->name('event');

Route::get('/event/{id}', 'Event\EventController@edit');

Route::post('/event/{id}', 'Event\EventController@update');

Route::post('/event', 'Event\EventController@store');

Route::delete('/event/{id}', 'Event\EventController@delete');

Auth::routes();

