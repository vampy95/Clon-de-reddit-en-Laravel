<?php

Auth::routes();

//Para acceder a estas rutas tienes que estar autentificado
Route::group(['middleware' => 'auth'], function(){

	Route::get('/home', 'HomeController@index')->name('home');

	Route::name('create_post_path')->get('/posts/create', 'PostsController@Create');

	Route::name('store_post_path')->post('/posts', 'PostsController@store');

	Route::name('edit_post_path')->get('/posts/{post}/edit', 'PostsController@edit');

	Route::name('update_post_path')->put('/post/{post}', 'PostsController@update');

	Route::name('delete_post_path')->delete('posts/{post}', 'PostsController@delete');

	Route::name('create_comment_path')->post('/post/{post}/comments', 'PostsCommentsController@create');

});


Route::get('/', 'PostsController@index');

Route::name('posts_path')->get('/posts', 'PostsController@index');

Route::name('post_path')->get('/posts/{post}', 'PostsController@show');

