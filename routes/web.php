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
Route::get('/applicant/login', 'ApplicantController@login');

Route::post('/applicant/login', 'ApplicantController@login');
Route::get('/applicant/login', 'ApplicantController@login');

Route::post('/applicant/register', 'ApplicantController@register');
Route::get('/applicant/register', 'ApplicantController@register');

Route::post('/applicant/reset-password', 'ApplicantController@reset');
Route::get('/applicant/reset-password', 'ApplicantController@reset');

Route::post('/applicant/change-password', 'ApplicantController@updatePassword');
Route::get('/applicant/change-password', 'ApplicantController@updatePassword');

Route::post('/company/reset-password', 'CompanyController@reset');
Route::get('/company/reset-password', 'CompanyController@reset');

Route::post('/company/change-password', 'CompanyController@updatePassword');
Route::get('/company/change-password', 'CompanyController@updatePassword');

Route::post('/company/login', 'CompanyController@login');
Route::get('/company/login', 'CompanyController@login');

Route::post('/company/register', 'CompanyController@register');
Route::get('/company/register', 'CompanyController@register');

Route::get('/logout', 'AuthController@logout');

Route::get('/login-page', 'AuthController@indexLogin')->name('login');
Route::get('/register-page', 'AuthController@indexRegister')->name('register');
Route::get('/reset-password', 'AuthController@indexResetPassword')->name('reset');
Route::get('/change-password', 'AuthController@forgotPasswordValidate')->name('change-password');
Route::get('/company-reset-password', 'AuthController@indexCompanyResetPassword')->name('company-reset');
Route::get('/company-change-password', 'AuthController@forgotCompanyPasswordValidate')->name('company-change-password');

Route::get('/waiting-verification', function () {
    return view('front.waiting-verification');
})->name('waiting-verification');

Route::get('/not-verified', function () {
    return view('front.not-verified');
})->name('not-verified');


Route::get('/price-listing', 'PriceController@index')->name('price-listing');


Route::get('/job-listing', 'JobController@index')->name('job-listing');
Route::get('/job-details/{id}', 'JobController@show')->name('job-details');
Route::get('/job-delete/{id}', 'JobController@jobDelete')->name('job-delete');
Route::post('/job-update/{id}', 'JobController@jobUpdate')->name('job-update');
Route::get('/job-update/{id}', 'JobController@jobEdit')->name('job-edit');
Route::get('/view-candidate/{id}/job/{job_id}', 'JobController@getCandidate')->name('view-candidate');

Route::get('/applicant-listing', 'ApplicantController@index')->name('applicant-listing');
Route::get('/applicant-listing/{id}', 'ApplicantController@getPdf')->name('applicant-listing-pdf');

Route::get('/company-listing', 'CompanyController@index')->name('company-listing');
Route::get('/company-details/{id}', 'CompanyController@showDetails')->name('company-details');

Route::get('/download-resume/{id}', 'ApplicantController@downloadResume');


//Companies auth Group
Route::group(['middleware' => ['auth:company']], function () {

    Route::get('/company-profile', 'CompanyController@show')->name('company-profile');
    Route::get('/company-dashboard', 'CompanyController@dashboard')->name('company-dashboard');
    Route::post('/company-update', 'CompanyController@update');
    Route::get('/company-update', 'CompanyController@update');
    Route::get('/company-post-job', 'JobController@create');
    Route::post('/company-post-job', 'JobController@post');

//    Route::get('/billing-information', 'JobController@showBillingInformation')->name('billing-information');
    Route::post('/billing-information', 'JobController@billingInformationRequest');

    Route::get('/company-subscription', 'JobController@showSubscription')->name('company-subscription');
    Route::post('/company-subscription', 'PriceController@subscriptionRequest');
    Route::get('/stripe', 'StripeController@stripe')->name('stripe.get');;
    Route::post('/stripe', 'StripeController@stripePost')->name('stripe.post');
});


// Applicants auth Group
Route::group(['middleware' => ['auth:applicant']], function () {

    Route::get('/applicant-profile', 'ApplicantController@show')->name('applicant-profile');
    Route::get('/applicant-dashboard', 'ApplicantController@dashboard')->name('applicant-dashboard');
    Route::post('/applicant-answer', 'AnswerController@store');
    Route::get('/applicant-answer', 'AnswerController@store');

    Route::post('/applicant-update', 'ApplicantController@update');
    Route::get('/applicant-update', 'ApplicantController@update');
    Route::get('/job-history', 'ApplicantController@history')->name('job-history');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
