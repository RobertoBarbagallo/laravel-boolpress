<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Access\AuthorizationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');

Route::middleware('auth:api')->get("/posts", "api\PostController@index");

Route::get('/login', function(){
    $credentials = request()->only(['email', 'password']);
    $token = auth()->Gate::authorize($credentials);
    return $token;
});