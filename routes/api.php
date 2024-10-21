<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user/register',[\App\Http\Controllers\UserController::class, 'register']);
Route::post('/user/login',[\App\Http\Controllers\UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], static function () {
    Route::get('/showroom',[\App\Http\Controllers\ShowroomController::class, 'index']);
    Route::post('/showroom/buy',[\App\Http\Controllers\ShowroomController::class, 'buy']);
    Route::post('/showroom/sell',[\App\Http\Controllers\ShowroomController::class, 'sell']);
    Route::post('/showroom/sellCancel',[\App\Http\Controllers\ShowroomController::class, 'sellCancel']);

    Route::get('/user/vehicle',[\App\Http\Controllers\UserVehicleController::class, 'index']);

});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
