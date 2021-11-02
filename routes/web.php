<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserSurveyController;
use App\Http\Controllers\AccountPaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MailController as Email;
use App\Http\Controllers\MailController;
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
Route::get('/', [LoginController::class, 'login']);

Auth::routes(['verify' => true ]);

Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
Route::resource('survey', SurveyController::class)->middleware(['auth', 'verified']);
Route::resource('payment', AccountPaymentController::class);
Route::resource('usersurvey', UserSurveyController::class)->middleware(['auth', 'verified']);

Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    // Route::resource('usersurvey', UserSurveyController::class);
    Route::resource('mail', Email::class);
});

// Route::post('usersurvey/fill', [UserSurveyController::class, 'fill'])->name('usersurvey.fill');
// Route::get('/email', [MailController::class, 'basic_email'])->name('email');
