<?php

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'images', 'namespace' => 'Images'], function () {

    Route::get('/','ImageController@execute');

    Route::match(['get' ,'post'], '/add', ['uses' => 'AddImageController@execute', 'as' => 'imagesAdd']);

});
