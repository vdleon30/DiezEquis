<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@dashboard')->middleware('auth')->name('dashboard');


Route::get('/users', 'UsersController@index')->middleware('auth')->name('users');
Route::get('/users/create', 'UsersController@create')->middleware('auth')->name('users.create');
Route::post('/users/save', 'UsersController@save')->middleware('auth')->name('users.save');
Route::get('/users/edit/{id}', 'UsersController@edit')->middleware('auth')->name('users.edit');
Route::post('/users/update', 'UsersController@update')->middleware('auth')->name('users.update');
Route::get('/users/destroy/{id}', 'UsersController@destroy')->middleware('auth')->name('users.destroy');



Route::get('/posts', 'PostsController@index')->middleware('auth')->name('posts');
Route::get('/posts/create', 'PostsController@create')->middleware('auth')->name('posts.create');
Route::post('/posts/save', 'PostsController@save')->middleware('auth')->name('posts.save');
Route::get('/posts/edit/{id}', 'PostsController@edit')->middleware('auth')->name('posts.edit');
Route::post('/posts/update', 'PostsController@update')->middleware('auth')->name('posts.update');
Route::get('/posts/destroy/{id}', 'PostsController@destroy')->middleware('auth')->name('posts.destroy');


Route::get('/posts/view/{id}', 'PostsController@view')->middleware('auth')->name('posts.view');



Route::post('/comments/save', 'CommentsController@save')->middleware('auth')->name('comments.save');

