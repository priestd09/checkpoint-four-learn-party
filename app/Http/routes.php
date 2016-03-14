<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    /**
     * Learn party root
     */
    Route::get('/', 'HomeController@index');

    /**
     * Get authenitcated user's profile page
     */
    Route::get('profile', 'UserController@profile');

    /**
     * Update an authenticated user's profile page
     */
    Route::put('profile/edit', 'UserController@update');

    /**
     * Update an authenticated user's avatar
     */
    Route::patch('profile/edit/avatar', 'UserController@updateAvatar');

    /**
     * redirect to social auth login using socialite
     */
    Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');

    /**
     * Handlr scoail auth provider feedback data
     */
    Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});
