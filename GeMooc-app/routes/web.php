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


Auth::routes();
Route::get('/', 'HomeController@index')->name('dashboard.home');

Route::get('/home', 'HomeController@index')->name('dashboard.home');

// Route::get('/subject', '');

Route::resource('/subject', 'subject_c');
Route::resource('/course', 'course_c');
Route::resource('/lesson', 'lesson_c');



