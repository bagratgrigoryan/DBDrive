<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

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

Route::post("/create-user", [UserController::class, 'createUser']);
Route::post("/approve-user/{id}", [UserController::class, 'approveVerificationUser']);
Route::post("/approve-driver/{id}", [UserController::class, 'approveVerificationDriver']);
Route::post("/auth", [UserController::class, 'auth']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/login', [UserController::class , 'login']);
    Route::post("/verify-user", [UserController::class, 'verifyUser']);
    Route::post("/logout", [UserController::class, 'logout']);
    Route::post("/delete-account", [UserController::class, 'deleteAccount']);
});
