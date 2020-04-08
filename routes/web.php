<?php

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

Route::get('/','WelcomeController@index'); 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::resource('/categories', 'CategoryController')->middleware('auth');
Route::resource('/posts', 'PostController')->middleware('auth');
Route::resource('/tags', 'TagController')->middleware('auth');
Route::get('/trashed-posts', 'PostController@trashed')->name('posts.index')->middleware('auth');
Route::get('/trashed-posts/{id}', 'PostController@restore')->name('trashed.restore')->middleware('auth');

Route::middleware(['auth','Admin'])->group(function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    Route::get('/users','UsersController@index')->name('users.index');
   Route::post('/users/{user}/makeadmin','UsersController@makeAdmin')->name('users.makeadmin');
});

Route::middleware(['auth'])->group(function (){
   Route::get('/users/{user}/profile','UsersController@edit')->name('users.edit');
   Route::post('/users/{user}/profile','UsersController@update')->name('users.update'); 
});