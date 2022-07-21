<?php

use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccessController;
use App\Http\Controllers\GameResultController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SessionGameController;
use App\Http\Controllers\StudentController;
use App\Models\GameResult;
use App\Models\SessionGame;
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



// Auth API

Route::post('/user/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
// Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');
// Route::post('/password/reset', 'Api\ResetPasswordController@reset');
Route::get('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify');
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);
Route::get('/user_info',[AuthController::class,'user_info'])->middleware('auth:sanctum');


Route::group(['middleware'=>['auth:sanctum','CheckRole:manager']],function(){
//Game results API 
    Route::apiResource('gameresult',GameResultController::class)->only('show');
    Route::post('/gameresult/create',[GameResultController::class,'create_session_game_result']);
    Route::put('/gameresult/update',[GameResultController::class,'update_session_game_result']);
    Route::post('/gameresult/report',[GameResultController::class,'report']);
//Groups API
    Route::apiResource('group',GroupController::class);
//Session games API
    Route::apiResource('sessiongame',SessionGameController::class)->only('show','destroy');
//Students API
    Route::apiResource('student',StudentController::class);
});

Route::group(['middleware'=>['auth:sanctum','CheckRole:admin']],function(){
    //User meister API 
    Route::apiResource('/useraccess',UserAccessController::class)->only('store','update');
});

// Route::group(['middleware'=>['auth:sanctum','CheckRole:admin'],'prefix'=>'user/admin'],function(){
//     //User admin API 
//     Route::post('/create',[UserAccessController::class,'create_any_user']);
// });
    







