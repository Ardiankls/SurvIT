<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserSurveyController;
use App\Http\Controllers\AccountPaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\MailController as Email;
use App\Http\Controllers\FillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PointLogController;

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
Route::get('/', [HomeController::class, 'index']);

Auth::routes(['verify' => true ]);

Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
Route::resource('survey', SurveyController::class)->middleware(['auth', 'verified']);
Route::resource('usersurvey', UserSurveyController::class)->middleware(['auth', 'verified']);
Route::resource('payment', AccountPaymentController::class)->middleware(['auth', 'verified']);
Route::resource('pointlog', PointLogController::class)->middleware(['auth', 'verified']);
Route::resource('package', PackageController::class);
Route::get('/fill/{slug}', [FillController::class, 'fill'])->name('fill');

Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::resource('mail', Email::class);
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::match(['put', 'patch'], '/usurvey/{usurvey}/{action}', [AdminController::class, 'updateUserSurvey'])->name('admin.usurvey');
    Route::match(['put', 'patch'], '/survey/{survey}/{action}', [AdminController::class, 'updateSurvey'])->name('admin.survey');
    Route::match(['put', 'patch'], '/upayment/{upayment}', [AdminController::class, 'updatePoint'])->name('admin.point');
});

// Route::post('usersurvey/fill', [UserSurveyController::class, 'fill'])->name('usersurvey.fill');
// Route::get('/email', [MailController::class, 'basic_email'])->name('email');
