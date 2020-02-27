<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', 'RegisterController@index');
Route::Post('/', 'HomeController@index')->name('home');
Route::Post('/user/logout', 'RegisterController@destroy');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {

        //Auth::routes();
        Route::get('/try', 'RegisterController@trylogin');
        Route::Post('/try', 'RegisterController@tryloginpost');
        Route::get('/logout', 'HomeController@destroy');
        Route::get('/create', 'RegisterController@register');
        Route::Post('/users', 'RegisterController@store');
        Route::get('/users', 'RegisterController@show');
        Route::get('/users/{individual_user}', 'RegisterController@showbyuserid');
        Route::Post('/users/{user}/comments', 'CommentsController@store');

        //try in here
        Route::Post('/posts', 'RegisterController@store_new');
        Route::Post('/validate_username', 'RegisterController@validate_username');

});

