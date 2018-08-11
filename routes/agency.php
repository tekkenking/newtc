<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'   =>  'Agency', 'prefix' => 'agency', 'middleware' => ['auth', 'section:agency']], function(){

    Route::get('/', [
        'as'    =>  'agency.index',
        'uses'  =>  'DashboardController@index'
    ]);

    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/', [
            'as'    =>  'agency.dashboard.index',
            'uses'  =>  'DashboardController@index'
        ]);
    });

    Route::group(['prefix' => 'staff'], function() {
        Route::get('/', [
            'as'    =>  'agency.staff.list',
            'uses'  =>  'StaffController@index'
        ]);

        Route::get('add', [
            'as'    =>  'agency.staff.add',
            'uses'  =>  'StaffController@add'
        ]);

        Route::post('store', [
            'as'    =>  'agency.staff.store',
            'uses'  =>  'StaffController@store'
        ]);

        Route::get('edit/{id}', [
            'as'    =>  'agency.staff.edit',
            'uses'  =>  'StaffController@edit'
        ]);

        Route::post('update/{id}', [
            'as'    =>  'agency.staff.update',
            'uses'  =>  'StaffController@update'
        ]);

    });

    Route::group(['prefix'  =>  'bill'], function () {
        Route::get('/', [
            'as'    =>  'agency.bill.list',
            'uses'  =>  'BillController@fixedIndex'
        ]);

        Route::get('add', [
            'as'    =>  'agency.bill.add',
            'uses'  =>  'BillController@add'
        ]);

        Route::post('store', [
            'as'    =>  'agency.bill.store',
            'uses'  =>  'BillController@store'
        ]);

        Route::get('edit/{id}', [
            'as'    =>  'agency.bill.edit',
            'uses'  =>  'BillController@edit'
        ]);

        Route::post('update/{id}', [
            'as'    =>  'agency.bill.update',
            'uses'  =>  'BillController@update'
        ]);
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', [
            'as'    =>  'agency.customers.list',
            'uses'  =>  'CustomerController@index'
        ]);


    });

});