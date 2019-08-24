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
Route::get('/register/brand', 'Auth\RegisterController@registration_view')->defaults('user_type',config('constants.brand_user_type'));
Route::get('/register/production', 'Auth\RegisterController@registration_view')->defaults('user_type',config('constants.production_user_type'));
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::post('/production/save', 'ProductionController@store');
	Route::get('/production/view/{id}', 'ProductionController@show');
	Route::get('/production/view', 'BrandController@view');

});

