<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

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




Route::get('/', [IndexController::class, 'index'])->middleware(LoginMiddleware::class);
Route::get('/attendance/start', [IndexController::class, 'startAttendance'])->middleware(LoginMiddleware::class);
Route::get('/attendance/end', [IndexController::class, 'endAttendance'])->middleware(LoginMiddleware::class);
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'registUser']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(LoginMiddleware::class);
Route::get('/attendance/{num}', [AttendanceController::class, 'pageAttendance'])->middleware(LoginMiddleware::class);;
Route::get('/rest/start', [RestController::class, 'startRest'])->middleware(LoginMiddleware::class);
Route::get('/rest/end', [RestController::class, 'endRest'])->middleware(LoginMiddleware::class);