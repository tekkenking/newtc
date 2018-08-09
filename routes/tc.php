<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'   =>  'Tc', 'prefix' => 'tc'], function(){

    Route::get('/', [
        'as'    => 'dashboard',
        'uses'  =>  'DashboardController@index'
    ]);

    Route::group(['prefix' => 'staff'], function(){
        Route::get('/', [
            'as'    =>  'tc.staff.index',
            'uses'  =>  'StaffController@index'
        ]);

        Route::get('add', [
            'as'    =>  'tc.staff.add',
            'uses'  =>  'StaffController@add'
        ]);

        Route::post('store', [
            'as'    =>  'tc.staff.store',
            'uses'  =>  'StaffController@store'
        ]);

        Route::get('edit/{id}', [
            'as'    =>  'tc.staff.edit',
            'uses'  =>  'StaffController@edit'
        ]);

        Route::post('update/{id}', [
            'as'    =>  'tc.staff.update',
            'uses'  =>  'StaffController@update'
        ]);
    });

    Route::group(['prefix' => 'acl'], function(){
        Route::get('/', [
            'as'    =>  'acl',
            'uses'  =>  'AclController@getRoles'
        ]);

        Route::group(['prefix' => 'role'], function(){
            Route::get('/',[
                'as'    =>  'acl.role.index',
                'uses'  =>  'AclController@getRoles'
            ]);

            Route::get('add', [
                'as'    =>  'acl.role.add',
                'uses'  =>  'AclController@addRole'
            ]);

            Route::post('store', [
                'as'    =>  'acl.role.store',
                'uses'  =>  'AclController@storeRole'
            ]);

            Route::get('edit/{id}', [
                'as'    =>  'acl.role.edit',
                'uses'  =>  'AclController@editRole'
            ]);

            Route::post('update', [
                'as'    =>  'acl.role.update',
                'uses'  =>  'AclController@updateRole'
            ]);
        });

        Route::group(['prefix' => 'permission'], function(){
            Route::get('/',[
                'as'    =>  'acl.permission.index',
                'uses'  =>  'AclController@getPermissions'
            ]);

            Route::get('add', [
                'as'    =>  'acl.permission.add',
                'uses'  =>  'AclController@addPermission'
            ]);

            Route::post('store', [
                'as'    =>  'acl.permission.store',
                'uses'  =>  'AclController@storePermission'
            ]);

            Route::get('edit/{id}', [
                'as'    =>  'acl.permission.edit',
                'uses'  =>  'AclController@editPermission'
            ]);

            Route::post('update', [
                'as'    =>  'acl.permission.update',
                'uses'  =>  'AclController@updatePermission'
            ]);

        });
    });

    Route::group(['prefix' => 'agency'], function (){

        Route::group(['prefix' => 'details'], function(){
            Route::get('/{id}', [
                'as'    =>  'tc.agency.details.index',
                'uses'  =>  'AgencyController@detailsIndex'
            ]);

            Route::get('{id}/packages', [
                'as'    =>  'tc.agency.details.packages',
                'uses'  =>  'AgencyController@detailsPackages'
            ]);

            Route::get('{id}/info', [
                'as'    =>  'tc.agency.details.info',
                'uses'  =>  'AgencyController@detailsInfo'
            ]);
        });

        Route::get('/', [
            'as'    =>  'tc.agency.index',
            'uses'  =>  'AgencyController@index'
        ]);

        Route::get('add', [
            'as'    =>  'tc.agency.add',
            'uses'  =>  'AgencyController@add'
        ]);

        Route::post('store', [
            'as'    =>  'tc.agency.store',
            'uses'  =>  'AgencyController@store'
        ]);

        Route::get('edit/{id}', [
            'as'    =>  'tc.agency.edit',
            'uses'  =>  'AgencyController@edit'
        ]);

        Route::post('update', [
            'as'    =>  'tc.agency.update',
            'uses'  =>  'AgencyController@update'
        ]);

    });

});