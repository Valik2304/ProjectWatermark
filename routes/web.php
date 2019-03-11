<?php

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'images', 'namespace' => 'Images'], function () {

    Route::match(['get', 'post'], '/', ['uses' => 'AddImageController@execute', 'as' => 'imagesAdd']);

});