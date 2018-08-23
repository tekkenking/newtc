<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'   =>  'Governor', 'prefix' => 'governor', 'middleware' => ['auth', 'section:governor']], function(){

});