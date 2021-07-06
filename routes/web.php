<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();


Route::get("/", "PostController@index")->name("posts.index");
Route::get("/posts/{slug}", "PostController@show")->name("posts.show");

Route::prefix('SuperAdmin')
    ->namespace('SuperAdmin')
    ->middleware('auth')
    ->name("SuperAdmin.")
    ->group(function () {

        Route::match(array('GET', 'POST'), '/topics', 'TopicController@index')->name('topics.index');
        Route::resource("/topics", "TopicController")->only(['create', 'destroy']);
        Route::post("/topics/store", 'TopicController@store')->name('topics.store.store');
        Route::get('/list', 'ListController@index')->name('SuperAdmin.list.index');
        Route::resource("/posts", "PostController");
        Route::resource("/tags", "TagController")->only(['index', 'create', 'store', 'destroy']);
    });
