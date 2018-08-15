<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'   =>  'Customer', 'prefix' => 'customer', 'middleware' => ['auth', 'section:customer']], function(){
    Route::get('', [
        'as'    =>  '',
        'uses'  =>  'DashboardController@index'
    ]);

    Route::group(['prefix' => 'profile'], function () {

       Route::get('', [
           'as'    =>  'profile.show',
           'uses'  =>  'ProfileController@index'
       ]);

       Route::get('edit', [
           'as'     =>  'profile.edit',
           'uses'   =>  'ProfileController@edit'
       ]);

       Route::post('update', [
           'as'     =>  'profile.update',
           'uses'   =>  'ProfileController@update'
       ]);

    });
});