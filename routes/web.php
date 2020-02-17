<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'RegisterController@index');
Route::get('/login', 'RegisterController@login');
Route::Post('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

        //Auth::routes();

        Route::get('/logout', 'HomeController@destroy');
        Route::get('/users/create', 'RegisterController@register');
        Route::Post('/users', 'RegisterController@store');
        Route::get('/users', 'RegisterController@show');
        Route::get('/users/{individual_user}', 'RegisterController@showbyuserid');
        Route::Post('/users/{user}/comments', 'CommentsController@store');

});

