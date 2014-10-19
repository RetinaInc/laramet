<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'admin'), function()
{
	Route::get('account', 'AdminSettingController@getAccount');
	Route::post('account', 'AdminSettingController@postAccount');

	Route::get('password', 'AdminSettingController@getPassword');
	Route::post('password', 'AdminSettingController@postPassword');

	Route::get('login', 'AdminAuthController@getLogin');
	Route::post('login', 'AdminAuthController@postLogin');

	Route::get('logoutlogout', function()
	{
		Auth::logout();
		
		return Redirect::to('admin/login');
	});

	Route::get('reminder', 'AdminRemindersController@getRemind');
	Route::post('reminder', array('before' => 'csrf', 'uses' => 'AdminRemindersController@postRemind'));

	Route::get('reset/{token}', 'AdminRemindersController@getReset');
	Route::post('reset/{token}', 'AdminRemindersController@postReset');

	Route::group(array('before' => 'authAdmin|admin'), function()
	{
		Route::get('dashboard', 'AdminController@getDashboard');
	});

	Route::when('*', 'csrf', array('post', 'put', 'delete'));
});

