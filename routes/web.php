<?php


//маршруты для админки
Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::resource('pages', 'PageController', ['except' => ['show']]);

    Route::get('files', ['as' => 'files.index', 'uses' => 'FilesController@index']);
    Route::get('files/{name}', ['as' => 'files', 'uses' => 'FilesController@getFile']);
    Route::put('files/{name}', ['as' => 'files.update', 'uses' => 'FilesController@updateFile']);
    Route::delete('files/{name}', ['as' => 'files.destroy', 'uses' => 'FilesController@updateFile']);

});


//маршруты для самого сайта
Route::get('/', function () {
    return view('site.pages.index');
});

Route::get('/{url}', ['as' => 'url', 'uses' => 'IndexController@page']);