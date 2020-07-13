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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/students', 'StudentsController')->middleware('auth.basic');
Route::get('/answers/search','SearchsController@findAnswer')->name('answers.search');
Route::resource('/answers', 'AnswersController')->middleware('auth.basic');
Route::post('/reports/{answer}','ReportsController@store')->name('reports.store');

//subjects
Route::get('/subjects','SubjectsController@index')->name('subjects.index');
Route::get('/subjects/{subject}','SubjectsController@show')->name('subjects.show');
Route::post('/subjects','SubjectsController@store')->name('subjects.store');
Route::delete('/subjects/{subject}','SubjectsController@destroy')->name('subjects.destroy');


//live search
Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');
