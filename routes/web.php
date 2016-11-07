<?php

//маршруты для админки
Route::group(['prefix' => 'admin'], function(){

    Route::get('/', function(){
       return view('admin.index');
    });

    Route::resource('pages', 'PageController');
});



//маршруты для самого сайта
Route::get('/', function () {
    return view('site.pages.index');
});

Route::get('/{url}', ['as' => 'url', 'uses' => 'IndexController@page']);