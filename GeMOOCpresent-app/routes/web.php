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
    return view('content.main');
});

Route::get('/question', function () {
    return view('content.question');
});

Route::get('/manual', function () {
    return view('content.man');
});

Route::get('/subject', function () {
    return view('content.subject.index');
});
