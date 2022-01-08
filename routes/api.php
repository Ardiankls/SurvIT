<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\MySurveyController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('api-register', [RegisterController::class, 'register']);
Route::post('api-login', [LoginController::class, 'login']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', [LoginController::class, 'logout']);
    Route::apiResource('surveys', SurveyController::class);
    Route::apiResource('mysurveys', MySurveyController::class);
    Route::apiResource('user', UserController::class);
});