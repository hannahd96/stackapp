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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');

// Users Route
Route::resource('users', 'UserController');
Route::post('users.store', 'UserController@store')->name('users.store');
Route::get('users.edit.{id}', 'UserController@edit')->name('users.edit');

// Questions Route
Route::resource('questions', 'QuestionController');
Route::get('questions.create', 'QuestionController@create')->name('questions.create');
Route::post('questions.store', 'QuestionController@store')->name('questions.store');
Route::get('questions.edit.{id}', 'QuestionController@edit')->name('questions.edit');

// Questionnaires Route
Route::resource('questionnaires', 'QuestionnaireController');
Route::get('questionnaires.create', 'QuestionnaireController@create')->name('questionnaires.create');
Route::post('questionnaires.store', 'QuestionnaireController@store')->name('questionnaires.store');

// Admin Routes
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

// Profile Routes
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');