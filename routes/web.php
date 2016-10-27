<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ArticlesController@get_news');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/article/create', 'ArticlesController@create');

Route::put('/home/change_role', 'HomeController@change_role');

Route::group(['middleware' => 'editor'], function () {
	Route::get('/article/post', function () {
        return view('/articles/post');
    });
    Route::post('/article/post', ['as'=>'/article/post','uses'=>'ArticlesController@post']);
});

Route::get('news', 'ArticlesController@get_news');