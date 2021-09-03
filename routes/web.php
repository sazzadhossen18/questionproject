<?php

use Illuminate\Support\Facades\Route;

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



///Frontend Route
Route::get('/', 'QuestionController@view')->name('question.view');
Route::get('/questions', 'HomeController@index')->name('home');
Route::get('/questions/details/{slug}', 'QuestionController@details')->name('question.details');
Route::get('/how-work', 'QuestionController@howwork')->name('how.work');
Route::post('/answers/{answer}/accept', 'AcceptAnswerController@accept')
                ->name('accept.answers');
 Route::post('/questions/{question}/vote', 'VoteQuestionController@vote')
                ->name('questions.vote');
Route::post('/answers/{answer}/vote', 'VoteAnswerController@vote')
                ->name('answers.vote');

Route::get('/search/questions', 'QuestionController@view')->name('search.questions');



Route::middleware(['auth'])->group(function () {

///Frontend Route
 Route::get('/questions/add', 'QuestionController@add')->name('question.add');
Route::post('/questions/store', 'QuestionController@store')->name('question.store');
Route::get('/questions/edit/{id}', 'QuestionController@edit')->name('question.edit');
Route::post('/questions/update/{id}', 'QuestionController@update')->name('question.update');
Route::get('/questions/delete/{id}', 'QuestionController@delete')->name('question.delete');

});


Route::resource('questions.answers', 'AnswerController')
        ->except(['index','create','show']);



Route::get('/user-profile','ProfileController@userprofile')->name('user.profile');
Route::post('/user-image-update','ProfileController@update')->name('profiles.update');
Route::post('/password/update','ProfileController@passwordUpdate')->name('profiles.password.update');
