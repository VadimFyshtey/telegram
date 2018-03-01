<?php

Auth::routes();
Route::get('/logout', ['uses' => 'Admin\HomeController@logout', 'as' => 'admin_logout']);

Route::group(['prefix' => 'news', 'middleware' => 'web'], function (){

    Route::get('/detail/{id}', ['uses' => 'NewsController@view', 'as' => 'news_detail']);

    Route::get('/category/{id}/{sort?}', ['uses' => 'NewsController@category', 'as' => 'news_category']);

    Route::get('/{sort?}', ['uses' => 'NewsController@index', 'as' => 'news']);

});

Route::get('/search', ['uses' => 'ChannelController@search', 'as' => 'search']);

Route::get('/by88', ['uses' => 'HomeController@by', 'as' => 'by88']);

Route::get('/service', ['uses' => 'ServiceController@index', 'as' => 'service']);

Route::match(['get', 'post'], '/contact' ,['uses' => 'ContactController@index', 'as' => 'contact']);

Route::post('/add_channel', ['uses' => 'Add\AddChannelController@add', 'as' => 'add_channel']);

Route::post('/add_trade', ['uses' => 'Add\AddTradeController@add', 'as' => 'add_trade']);

Route::get('/channel/{sort?}', ['uses' => 'ChannelController@index', 'as' => 'channel']);

Route::get('/trade/detail/{id}', ['uses' => 'TradeController@view', 'as' => 'trade_detail']);

Route::get('/trade', ['uses' => 'TradeController@index', 'as' => 'trade']);

Route::get('/category/{id}/{sort?}', ['uses' => 'ChannelController@category', 'as' => 'category']);

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);




