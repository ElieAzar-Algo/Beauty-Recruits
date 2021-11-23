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
Route::get('/acceptable-use-policy', 'AcceptableUsePolicyController@index')->name('acceptable-use-policy');
Route::get('/faq', 'FaqController@index')->name('faq-page');

Route::post('/applicant/login', 'ApplicantController@login');
Route::get('/applicant/login', function () {
    return redirect('/home');
});
Route::post('/applicant/register', 'ApplicantController@register');
Route::get('/applicant/register', function () {
    return redirect('/home');
});
Route::post('/applicant/reset-password', 'ApplicantController@reset');
Route::get('/applicant/reset-password', function () {
    return redirect('/home');
});
Route::post('/applicant/change-password', 'ApplicantController@updatePassword');
Route::get('/applicant/change-password', function () {
    return redirect('/home');
});
Route::post('/company/reset-password', 'CompanyController@reset');
Route::get('/company/reset-password', function () {
    return redirect('/home');
});

Route::post('/company/change-password', 'CompanyController@updatePassword');
Route::get('/company/change-password', function () {
    return redirect('/home');
});

Route::post('/company/login', 'CompanyController@login');
Route::get('/company/login', function () {
    return redirect('/home');
});


Route::post('/company/register', 'CompanyController@register');
Route::get('/company/register', function () {
    return redirect('/home');
});

Route::get('/logout', 'AuthController@logout');

Route::get('/login-page', 'AuthController@indexLogin')->name('login');
Route::get('/register-page', 'AuthController@indexRegister')->name('register');
Route::get('/reset-password', 'AuthController@indexResetPassword')->name('reset');
Route::get('/change-password', 'AuthController@forgotPasswordValidate')->name('change-password');
Route::get('/company-reset-password', 'AuthController@indexCompanyResetPassword')->name('company-reset');
Route::get('/company-change-password', 'AuthController@forgotCompanyPasswordValidate')->name('company-change-password');

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



//Companies auth Group Beauty Recruits
Route::group(['middleware' => ['auth:company']], function(){

    Route::get('/company-profile','CompanyController@show')->name('company-profile');
    Route::post('/company-update','CompanyController@update');
    Route::get('/company-update', function () {
        return redirect('/home');
    });

    Route::get('/company-post-job','JobController@create');
    Route::post('/company-post-job','JobController@post');
});


// Applicants auth Group
Route::group(['middleware' => ['auth:applicant']], function(){

    Route::get('/applicant-profile','ApplicantController@show')->name('applicant-profile');
    Route::post('/applicant-answer', 'AnswerController@store');
    Route::get('/applicant-answer', function () {
        return redirect('/home');
    });
    Route::post('/applicant-update','ApplicantController@update');
    Route::get('/applicant-update', function () {
        return redirect('/home');
    });
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
