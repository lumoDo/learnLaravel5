<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();

Route::get('/', 'HomeController@index');

  // //创建路由组
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
      Route::get('/', 'HomeController@index');
      Route::resource('article', 'ArticleController');
      Route::resource('comment', 'CommentController');
  });
Route::get('article/{id}', 'ArticleController@show');
Route::post('comment', 'CommentController@store');
