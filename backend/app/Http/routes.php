<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function ()
{
    return 'Welcome to default Mulodo Api example page';
});

Route::post('/authentication/signin', 'TokenAuth\TokenAuthController@authenticate');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['create', 'edit']]);
});