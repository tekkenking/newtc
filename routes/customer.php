<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'     =>  'Customer',
    'prefix'        => 'customer',
    'middleware'    => ['auth', 'section:customer'],
    'as'            => 'customer.',
], function(){
    Route::get('', [
        'as'    =>  'dashboard',
        'uses'  =>  'DashboardController@index'
    ]);

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

       Route::get('', [
           'as'    =>  'show',
           'uses'  =>  'ProfileController@index'
       ]);

       Route::get('edit', [
           'as'     =>  'edit',
           'uses'   =>  'ProfileController@edit'
       ]);

       Route::post('update', [
           'as'     =>  'update',
           'uses'   =>  'ProfileController@update'
       ]);

    });

    Route::group(['prefix' => 'agencies', 'as'  =>  'agency.'], function () {
        Route::get('', [
            'as'    =>  'show',
            'uses'  =>  'AgencyController@index'
        ]);
    });

    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('', [
            'as'    =>  'tabs',
            'uses'  =>  'ReportController@index'
        ]);

        Route::get('paymenthistory', [
            'as'    =>  'paymenthistory',
            'uses'  =>  'ReportController@paymenthistory'
        ]);

        Route::get('billhistory', [
            'as'    =>  'billhistory',
            'uses'  =>  'ReportController@billhistory'
        ]);
    });
});