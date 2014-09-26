<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as'=>'home', 'uses'=>'QuestionsController@getindex']);

Route::get('register', ['as'=>'register', 'uses'=>'UsersController@getnew']);

Route::get('login', ['as'=>'login', 'uses'=>'UsersController@getlogin']);

Route::get('logout', ['as'=>'logout', 'uses'=>'UsersController@getlogout']);

Route::get('ask', ['as'=>'ask', 'uses'=>'QuestionsController@ques']);

Route::get('answer', array('as'=>'answer', 'uses'=>'QuestionsController@getview'));

Route::get('yourques', array('as'=>'yourques', 'uses'=>'QuestionsController@getquestions'));

Route::post('register', array('before'=>'csrf','uses'=>'UsersController@postcreate'));

Route::post('login', array('before'=>'csrf','uses'=>'UsersController@postlogin'));

Route::post('ask', array('before'=>'csrf', 'uses'=>'QuestionsController@postcreate'));

Route::post('answer', array('before'=>'csrf', 'uses'=>'QuestionsController@postanswers'));
