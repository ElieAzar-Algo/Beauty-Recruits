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

Route::get('/home', function () {
    return view('front.home');
})->name('home');

Route::post('/applicant/login', 'ApplicantController@login');
Route::post('/applicant/register', 'ApplicantController@register');

Route::post('/company/login', 'CompanyController@login');
Route::post('/company/register', 'CompanyController@register');

Route::get('/logout', 'AuthController@logout');

Route::get('/login-page', 'AuthController@indexLogin')->name('login');
Route::get('/register-page', 'AuthController@indexRegister')->name('register');

Route::get('/waiting-verification', function(){
    return view('front.waiting-verification');
})->name('waiting-verification');


Route::get('/job-listing','JobController@index')->name('job-listing');
Route::get('/job-details/{id}','JobController@show')->name('job-details');
//Companies Group
Route::group(['middleware' => ['auth:company']], function(){

    Route::get('/company-profile','CompanyController@show')->name('company-profile');
    Route::post('/company-update','CompanyController@update');
    Route::get('/company-post-job','JobController@create');
    Route::post('/company-post-job','JobController@post');

});

// Applicants Group
Route::group(['middleware' => ['auth:applicant']], function(){

    Route::get('/applicant-profile','ApplicantController@show');
    Route::post('/applicant-answer', 'AnswerController@store');

});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
