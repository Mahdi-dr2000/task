<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\compasniesController;
use App\Http\Controllers\employeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'loginpage']);

Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::middleware('login')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('compinespage', [compasniesController::class, 'index']);
    Route::get('compines', [compasniesController::class, 'create']);
    Route::post('createcompany', [compasniesController::class, 'store']);
    Route::post('destroy', [compasniesController::class, 'destroy']);
    Route::post('updatecompany', [compasniesController::class, 'update']);
    Route::post('detailscompany', [compasniesController::class, 'details']);

    Route::post('createemployee', [employeeController::class, 'create']);

    Route::post('updateemployee', [employeeController::class, 'update']);
    Route::post('storeemployee', [employeeController::class, 'store'])->name('storeemployee');


});
