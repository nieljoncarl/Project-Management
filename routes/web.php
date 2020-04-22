<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);

});


Route::resource('/project', 'ProjectsController');
Route::resource('/task', 'TasksController');
Route::resource('/file', 'FilesController');
Route::resource('/contact', 'ContactsController');
Route::resource('/company', 'CompaniesController');
Route::resource('/calendar', 'CalendarsController');
Route::resource('/budget', 'BudgetsController');
Route::resource('/liquidation', 'LiquidationsController');