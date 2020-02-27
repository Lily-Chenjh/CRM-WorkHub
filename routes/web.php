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

Route::match(['get', 'post'],'/admin', 'AdminController@login')->name('admin');

Auth::routes();

//dashboard routes
Route::get('/dashboard', 'HomeController@index')->name('home');
//Route::get('admin/dashboard/forms', 'AdminController@formsadmin')->name('formsadmin');
Route::get('/dashboard/forms', 'HomeController@forms')->name('forms');

//admin and ticket routes
Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/admin/dashboard/users', 'AdminController@users')->name('users');
Route::get('/admin/dashboard/create', 'TicketController@create')->name('create');
Route::post('/admin/dashboard/create', ['as' => '/admin/dashboard/create', 'uses' => 'TicketController@store']);
Route::delete('/admin/dashboard/info/{slug}', 'AdminController@destroy');
Route::post('/admin/dashboard/info/{slug}', 'AdminController@store');

//routes for storage system
Route::get('admin/dashboard/forms','FileController@index')->name('upload');
Route::post('admin/dashboard/forms','FileController@store');
Route::get('admin/dashboard/forms/{file}','FileController@download')->name('download');



//  Route::post('/admin/dashboard/info/{slug}', ['as' => 'admin/dashboard/info', 'uses' =>'AdminController@store'])
//  ->where ('slug', '[\d]+') ;

//client routes
Route::get('/admin/dashboard/create/client', 'ClientController@create')->name('createC');
Route::post('/admin/dashboard/create/client', ['as' => '/admin/dashboard/create/client', 'uses' => 'ClientController@store']);
//ticket info route
Route::get('/admin/dashboard/info/{slug}', ['as' => 'admin/dashboard/info', 'uses' =>'TicketController@info'])
->where ('slug', '[\d]+') ;

//non admin user info route
Route::get('/dashboard/info/{slug}', ['as' => 'home/info', 'uses' =>'HomeController@info'])
->where ('slug', '[\d]+') ;
//Accepting \w = any word \d = number \- Dash and \-Underscore