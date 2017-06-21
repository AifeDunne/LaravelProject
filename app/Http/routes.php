<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('/dashboard', array('as' => 'dash', 'uses' => 'Dashboard\DashController@getDash'));
Route::post('/createList', array('as'=>'addList','uses'=>'Dashboard\DashController@addNewList'));
Route::post('/addBook', array('as'=>'addBook','uses'=>'Dashboard\DashController@addNewBook'));
Route::post('/deleteBook', array('as'=>'deleteBook','uses'=>'Dashboard\DashController@removeBook'));
Route::post('/orderBook', array('as'=>'orderBook','uses'=>'Dashboard\DashController@orderBook'));

Route::auth();
Route::post('logout', array('uses'=>'Auth\AuthController@getSignOut'));