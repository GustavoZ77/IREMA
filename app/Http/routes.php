<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

/* Route for test */
Route::get('/create', ['as' => 'article_create', 'uses' => 'ArticleController@create']);

Route::get('/index', ['as' => 'article_create', 'uses' => 'ArticleController@index']);

Route::post('article_store', ['as' => 'article_store', 'uses' => 'ArticleController@store']);

/* Route for Priority */
Route::get('/priority/', ['as' => 'priority_index', 'middleware' => 'auth:admin', 'uses' => 'PriorityController@index']);

Route::get('/priority/create', ['as' => 'priority_create','middleware' => 'auth:admin', 'uses' => 'PriorityController@create']);

Route::get('/priority/admin', ['as' => 'priority_admin', 'middleware' => 'auth:admin','uses' => 'PriorityController@index']);

Route::get('/priority/edit/{id}', ['as' => 'priority_edit','middleware' => 'auth:admin', 'uses' => 'PriorityController@edit']);

Route::get('/priority/view/{id}', ['as' => 'priority_view','middleware' => 'auth:admin', 'uses' => 'PriorityController@show']);

Route::post('/priority/store', ['as' => 'priority_store','middleware' => 'auth:admin', 'uses' => 'PriorityController@store']);

patch('/priority/{priority}', ['middleware' => 'auth:admin', 'uses'=>'PriorityController@update']);

delete('/priority/{priority}',['middleware' => 'auth:admin', 'uses'=>'PriorityController@destroy']);

/* Route for Type_Incident */
Route::get('/typeincident/', ['as' => 'typeincident_index', 'middleware' => 'auth:admin','uses' => 'TypeIncidentController@index']);

Route::get('/typeincident/create', ['as' => 'typeincident_create','middleware' => 'auth:admin', 'uses' => 'TypeIncidentController@create']);

Route::post('/typeincident/store', ['as' => 'typeincident_store','middleware' => 'auth:admin', 'uses' => 'TypeIncidentController@store']);

Route::get('/typeincident/edit/{id}', ['as' => 'typeincident_edit','middleware' => 'auth:admin', 'uses' => 'TypeIncidentController@edit']);

Route::get('/typeincident/view/{id}', ['as' => 'typeincident_view','middleware' => 'auth:admin', 'uses' => 'TypeIncidentController@show']);

patch('/typeincident/{typeincident}',['middleware' => 'auth:admin','uses'=>'TypeIncidentController@update']);

delete('/typeincident/{typeincident}',['middleware' => 'auth:admin', 'uses'=>'TypeIncidentController@destroy']);

/* Route for application */
Route::get('/app/', ['as' => 'app_index', 'middleware' => 'auth:admin','uses' => 'ApplicationController@index']);

Route::get('/app/create', ['as' => 'app_create', 'middleware' => 'auth:admin','uses' => 'ApplicationController@create']);

Route::post('/app/store', ['as' => 'app_store','middleware' => 'auth:admin', 'uses' => 'ApplicationController@store']);

Route::get('/app/edit/{id}', ['as' => 'app_edit','middleware' => 'auth:admin', 'uses' => 'ApplicationController@edit']);

Route::get('/app/view/{id}', ['as' => 'app_view','middleware' => 'auth:admin', 'uses' => 'ApplicationController@show']);

patch('/app/{application}',['middleware' => 'auth:admin', 'uses'=>'ApplicationController@update']);

delete('/app/{app}', ['middleware' => 'auth:admin','uses'=>'ApplicationController@destroy']);

/* Route for customer */
Route::get('/customer/', ['as' => 'customer_index','middleware' => 'auth:admin', 'uses' => 'CustomerController@index']);

Route::get('/customer/create', ['as' => 'customer_create','middleware' => 'auth:admin', 'uses' => 'CustomerController@create']);

Route::post('/customer/store', ['as' => 'customer_store','middleware' => 'auth:admin', 'uses' => 'CustomerController@store']);

Route::get('/customer/edit/{id}', ['as' => 'customer_edit','middleware' => 'auth:admin', 'uses' => 'CustomerController@edit']);

Route::get('/customer/view/{id}', ['as' => 'customer_view','middleware' => 'auth:admin', 'uses' => 'CustomerController@show']);

patch('/customer/{customer}', ['middleware' => 'auth:admin','uses'=>'CustomerController@update']);

delete('/customer/{customer}',['middleware' => 'auth:admin', 'uses'=>'CustomerController@destroy']);

/* Route for customer */
Route::get('/user/', ['as' => 'user_index','middleware' => 'auth:admin', 'uses' => 'UserController@index']);

Route::get('/user/create', ['as' => 'user_create','middleware' => 'auth:admin', 'uses' => 'UserController@create']);

Route::post('/user/store', ['as' => 'user_store','middleware' => 'auth:admin', 'uses' => 'UserController@store']);

Route::get('/user/edit/{id}', ['as' => 'customer_edit','middleware' => 'auth:admin', 'uses' => 'UserController@edit']);

Route::get('/user/view/{id}', ['as' => 'customer_view','middleware' => 'auth:admin', 'uses' => 'UserController@show']);

patch('/user/{user}', ['middleware' => 'auth:admin','uses'=>'UserController@update']);

delete('/user/{user}',['middleware' => 'auth:admin', 'uses'=>'UserController@destroy']);

/* Route for incidents */
Route::get('/incident/', ['as' => 'incident_index','middleware' => 'auth:admin,user,support','uses' => 'IncidentController@index']);

Route::get('/incident/create', ['as' => 'incident_create','middleware' => 'auth:admin,user,support','uses' => 'IncidentController@create']);

Route::post('/incident/store', ['as' => 'incident_store', 'middleware' => 'auth:admin,user,support','uses' => 'IncidentController@store']);

Route::get('/incident/edit/{id}', ['as' => 'incident_edit','middleware' => 'auth:admin', 'uses' => 'IncidentController@edit']);

Route::get('/incident/view/{id}', ['as' => 'incident_view','middleware' => 'auth:admin,user,support','uses' => 'IncidentController@show']);

patch('/incident/work/{incident}',['middleware' => 'auth:admin,support','uses'=>'IncidentController@updateToWorkInProgress']);

patch('/incident/complete/{incident}',['middleware' => 'auth:admin,support','uses'=>'IncidentController@updateToSolution']);

delete('/incident/{incident}', ['middleware' => 'auth:admin','uses'=>'IncidentController@destroy']);

patch('/incident/{incident}', ['middleware' => 'auth:admin','uses'=>'IncidentController@update']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes... not implemented yet
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
