<?php

use Illuminate\Support\Facades\Route;



Route::prefix('')
    ->middleware('auth')
    ->name("SuperAdmin.")
    ->group(function () {
        Route::match(array('GET', 'POST'), "/SuperAdmin/list", 'listController@index')->name('list.index');
    });