<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\UserGroupController;

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
Route::post('/auth', [AuthController::class, 'loginApi']);
Route::post('/create_user', [AuthController::class, 'create_user']);
Route::get('/profilApi', [UserController::class, 'profilApi']);
Route::post('/create_group', [UserGroupController::class, 'create_group']);
Route::get('/attendence', [AttendenceController::class, 'attendenceApi']);
Route::post('/checkin', [AttendenceController::class, 'checkin']);
Route::post('/checkout', [AttendenceController::class, 'checkout']);
