<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->namespace('V1')->group(function () {
        Route::prefix('auth')->namespace('Auth')->group(function () {
              Route::post('logout', [AuthController::class, 'logout']);
        });
    });
});

Route::prefix('v1')->namespace('V1')->group(function () {
    Route::prefix('auth')->namespace('Auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
    });
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found.'], 404);
});