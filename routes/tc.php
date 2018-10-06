<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'     =>  'Tc',
    'prefix'        => 'tc',
    'as'            => 'tc.',
    'middleware'    => ['auth', 'section:tc']], function(){

    Route::get('/', [
        'as'    => 'dashboard',
        'uses'  =>  'DashboardController@index'
    ]);

    Route::group(['prefix' => 'staff', 'as' => 'staff.'], function(){
        Route::get('/', [
            'as'    =>  'index',
            'uses'  =>  'StaffController@index'
        ]);

        Route::get('add', [
            'as'    =>  'add',
            'uses'  =>  'StaffController@add'
        ]);

        Route::post('store', [
            'as'    =>  'store',
            'uses'  =>  'StaffController@store'
        ]);

        Route::get('edit/{id}', [
            'as'    =>  'edit',
            'uses'  =>  'StaffController@edit'
        ]);

        Route::post('update/{id}', [
            'as'    =>  'update',
            'uses'  =>  'StaffController@update'
        ]);
    });

    Route::group(['prefix' => 'acl'], function(){
        Route::get('/', [
            'as'    =>  'get.roles',
            'uses'  =>  'AclController@getRoles'
        ]);

        Route::group(['prefix' => 'role', 'as' => 'acl.role.'], function(){
            Route::get('/',[
                'as'    =>  'index',
                'uses'  =>  'AclController@getRoles'
            ]);

            Route::get('add', [
                'as'    =>  'add',
                'uses'  =>  'AclController@addRole'
            ]);

            Route::post('store', [
                'as'    =>  'store',
                'uses'  =>  'AclController@storeRole'
            ]);

            Route::get('edit/{id}', [
                'as'    =>  'edit',
                'uses'  =>  'AclController@editRole'
            ]);

            Route::post('update', [
                'as'    =>  'update',
                'uses'  =>  'AclController@updateRole'
            ]);
        });

        Route::group(['prefix' => 'permission', 'as' => 'acl.permission.'], function(){
            Route::get('/',[
                'as'    =>  'index',
                'uses'  =>  'AclController@getPermissions'
            ]);

            Route::get('add', [
                'as'    =>  'add',
                'uses'  =>  'AclController@addPermission'
            ]);

            Route::post('store', [
                'as'    =>  'store',
                'uses'  =>  'AclController@storePermission'
            ]);

            Route::get('edit/{id}', [
                'as'    =>  'edit',
                'uses'  =>  'AclController@editPermission'
            ]);

            Route::post('update', [
                'as'    =>  'update',
                'uses'  =>  'AclController@updatePermission'
            ]);

        });
    });

    Route::group(['prefix' => 'agency', 'as' => 'agency.'], function (){

        Route::get('/', [
            'as'    =>  'index',
            'uses'  =>  'AgencyController@index'
        ]);

        Route::get('add', [
            'as'    =>  'add',
            'uses'  =>  'AgencyController@add'
        ]);

        Route::post('store', [
            'as'    =>  'store',
            'uses'  =>  'AgencyController@store'
        ]);

        Route::get('edit/{id}', [
            'as'    =>  'edit',
            'uses'  =>  'AgencyController@edit'
        ]);

        Route::post('update', [
            'as'    =>  'update',
            'uses'  =>  'AgencyController@update'
        ]);

        Route::group(['prefix' => 'details', 'as' => 'details.'], function(){
            Route::get('/{id}', [
                'as'    =>  'index',
                'uses'  =>  'AgencyController@detailsIndex'
            ]);

            Route::get('{id}/packages', [
                'as'    =>  'packages',
                'uses'  =>  'AgencyController@detailsPackages'
            ]);

            Route::get('{id}/info', [
                'as'    =>  'info',
                'uses'  =>  'AgencyController@detailsInfo'
            ]);
        });

    });

    Route::group(['prefix'  =>  'barcode', 'as' => 'barcode.'], function() {
        Route::get('', [
            'as'    =>  'index',
            'uses'  =>  'BarcodeController@index'
        ]);
    });

});