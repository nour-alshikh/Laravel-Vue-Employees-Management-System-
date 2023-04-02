<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);
Route::resource('departments', DepartmentController::class);

Route::post('/users/{id}/change_password' , [ChangePassController::class , 'changePass'])->name('users.change_password');  // Not Working

Route::get('{any}' , function(){
    return view('employees.index');
})->where('any' , '.*');
