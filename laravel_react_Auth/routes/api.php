<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//login route
Route::post('/login',[AuthController::class,'Login']);
//register route
Route::post('/register',[AuthController::class,'Register']);
//forget password route
Route::post('/forgetpassword',[ForgetPasswordController::class,'ForgetPassword']);
//reset password
Route::post('/resetPassword',[ResetController::class,'ResetPassword']);
//current user Route 
Route::get('/user',[UserController::class,'User'])->middleware('auth:api');