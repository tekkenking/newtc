<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace'   =>  'Noauth'], function(){

    Route::get('login', [
        'as'    => 'login',
        'uses'  =>  'LoginController@index'
    ]);

    Route::post('login', [
        'as'    =>  'post.login.page',
        'uses'  =>  'LoginController@login'
    ]);

    Route::get('logout', [
        'as'    =>  'get.logout.action',
        'uses'  =>  'LoginController@logout'
    ]);

});

Route::get('lgas/state', [
    'as'    =>  'get.state.lgas',
    'uses'  =>  'Controller@getStateLgas'
]);