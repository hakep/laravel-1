<?php


//маршруты для админки
Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::resource('pages', 'PageController');

    Route::get('files', ['as' => 'files.index', 'uses' => 'FileController@index']);
    Route::get('files/{name}', ['as' => 'file', 'uses' => 'FileController@getFile']);
    Route::put('files/{name}', ['as' => 'file.update', 'uses' => 'FileController@updateFile']);
});


//маршруты для самого сайта
Route::get('/', function () {
    return view('site.pages.index');
});

Route::get('/{url}', ['as' => 'url', 'uses' => 'IndexController@page']);