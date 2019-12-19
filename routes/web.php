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

  Route::get('/home', [
    'uses' => 'StaticPages@getHome',
    'as'   => 'home'
  ]);

  Route::get('/help', [
    'uses' => 'StaticPages@getHelp',
    'as'   => 'help'
  ]);

  Route::get('/users', [
    'uses' => 'StaticPages@getUsers',
    'as'   => 'users'
  ]);

  Route::group(['prefix' => 'user'], function() {
    Route::get('/login', [
      'uses' => 'UsersController@getLogin',
      'as'   => 'user.getLogin'
    ]);

    Route::post('/login', [
      'uses' => 'UsersController@login',
      'as'   => 'user.login'
    ]);

    Route::get('/signup', [
      'uses' => 'UsersController@getSignup',
      'as'   => 'user.getsignup'
    ]);

    Route::post('/signup', [
      'uses' => 'UsersController@signup',
      'as'   => 'user.signup'
    ]);

    Route::group(['middleware' => 'auth'], function() {
      Route::get('/show', [
        'uses' => 'UsersController@show',
        'as'   => 'user.show'
      ]);

      Route::get('/logout', [
        'uses' => 'UsersController@getLogout',
        'as'   => 'user.logout'
      ]);

      Route::get('/edit/{id}', [
        'uses' => 'UsersController@edit',
        'as'   => 'user.edit'
      ]);

      Route::post('/update', [
        'uses' => 'UsersController@update',
        'as'   => 'user.update'
      ]);

      Route::get('/profile/{id}', [
        'uses' => 'UsersController@profile',
        'as'   => 'user.profile'
      ]);

      Route::delete('/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as'   => 'user.destroy'
      ]);

    });
  });

  Route::group(['prefix' => 'micropost'], function(){
    Route::post('/{id}/create', [
      'uses' => 'MicropostsController@create',
      'as'   => 'micropost.create'
    ]);

    Route::delete('/{id}/delete', [
      'uses' => 'MicropostsController@destroy',
      'as'   => 'micropost.destroy'
    ]);
  });
