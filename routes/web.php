<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserSurveyController;
use App\Http\Controllers\AccountPaymentController;
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
    return view('auth.login');
});

Auth::routes(['verify' => true ]);

Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
Route::resource('survey', SurveyController::class)->middleware(['auth', 'verified']);
Route::resource('usersurvey', UserSurveyController::class);
Route::resource('payment', AccountPaymentController::class);
// Route::get('user', [UserController::class, 'selesai'])->name('user.selesai');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
