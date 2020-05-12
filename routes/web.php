<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('google');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);

});


Route::resource('/project', 'ProjectsController');
Route::resource('/task', 'TasksController');
Route::resource('/file', 'FilesController');
Route::resource('/meeting', 'MeetingsController');
Route::resource('/contact', 'ContactsController');
Route::resource('/company', 'CompaniesController');
Route::resource('/calendar', 'CalendarsController');
Route::resource('/budget', 'BudgetsController');
Route::resource('/liquidation', 'LiquidationsController');
Route::resource('/user', 'UsersController');
Route::resource('/funding', 'FundingAgenciesController');
Route::resource('/log', 'LogsController');
Route::resource('/report', 'ReportsController');



Route::post('/getUsers','UsersController@getUsers')->name('users.getUsers');
Route::post('/addUserTask','UsersController@addUserTask')->name('users.addUserTask');
    