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
    return view('home');
});

Auth::routes();
Route::get('/student/login','Auth\StudentLoginController@showLoginForm')->name('student.login');
Route::post('/student/login','Auth\StudentLoginController@login')->name('student.login.submit');
Route::get('/student/register','Auth\StudentLoginController@showregiqterForm')->name('student.register');
Route::post('/student/register','Auth\StudentLoginController@registerStudent')->name('student.register.submit');

Route::get('/student', 'StudentController@index')->name('student');

Route::get('/student/exams/result','Student\ExamsController@result',['as'=>'student'])->name('student.exams.result');
Route::get('/student/exams/pass','Student\ExamsController@pass',['as'=>'student'])->name('student.exams.pass');

Route::resource('/student/exams','Student\ExamsController',['as'=>'student']);

Route::get('/teacher', 'HomeController@index');

Route::get('/teacher/exams/{exam}/schedule','Teacher\ExamsController@schedule',['as'=>'teacher'])->name('teacher.exams.schedule');
Route::post('/teacher/exams/doschedule','Teacher\ExamsController@doschedule',['as'=>'teacher'])->name('teacher.exams.doschedule');
Route::get('/teacher/exams/Schedulede','Teacher\ExamsController@Schedulede',['as'=>'teacher'])->name('teacher.exams.Schedulede');
Route::get('/teacher/exams/{exam}/schedEst','Teacher\ExamsController@schedEst',['as'=>'teacher'])->name('teacher.exams.schedEst');

Route::resource('/teacher/exams','Teacher\ExamsController',['as'=>'teacher']);

Route::resource('/teacher/questions','Teacher\QuestionsController',['as'=>'teacher']);

Route::get('/teacher/groups/{group}/schedule','Teacher\GroupsController@schedule',['as'=>'teacher'])->name('teacher.groups.schedule');
Route::post('/teacher/groups/doschedule','Teacher\GroupsController@doschedule',['as'=>'teacher'])->name('teacher.groups.doschedule');

Route::resource('/teacher/groups','Teacher\GroupsController',['as'=>'teacher']);

Route::resource('/teacher/students','Teacher\StudentsController',['as'=>'teacher']);

Route::resource('/teacher/questions/tfquestions','Teacher\TFQuestionsController',['as'=>'teacher']);

Route::resource('/teacher/questions/saquestions','Teacher\SAQuestionController',['as'=>'teacher']);

Route::get("/teacher/questions/mcquestions/create","Teacher\MCQuestionsController@addMore");
Route::post("/teacher/questions/mcquestions/create","Teacher\MCQuestionsController@addMorePost");
Route::resource('/teacher/questions/mcquestions','Teacher\MCQuestionsController',['as'=>'teacher']);

Route::get("/teacher/questions/mrquestions/create","Teacher\MRQuestionsController@addMore");
Route::post("/teacher/questions/mrquestions/create","Teacher\MRQuestionsController@addMorePost");
Route::resource('/teacher/questions/mrquestions','Teacher\MRQuestionsController',['as'=>'teacher']);
