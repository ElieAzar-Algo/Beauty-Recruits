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
    return view('home');
})->name('home');

Route::post('/applicant/login', 'ApplicantController@login');
Route::post('/applicant/register', 'ApplicantController@register');

Route::post('/company/login', 'CompanyController@login');
Route::post('/company/register', 'CompanyController@register');

Route::get('/logout', 'AuthController@logout');

Route::get('/login-page', 'AuthController@indexLogin')->name('login');
Route::get('/register-page', 'AuthController@indexRegister')->name('register');

Route::get('/waiting-verification', function(){
    return view('waitingVerification');
})->name('waiting.verification');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
