<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {


    return redirect()->route('home',['version'=>Config::get('documentation.latest')]);

});



Route::get('{version}', [ 'as' => 'home', 'uses' => 'DocumentationController@index' ]);
Route::get('{version}/{page}', [ 'as' => 'page', 'uses' => 'DocumentationController@show' ]);
