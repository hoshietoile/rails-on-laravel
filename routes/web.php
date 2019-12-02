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

// Route::group(['prefix' => 'staticPages'], function() {
  Route::get('/home', [
    'uses' => 'StaticPages@getHome',
    'as'   => 'home'
  ]);

  Route::get('/help', [
    'uses' => 'StaticPages@getHelp',
    'as'   => 'help'
  ]);
// });
