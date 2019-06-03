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
use Illuminate\Support\Str;

// use File;
Auth::routes();
Route::get('/', 'HomeController@index')->name('dashboard.home');

Route::get('/home', 'HomeController@index')->name('dashboard.home');
Route::get('/test', 'test_sumernote@index');

/**
 * Route teach ..
 */
Route::get('/teach', 'teach@Teach');
Route::post('/teach/create', 'teach@createTeach');
Route::delete('/teach/{user}', 'teach@deleteStudent');

/**
 * Route Student
 */
Route::get('/student', 'student@Student');
Route::post('student/create', 'student@createStudent');
Route::delete('student/{user}', 'student@deleteStudent');

Route::get('/payment-setting', 'payment@Home');
Route::get('/report', 'Report@index');

Route::get('/quiz/show', function(){
return view('quiz.Show');
});
Route::get('/quiz/edit', function(){
    return view('quiz.Edit');
    });
// Route::get('/up_image','test_sumernote@up_image');
Route::post('ajaximage', function(){
    $file = Request::file('file');
    $destinationPath = public_path().'/uploads/';
    $filenameWithExt = $file->getClientOriginalName();
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $file->getClientOriginalExtension();
    $fileNameToStore= $filename.'_'.time().'.'.$extension;

    $file->move($destinationPath, $fileNameToStore);
    echo url('/uploads/'.$fileNameToStore);
});

Route::post('ajaximage_delete', function(){
    $src = Request::input('src');
    $src = Str::substr($src,21);
    if(unlink(public_path($src))){
        echo "Success";
    }
});

// Route::get('test', function ($id) {

// Route::get('/subject', '');

Route::resource('/subject', 'subject_c');
Route::resource('/course', 'course_c');
Route::resource('/lesson', 'lesson_c');
Route::resource('/content', 'content_c');
Route::resource('/article', 'articleController');
Route::resource('/quiz', 'quizController');



// Administrator & SuperAdministrator Control Panel Routes
// Route::group(['middleware' => ['role:administrator']], function () {
//     Route::resource('users', 'UsersController');
//     Route::resource('permission', 'PermissionController');
//     Route::resource('roles', 'RolesController');
// });
// Dashboard
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::post('subject/modal/edit','subject_c@modal_edit');
Route::post('course/modal/edit','course_c@modal_edit');


