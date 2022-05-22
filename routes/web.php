<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserSurveyController;
use App\Http\Controllers\AccountPaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\MailController as Email;
use App\Http\Controllers\FillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
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
Route::get('/', function(){
    return view('landingPage');
});

Auth::routes(['verify' => true ]);

Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
Route::post('/updateDemography', [UserController::class, 'addDemography'])->middleware(['auth', 'verified'])->name('user.add.demography');
Route::resource('survey', SurveyController::class)->middleware(['auth', 'verified']);
Route::match(['put', 'patch'], '/survey/payment/{payment}', [SurveyController::class, 'payment'])->middleware(['auth', 'verified'])->name('survey.payment');
Route::resource('usersurvey', UserSurveyController::class)->middleware(['auth', 'verified']);
Route::resource('payment', AccountPaymentController::class)->middleware(['auth', 'verified']);
Route::resource('pointlog', PointLogController::class)->middleware(['auth', 'verified']);
Route::resource('package', PackageController::class);
Route::get('/pdf_guide', [SurveyController::class, 'pdfGuide'])->name('openGuide');
Route::get('/fill/{url}', [FillController::class, 'fill'])->name('fill');
Route::get('/datashop', function(){
    return view('datashop');
});

Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::resource('mail', Email::class);
    Route::get('/{type}', [AdminController::class, 'index'])->name('admin.index');
    Route::match(['put', 'patch'], '/usurvey/{usurvey}/{action}', [AdminController::class, 'updateUserSurvey'])->name('admin.usurvey');
    Route::match(['put', 'patch'], '/survey/{survey}/{action}', [AdminController::class, 'updateSurvey'])->name('admin.survey');
    Route::match(['put', 'patch'], '/point/{upoint}', [AdminController::class, 'updatePoint'])->name('admin.point');
    Route::match(['put', 'patch'], '/payment/{survey}/{action}', [AdminController::class, 'updatePayment'])->name('admin.payment');
    Route::get('/blast-new-demography/{point}', [MailController::class, 'send_new_demography'])->name('mail.blast-new-demography');
    Route::get('/blast-match-new-survey/{survey}', [MailController::class, 'send_match_demography'])->name('mail.blast-match-new-survey');
    Route::post('/blast-all-new-survey', [MailController::class, 'send_all_demography'])->name('mail.blast-all-new-survey');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect('/');
});
