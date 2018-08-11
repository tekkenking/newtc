<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'   =>  'Customer', 'prefix' => 'customer', 'middleware' => ['auth', 'section:customer']], function(){

});