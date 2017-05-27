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

Route::post('/check/email',['as' =>'check_email','uses'=>'UserController@checkEmail']);

Route::post('/check/user',['as' =>'check_user','uses'=>'UserController@checkUsername']);

Route::post('/register', ['as' =>'register','uses'=>'UserController@signUp']);

Route::post('/profile', ['as' =>'profile','uses'=>'UserController@profile']);


Route::post('/login',['as' =>'register','uses'=>'UserController@logIn']);

Route::get('/show/{id}','HomeAppController@showInfo')->name('showinfo');

Route::post('/create/normal',['as' =>'register','uses'=>'NormalValueController@create']);

Route::post('/create/urine',['as' =>'creat_urine','uses'=>'UrineTestController@create']);

Route::post('/create/biochemical',['as' =>'create_bio','uses'=>'BiochemicalValueController@create']);

Route::post('/update/profile',['as' =>'update_user','uses'=>'UserController@update']);

Route::post('/update/normal',['as' =>'update_normal','uses'=>'NormalValueController@update']);

Route::post('/update/urine',['as' =>'update_urine','uses'=>'UrineTestController@update']);

Route::post('/update/biochemical',['as' =>'update_bio','uses'=>'BiochemicalValueController@update']);

Route::post('/delete/normal',['as' =>'delete_nomal','uses'=>'NormalValueController@delete']);

Route::post('/delete/urine',['as' =>'delete_urine','uses'=>'UrineTestController@delete']);

Route::post('/delete/biochemical',['as' =>'delete_biochemical','uses'=>'BiochemicalValueController@delete']);
// admin
Route::group(['prefix'=>'admin'], function(){
	Route::get('/',['as'=>'get.login', 'uses'=>'AdminController@login']);
	Route::get('/login',['as'=>'get.login', 'uses'=>'AdminController@login']);
	Route::get('/logout',['as'=>'logout', 'uses'=>'AdminController@logout']);
	Route::post('/login',['as'=>'post.login', 'uses'=>'AdminController@postLogin']);
	Route::get('/profileAdmin',['as'=>'profileAdmin', 'uses'=>'AdminController@profile']);
	Route::post('/updateAdmin',['as'=>'updateAdmin', 'uses'=>'AdminController@profileUpdate']);
	//Route::get('/home',['as'=>'home', 'uses'=>'AdminController@index']);
	Route::get('/user',['as'=>'user', 'uses'=>'UserController@listUser']);
	Route::get('/list_normal',['as'=>'list_normal', 'uses'=>'UserController@countNormal']);
	Route::get('/list_biochemical',['as'=>'list_biochemical', 'uses'=>'UserController@countBiochemical']);
	Route::get('/list_urine',['as'=>'list_urine', 'uses'=>'UserController@countUrine']);
	Route::post('/change',['as'=>'change_status', 'uses'=>'UserController@changeStatus']);
	Route::post('/search',['as'=>'post.search_name', 'uses'=>'UserController@postsearchName']);	
	Route::post('/delete_urine',['as' =>'delete.urine','uses'=>'UrineTestController@deleteAjax']);
	Route::post('/delete_normal',['as' =>'delete.normal','uses'=>'NormalValueController@deleteAjax']);
	Route::post('/delete_biochemical',['as' =>'delete.biochemical','uses'=>'BiochemicalValueController@deleteAjax']);


	
});