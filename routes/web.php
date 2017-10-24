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



Route::group(['middleware'=>['web']], function() {
	Route::get('/', function () {
    	return view('welcome');
	})->name('home');

	Route::post('/signup', [
		'uses'=>'UserController@postSignup',
		'as'=>'signup'
	]);

	Route::post('/signin', [
		'uses'=>'UserController@postSignin',
		'as'=>'signin'
	]);

	Route::get('/dashboard', [
		'uses'=>'PostController@getDashboard',
		'as'=>'dashboard',
		'middleware'=>'auth'
	]);

	Route::get('/logout', [
		'uses'=>'UserController@logout',
		'as'=>'logout',
		
	]);

	Route::get('/account',[
		'uses' => 'UserController@getAccount',
		'as'=>'account',
		'middleware' => 'auth'
	]);

	Route::post('/updateaccount',[
		'uses' => 'UserController@postSaveAccount',
		'as' => 'account.save'
	]);

	Route::get('userimage/{filename}',[
		'uses'=>'UserController@getUserImage',
		'as'=>'account.image'
	]);

	Route::get('/login', [
		'uses'=>'UserController@login',
		'as'=>'login',
		
	]);

	Route::post('/createpost', [
		'uses'=>'PostController@postCreatePost',
		'as'=>'post.create',
		'middleware'=>'auth'
		
	]);

	Route::get('/delete-post/{post_id}', [
		'uses'=>'PostController@getDeletePost',
		'as'=>'post.delete',
		'middleware'=>'auth'
		
	]);

	Route::post('/edit', [
		'uses' => 'PostController@postEditPost',
		'as' => 'edit',
		'middleware'=>'auth'

	]);

	Route::post('/like', [
		'uses' => 'PostController@postLikePost',
		'as' => 'like',
		'middleware'=>'auth'

	]);

});


