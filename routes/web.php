<?php

Auth::routes();
Route::get('/logout', ['uses' => 'Admin\HomeController@logout', 'as' => 'admin_logout']);
Route::group(['middleware' => 'web'], function (){


    Route::get('/search', ['uses' => 'HomeController@search', 'as' => 'search']);

    Route::get('/by88', ['uses' => 'HomeController@by', 'as' => 'by88']);

    Route::get('/service', ['uses' => 'ServiceController@index', 'as' => 'service']);

    Route::match(['get', 'post'], '/contact' ,['uses' => 'ContactController@index', 'as' => 'contact']);

});


Route::group(['prefix' => 'news', 'middleware' => 'web'], function (){

    Route::get('/detail/{id}', ['uses' => 'NewsController@view', 'as' => 'news_detail']);

    Route::get('/category/{id}/{sort?}', ['uses' => 'NewsController@category', 'as' => 'news_category']);

    Route::get('/{sort?}', ['uses' => 'NewsController@index', 'as' => 'news']);

});


Route::post('/add', ['uses' => 'AddChannelController@add', 'as' => 'add_channel']);

Route::get('/{sort?}', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::get('/category/{id}/{sort?}', ['uses' => 'HomeController@category', 'as' => 'category']);

Route::get('',['uses' => 'ErrorController@index', 'as' => 'error']);




