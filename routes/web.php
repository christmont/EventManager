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
Route::group(['middlewareGroups' => ['web']], function () {
Route::get('/', function () {
    return view('welcome')->with('success','sdasdwa');
});

Route::get('/guest', 'GuestController@index');
Route::get('/guest/register', 'GuestController@showregister')->name('guestregister');
Route::post('/guest/register', 'GuestController@register');
Route::get('/guest/edit/{id}', 'GuestController@showupdate');
Route::put('/guest/edit/{id}', 'GuestController@supdate');
Route::delete('/guest/delete/{id}', 'GuestController@delete');

Route::get('/partner', 'PartnerController@index');
Route::get('/partner/register', 'PartnerController@showregister');
Route::post('/partner/register', 'PartnerController@register');
Route::get('/partner/edit/{id}', 'PartnerController@showupdate');
Route::put('/partner/edit/{id}', 'PartnerController@supdate');
Route::delete('/partner/delete/{id}', 'PartnerController@delete');

Route::get('/event', 'EventController@index');
Route::get('/event/register', 'EventController@showregister');
Route::post('/event/register', 'EventController@register');
Route::get('/event/edit/{id}', 'EventController@showupdate');
Route::put('/event/edit/{id}', 'EventController@supdate');
Route::delete('/event/delete/{id}', 'EventController@delete');

Route::get('/subevent', 'SubeventController@index');
Route::get('/subevent/register', 'SubeventController@showregister');
Route::post('/subevent/register', 'SubeventController@register');
Route::get('/subevent/edit/{id}', 'SubeventController@showupdate');
Route::put('/subevent/edit/{id}', 'SubeventController@supdate');
Route::delete('/subevent/delete/{id}', 'SubeventController@delete');

Route::get('/job', 'JobController@index');
Route::get('/job/register', 'JobController@showregister');
Route::post('/job/register', 'JobController@register');
Route::get('/job/edit/{id}', 'JobController@showupdate');
Route::put('/job/edit/{id}', 'JobController@supdate');
Route::delete('/job/delete/{id}', 'JobController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
});