<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can reGuide ster web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Str;
use App\Mail\newMail;
use App\Http\Controllers\laravelExcelTest;

//New STD-viewer
Route::get('std/login', function () {
    return view('pagestudent.login.Login_std');
});

//New admin-teacher
Route::get('at/index', function () {
    return view('admin-teach.webapp.login.Index');
});

Route::get('course/{content}/editor', function () {
    return view('admin-teach.webapp.content.subject.courses.coursecontent.Content');
});

Route::get('/guide_book', function () {
    return view('admin-teach.webapp.content.gb.guideBook');
});

Route::post('content/order_update', 'backend\content_c@order_update');

/**
 *  all test route
 * */
Route::get('test/{id}', 'test@export');
Route::get('/test', function () {
    return view('test2');
});
Route::get('/email', function () {
    return new newMail();
});
// Route::get('userExport', 'laravelExcelTest@export');
// Route::get('uploadVideo', 'VideoController@index');
// Route::resource('/video', 'VideoController');

//New STD-viewer
Route::get('/register', function () {
    return view('pagestudent.login.Register');
});
Route::get('/forget', function () {
    return view('pagestudent.login.Forget');
});
// Route::get('test', 'test@export');
// Route::post('import', 'test@import');


Route::get('std_view/profile', function () {
    return view('pagestudent.profile.Profile');
});
Route::post('std_view/profile/upddateProfile', 'ProfileController@update');

// use File;
Auth::routes();

Route::prefix('login')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');
});

Route::group(['middleware' => 'auth'], function () {
    // recordBar
    Route::post('/callRecordBar', 'RecordController@makeRecord');

    Route::get('/std_view/course/quiz/previewquiz', 'Std_viewer@Std_quizPreview');

    // video
    Route::resource('/video', 'VideoController');

    // profile
    Route::post('/profile/updateImage', 'ProfileController@updatePhoto');
    Route::post('/profile/upddateProfile', 'ProfileController@update');

    // report
    Route::resource('/report', 'ReportController');

    // record
    Route::resource('/record', 'RecordController');

    Route::get('page/content/quiz', function () {
        return view('pagestudent.subject.course.quiz.quiz');
    });

    // student_view
    Route::get('/std_view/home', 'Std_viewer@Std_home');
    Route::get('/std_view/manual', 'Std_viewer@manual');
    Route::get('/std_view/faq', 'Std_viewer@FAQ');


    Route::get('/std_view/subject', 'Std_viewer@all_subject');
    Route::get('/std_view/subject/{subject}', 'Std_viewer@show_subject');
    Route::get('/std_view/course/{course}', 'Std_viewer@Std_course');
    Route::get('/std_view/course/{course}/enroll', 'Std_viewer@course_enroll');

    Route::get('/std_view/course/content/{content}', 'Std_viewer@show_content');
    Route::post('/std_view/course/content/{content}/submit_quiz', 'Std_viewer@submit_quiz');
    Route::post('/std_view/course/content/{content}/submit_article', 'Std_viewer@submit_article');
    Route::get('/std_view/course/content/{content}/dashboard', 'Std_viewer@show_dashboard');


    Route::post('get_time', function () {
        $time = session('time');
        if ($time >= 0) {
            $time--;
            session(['time' => $time]);
            echo $time;
        } else {
            echo 0;
        }
    });


    Route::group(['middleware' => ['mdgStudent']], function () {
        Route::resource('/profile', 'ProfileController');

        // Route::post('/profile/updateImage', 'ProfileController@updatePhoto');
        // Route::post('/profile/upddateProfile', 'ProfileController@update');

        Route::get('/', 'HomeController@index')->name('dashboard.home');
        Route::get('/home', 'HomeController@index')->name('dashboard.home');
        Route::get('/yourprofile', 'HomeController@YourProfile');

        Route::get('/payment-setting', 'payment@Home');

        Route::get('/quiz/show', function () {
            return view('quiz.Show');
        });

        Route::resource('/image_slide', 'image_slideController');
        // Route::get('/FAQ', 'image_slideController@FAQ_index');
        Route::post('ajaximage', function () {
            $file = Request::file('file');
            $destinationPath = public_path() . '/uploads/';
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $file->move($destinationPath, $fileNameToStore);
            echo url('/uploads/' . $fileNameToStore);
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
        Route::resource('/subject', 'backend\subject_c');
        Route::post('subject/modal/edit', 'backend\subject_c@modal_edit');

        // Resource controller
        Route::resource('/course', 'backend\course_c');
        Route::resource('/lesson', 'backend\lesson_c');
        Route::resource('/content', 'backend\content_c');
        Route::resource('/article', 'backend\articleController');
        Route::resource('/quiz', 'backend\quizController');
        Route::get('/quiz/{quiz}/dashboard', 'backend\quizController@quiz_dashboard');
        Route::resource('/teach', 'backend\teachController');
        Route::resource('/question', 'backend\questionController');
        Route::resource('/student', 'backend\studentController');
        Route::resource('/admin', 'admin');

        /**
         * Route course
         */
        Route::get('/course/{course}/users', 'backend\course_c@users');
        Route::post('/course/{course}/add_user', 'backend\course_c@add_user');
        Route::post('/course/{course}/delete_user', 'backend\course_c@delete_user');
        Route::post('/course/{course}/edit_user', 'backend\course_c@update_role');

        /**
         * Route teach
         */
        Route::post('teach/{user}/editModal', 'backend\teachController@edit');

        /**
         * Route Student
         */
        Route::post('student/{user}/editModal', 'backend\studentController@edit');

        /**
         * Route admin
         */
        Route::post('admin/{id}/editModal', 'admin@edit');


        // Administrator & SuperAdministrator Control Panel Routes
        // Route::group(['middleware' => ['role:administrator']], function () {
        //     Route::resource('users', 'UsersController');
        //     Route::resource('permission', 'PermissionController');
        //     Route::resource('roles', 'RolesController');
        // });
        // Dashboard
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        Route::post('course/modal/edit', 'backend\course_c@modal_edit');
        Route::post('question/modal/edit', 'backend\questionController@modal_edit');
        Route::get('quiz/export/{id}', 'backend\quizController@export');
        Route::post('quiz/import/{id}', 'backend\quizController@import');
    });
});
// middle ware to any route
