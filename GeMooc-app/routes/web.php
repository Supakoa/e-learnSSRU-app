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

// middle ware to any route
Route::group(['middleware' => ['mdgStudent']], function () {


    Route::get('/', 'HomeController@index')->name('dashboard.home');
    Route::get('/home', 'HomeController@index')->name('dashboard.home');

    Route::get('/test', 'test_sumernote@index');

    Route::get('/payment-setting', 'payment@Home');
    Route::get('/report', 'Report@index')->middleware('student');

    Route::get('/quiz/show', function () {
        return view('quiz.Show');
    });
    Route::get('/quiz/edit', function(){
        return view('quiz.Edit');
    });

    Route::get('/std_view/course/quiz', 'Std_viewer@Std_quiz');
    Route::get('/std_view/course/quiz/dashboard', 'Std_viewer@Std_quizDashboard');

    Route::get('/std_view/home', 'Std_viewer@Std_home');
    Route::get('/std_view/subject', 'Std_viewer@Std_subject');
    Route::get('/std_view/showcourse', 'Std_viewer@Std_showcourse');
    Route::get('/std_view/course', 'Std_viewer@Std_course');
    Route::get('/std_view/payment', 'Std_viewer@Std_payment');
    // Route::get('/up_image','test_sumernote@up_image');

    Route::post('ajaximage', function () {
        $file = Request::file('file');
        $destinationPath = public_path().'/uploads/';
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore= $filename.'_'.time().'.'.$extension;

        $file->move($destinationPath, $fileNameToStore);
        echo url('/uploads/'.$fileNameToStore);
    });

    Route::post('ajaximage_delete', function () {
        $src = Request::input('src');
        $src = Str::substr($src, 21);
        if (unlink(public_path($src))) {
            echo "Success";
        }
    });

    // Route::get('test', function ($id) {

    /**
    * Route Sub
    */
    Route::resource('/subject', 'subject_c')->middleware('student');
    Route::post('subject/modal/edit', 'subject_c@modal_edit')->middleware('student');

    // Resource controller
    Route::resource('/course', 'course_c')->middleware('student');
    Route::resource('/lesson', 'lesson_c')->middleware('student');
    Route::resource('/content', 'content_c')->middleware('student');
    Route::resource('/article', 'articleController')->middleware('student');
    Route::resource('/quiz', 'quizController')->middleware('student');
    Route::resource('/teach', 'teachController')->middleware('student');
    Route::resource('/question', 'questionController')->middleware('student');
    Route::resource('/student', 'studentController')->middleware('student');

    /**
     * Route course
     */
    Route::get('/course/{course}/users','course_c@users');
    Route::post('/course/{course}/add_user','course_c@add_users');

    /**
     * Route teach
     */
    // Route::get('/teach', 'teach@Teach');
    // Route::post('/teach/create', 'teach@createTeach');
    // Route::delete('/teach/{user}', 'teach@deleteTeach');
    Route::post('teach/{user}/editModal', 'teachController@edit')->middleware('student');

    /**
     * Route Student
     */
    // Route::get('/student', 'student@Student');
    // Route::post('student/create', 'student@createStudent');
    // Route::delete('student/{user}', 'student@deleteStudent');
    Route::post('student/{user}/editModal', 'studentController@edit')->middleware('student');


    // Administrator & SuperAdministrator Control Panel Routes
    // Route::group(['middleware' => ['role:administrator']], function () {
    //     Route::resource('users', 'UsersController');
    //     Route::resource('permission', 'PermissionController');
    //     Route::resource('roles', 'RolesController');
    // });
    // Dashboard
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::post('course/modal/edit', 'course_c@modal_edit');
    Route::post('question/modal/edit', 'questionController@modal_edit');

});
