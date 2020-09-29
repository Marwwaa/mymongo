<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::any('/me', 'AuthController@me');




