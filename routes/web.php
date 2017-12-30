<?php

Route::group(['middleware' => 'web'], function (){

    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

    Route::get('/category/{id}', ['uses' => 'HomeController@category', 'as' => 'category']);

    Route::get('/search/', ['uses' => 'HomeController@search', 'as' => 'search']);

    Route::get('/news', ['uses' => 'NewsController@index', 'as' => 'news']);

    Route::get('/news/{id}', ['uses' => 'NewsController@view', 'as' => 'news_detail']);

    Route::get('/service', ['uses' => 'ServiceController@index', 'as' => 'service']);

    Route::match(['get', 'post'], '/contact' ,['uses' => 'ContactController@index', 'as' => 'contact']);



});

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

    Route::get('/', ['uses' => 'Admin\HomeController@index', 'as' => 'admin_home']);

    //News
    Route::group(['prefix' => 'news'], function (){

        Route::get('/', ['uses' => 'Admin\NewsController@index', 'as' => 'admin_news']);

        Route::get('/add', ['uses' => 'Admin\NewsController@add', 'as' => 'admin_news_add']);

        Route::get('/update{id}', ['uses' => 'Admin\NewsController@update', 'as' => 'admin_news_update']);

        Route::get('/delete{id}', ['uses' => 'Admin\NewsController@delete', 'as' => 'admin_news_delete']);

    });

    //Channel
    Route::group(['prefix' => 'channel'], function (){

        Route::get('/', ['uses' => 'Admin\ChannelController@index', 'as' => 'admin_channel']);

        Route::get('/add', ['uses' => 'Admin\ChannelController@add', 'as' => 'admin_channel_add']);

        Route::get('/update{id}', ['uses' => 'Admin\ChannelController@update', 'as' => 'admin_channel_update']);

        Route::get('/delete{id}', ['uses' => 'Admin\ChannelController@delete', 'as' => 'admin_channel_delete']);

    });

    Route::get('/service', ['uses' => 'Admin\ServiceController@index', 'as' => 'admin_service']);

    Route::get('/contact' ,['uses' => 'Admin\ContactController@index', 'as' => 'admin_contact']);

});

Route::post('/add', ['uses' => 'AddChannelController@add', 'as' => 'add_channel']);

Auth::routes();

