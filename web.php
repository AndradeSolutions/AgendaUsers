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

// Rotas dinâmicas para operações CRUD
// Criar, Listar, Atualizar, Editar, Remover
//
// Route::group(['prefix', 'categorias'], function()
// {
// 		Route::get('', ['as' => 'index', 'uses' => 'CategoryController@index']);
// 		Route::get('criar', ['as' => 'create', 'uses' => 'CategoryController@create']);
// 		Route::post('salvar', ['as' => 'store', 'uses' => 'CategoryController@store']);
// 		Route::get('{id}/editar', ['as' => 'edit', 'uses' => 'CategoryController@edit']);
// 		Route::post('{id}/atualizar', ['as' => 'update', 'uses' => 'CategoryController@update']);
// 		Route::get('{id]/remover}', ['as' => 'destroy', 'uses' => 'CategoryController@destroy']);
// });


Route::group(['prefix', 'login'], function() {
	Route::get('/', 'UsersController@index');
	
	Route::get('/login', 'UsersController@login');
	Route::post('/execute_login', 'UsersController@executeLogin');
	
	Route::get('/create', 'UsersController@createNewAccount');
	Route::post('/execute_create', 'UsersController@executeCreateNewAccount');
	
	Route::get('/recovery', 'UsersController@passwordRecovery');	
	Route::post('/execute_recovery', 'UsersController@executePasswordRecovery');	
});

Route::group(['prefix', 'application'], function() {
	Route::get('application', 'ApplicationController@viewInitialPage');
});

Route::group(['prefix', 'logout'], function() {
	Route::get('application_logout', 'UsersController@userLogout');
});

Route::group(['prefix', 'email'], function() {
	Route::get('application_email', 'UsersController@emailSent');
});



Route::get('agenda_index', 'BookController@index');
Route::get('agenda_create', 'BookController@create');
Route::post('/save_book', 'BookController@store');
Route::get('/manage_book', 'BookController@management');

//TO EDIT AND UPDATE
Route::get('/edit_book/{id}', 'BookController@edit');
Route::post('/update_book/{id}', 'BookController@update');

//TO DELETE
Route::get('/delete_book/{id}', 'BookController@destroy');
