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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/terms-conditions', 'TermConditionController@index')->name('terms-conditions');
Route::get('/privacy-policy', 'PrivacyPolicyController@index')->name('privacy-policy');
Route::get('/disclaimers', 'DisclaimersController@index')->name('disclaimers-page');
Route::get('/dmca', 'DmcaController@index')->name('dmca-page');
Route::get('/faq', 'FaqController@index')->name('faq-page');

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

Route::get('/not-verified', function(){
    return view('front.not-verified');
})->name('not-verified');


Route::get('/job-listing','JobController@index')->name('job-listing');
Route::get('/job-details/{id}','JobController@show')->name('job-details');

Route::get('/applicant-listing','ApplicantController@index')->name('applicant-listing');

Route::get('/company-listing','CompanyController@index')->name('company-listing');
Route::get('/company-details/{id}','CompanyController@showDetails')->name('company-details');

Route::get('/download-resume/{id}', 'ApplicantController@downloadResume');


//Companies auth Group
Route::group(['middleware' => ['auth:company']], function(){

    Route::get('/company-profile','CompanyController@show')->name('company-profile');
    Route::post('/company-update','CompanyController@update');
    Route::get('/company-post-job','JobController@create');
    Route::post('/company-post-job','JobController@post');
});


// Applicants auth Group
Route::group(['middleware' => ['auth:applicant']], function(){

    Route::get('/applicant-profile','ApplicantController@show')->name('applicant-profile');
    Route::post('/applicant-answer', 'AnswerController@store');
    Route::post('/applicant-update','ApplicantController@update');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
