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

Route::get('/', function () {
    return view('welcome');
});

// backend

Route::get('/backend/{post_type}', [
	'as' => 'post.posts',
	'uses' => 'PostsController@posts'
]);

Route::get('/backend/{post_type}/create', [
	'as' => 'post.create',
	'uses' => 'PostsController@post_create'
]);
// 
Route::post('/backend/post/insert', [
	'as' => 'post.insert',
	'uses' => 'PostsController@post_insert'
]);

Route::get('/backend/{post_type}/edit/{id}', [
	'as' => 'post.edit',
	'uses' => 'PostsController@post_edit'
]);

Route::put('/backend/post/update', [
	'as' => 'post.update',
	'uses' => 'PostsController@post_update'
]);

Route::get('/backend/{post_type}/trash/{id}', [
	'as' => 'post.trash',
	'uses' => 'PostsController@post_trash'
]);

Route::get('/backend/{post_type}/restore/{id}', [
	'as' => 'post.restore',
	'uses' => 'PostsController@post_restore'
]);

Route::get('/backend/{post_type}/delete', [
	'as' => 'post.delete',
	'uses' => 'PostsController@post_delete'
]);

// end backend


// frontend

// end frontend