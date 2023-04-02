<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiEmployeeController;
use App\Http\Controllers\ApiEmpolyeeDataController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/employees/countries' , [ApiEmpolyeeDataController::class , 'countries']);
Route::get('/employees/{country}/states' , [ApiEmpolyeeDataController::class , 'states']);
Route::get('/employees/{state}/cities' , [ApiEmpolyeeDataController::class , 'cities']);
Route::get('/employees/departments' , [ApiEmpolyeeDataController::class , 'departments']);

Route::apiResource('/employees' , ApiEmployeeController::class);
