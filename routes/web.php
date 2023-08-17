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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

//Routes for profiles
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::put('/profile/update/{id}', 'ProfileController@update')->name('profile.update');

//Routes for posts
        Route::get('/posts', 'PostController@index')->name('posts');
        Route::get('/posts/trashed', 'PostController@trashed')->name('posts.trashed');
        Route::get('/post/create', 'PostController@create')->name('post.create');
        Route::post('/post/store', 'PostController@store')->name('post.store');
        Route::get('/post/show/{slug}', 'PostController@show')->name('post.show');
        Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
        Route::get('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
        Route::get('/post/softDeletes/{id}', 'PostController@softDeletes')->name('post.softDeletes');
        Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

//Routes for tags
        Route::post('/tag/store', 'TagController@store')->name('tag.store');
        Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
        Route::get('/tag/destroy/{id}', 'TagController@destroy')->name('tag.destroy');

//Routes for users
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/user/admin_dashboard', 'UserController@dashboard')->name('user.dashboard');
        Route::post('/user/admin_user/{id}', 'UserController@admin_user')->name('user.admin_user');
        Route::post('/user/store', 'UserController@store')->name('user.store');
        Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
        Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');



//Routes for comments
        Route::post('comments/store', 'CommentController@store')->name('comments.store');
        Route::get('comments/destroy/{id}', 'CommentController@destroy')->name('comments.destroy');

//Routes for search
 Route::get('/search', 'SearchController@search')->name('search');

