<?php

use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameResultController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Models\GameResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Auth API

Route::get('/verified-only',[AuthController::class,'verify'])->middleware('auth:sanctum','verified');
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\ResetPasswordController@reset');
Route::get('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify');
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);

//App API
Route::get('/userinfo',[AuthController::class,'userinfo'])->middleware('auth:sanctum');
Route::post('/group',[GroupController::class,'show'])->middleware('auth:sanctum');
Route::post('/student',[StudentController::class,'show'])->middleware('auth:sanctum');
Route::post('/gameresult/save',[GameResultController::class,'store'])->middleware('auth:sanctum');
Route::post('/gameresult/game-results-report',[GameResultController::class,'GameResultsReport'])->middleware('auth:sanctum');
