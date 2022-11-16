<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\HotController;
use App\Http\Controllers\InternalController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', [DashboardController::class, 'index']);

Route::get('/user-group',[UserGroupController::class,'index'])->name('user-group');
Route::post('/user-group',[UserGroupController::class,'store']);
Route::post('/edit-group',[UserGroupController::class,'edit']);
Route::post('/delete-group',[UserGroupController::class,'destroy']);

Route::get('/user',[UserController::class,'index']);
Route::get('/user/create',[UserController::class,'create']);
Route::post('/user',[UserController::class,'store']);
Route::get('/edit/user/{id}',[UserController::class,'edit']);
Route::post('/update/user',[UserController::class,'update']);
Route::delete('/delete/user/{id}',[UserController::class,'destroy']);

Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/create',[AdminController::class,'create']);
Route::post('/admin',[AdminController::class,'store']);
Route::get('/edit/admin/{id}',[AdminController::class,'edit']);
Route::post('/update/admin',[AdminController::class,'update']);
Route::delete('/delete/admin/{id}',[AdminController::class,'destroy']);

Route::get('/job-safety-analysis', [JobController::class, 'index']);
Route::get('/job-safety-analysis/create',[JobController::class,'create'])->name('create-job');
Route::post('/job-safety-analysis',[JobController::class,'store']);
Route::get('/edit/job-safety-analysis/{id}',[JobController::class,'edit']);;
Route::post('/update/job-safety-analysis',[JobController::class,'update']);
Route::delete('/delete/job-safety-analysis/{id}',[JobController::class,'destroy']);
Route::get('/job-safety-analysis/export/{id}', [JobController::class, 'export']);
Route::get('/job-safety-analysis/export-excel', [JobController::class, 'exportExcel']);

Route::post('/add-aar', [JobController::class, 'storeAar']);
Route::post('/editadd-aar', [JobController::class, 'editAddAar']);
Route::post('/edit-aar', [JobController::class, 'updateAar']);
Route::post('/edit/update-aar', [JobController::class, 'editupdateAar']);
Route::post('/delete-aar', [JobController::class, 'destroyAar']);
Route::post('delete/aar/{id}',[JobController::class,'editdestroyAar']);

Route::get('/internal-purchase-requestion', [InternalController::class, 'index']);
Route::get('/internal-purchase-requestion/create',[InternalController::class,'create'])->name('create-internal');
Route::post('/internal-purchase-requestion',[InternalController::class,'store']);
Route::get('/edit/internal-purchase-requestion/{id}',[InternalController::class,'edit']);
Route::post('/update/internal-purchase-requestion',[InternalController::class,'update']);
Route::delete('/delete/internal-purchase-requestion/{id}',[InternalController::class,'destroy']);
Route::get('/internal-purchase-requestion/export/{id}', [InternalController::class, 'export']);
Route::get('/internal-purchase-requestion/export-excel', [InternalController::class, 'exportExcel']);

Route::post('/add-detail', [InternalController::class, 'storeDetail']);
Route::post('/editadd-detail', [InternalController::class, 'editAddDetail']);
Route::post('/edit-detail', [InternalController::class, 'updateDetail']);
Route::post('/edit/update-detail', [InternalController::class, 'editupdatedetail']);
Route::post('/delete-detail', [InternalController::class, 'destroyDetail']);
Route::post('delete/detail/{id}',[InternalController::class,'editdestroydetail']);


Route::get('/hot-work-premit', [HotController::class, 'index']);
Route::get('/hot-work-premit/create',[HotController::class,'create'])->name('create-hot');
Route::post('/hot-work-premit',[HotController::class,'store']);
Route::get('/edit/hot-work-premit/{id}',[HotController::class,'edit']);
Route::post('/update/hot-work-premit',[HotController::class,'update']);
Route::delete('/delete/hot-work-premit/{id}',[HotController::class,'destroy']);
Route::get('/hot-work-premit/export/{id}', [HotController::class, 'export']);
Route::get('/hot-work-premit/export-excel', [HotController::class, 'exportExcel']);


Route::post('/add-equipment', [HotController::class, 'storeEquipment']);
Route::post('/editadd-equipment', [HotController::class, 'editAddequipment']);
Route::post('/edit-equipment', [HotController::class, 'updateEquipment']);
Route::post('/edit/update-equipment', [HotController::class, 'editupdateequipment']);
Route::post('/delete-equipment', [HotController::class, 'destroyEquipment']);
Route::post('delete/equipment/{id}',[HotController::class,'editdestroyequipment']);

// Route::get('/work-at-height-premit', [WorkController::class, 'index']);
// Route::get('/work-at-height-premit/create',[WorkController::class,'create']);
// Route::post('/work-at-height-premit',[WorkController::class,'store']);
// Route::get('/edit/work-at-height-premit/{id}',[WorkController::class,'edit']);
// Route::post('/update/work-at-height-premit',[WorkController::class,'update']);
// Route::delete('/delete/work-at-height-premit/{id}',[WorkController::class,'destroy']);


Route::get('/overtime-work', [OvertimeController::class, 'index']);
Route::get('/overtime-work/create',[OvertimeController::class,'create']);
Route::post('/overtime-work',[OvertimeController::class,'store']);
Route::get('/edit/overtime-work/{id}',[OvertimeController::class,'edit']);
Route::post('/update/overtime-work',[OvertimeController::class,'update']);
Route::delete('/delete/overtime-work/{id}',[OvertimeController::class,'destroy']);
Route::get('/overtime-work/export/{id}', [OvertimeController::class, 'export']);
Route::get('/overtime-work/export-excel', [OvertimeController::class, 'exportExcel']);

Route::get('/attendence', [AttendenceController::class, 'index']);
Route::post('/attendence/filter', [AttendenceController::class, 'filter']);
Route::get('/attendence/create',[AttendenceController::class,'create']);
Route::post('/attendence',[AttendenceController::class,'store']);
Route::get('/edit/attendence/{id}',[AttendenceController::class,'edit']);
Route::post('/update/attendence',[AttendenceController::class,'update']);
Route::delete('/delete/attendence/{id}',[AttendenceController::class,'destroy']);
Route::get('/attendencek/export-excel', [AttendenceController::class, 'exportExcel']);
