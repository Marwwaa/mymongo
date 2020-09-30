<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//User routs
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::any('/me', 'AuthController@me');


//Categories routs
Route::post('/createCategory', 'CategoryController@create');
Route::post('/updateCategory', 'CategoryController@update');
Route::any('/deleteCategory', 'CategoryController@destroy');
Route::get('/getAllCategories', 'CategoryController@getAllCategories');


//Posts routs
Route::post('/createPost', 'PostController@create');
Route::post('/updatePost', 'PostController@update');
Route::any('/deletePost', 'PostController@destroy');
Route::any('/getAllPosts', 'PostController@getAllPosts');
