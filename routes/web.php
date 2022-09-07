<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

//Login/Register/Logout
Route::get('register', [AuthController::class, 'registerForm']);
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'loginForm']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

//dashboard/define or get service/ define installments/ define categories
Route::get('categories', [AdminController::class, 'defineCategories']);
Route::post('categories', [AdminController::class, 'storeCategories']);
Route::get('dashboard', [ProfileController::class, 'dashboard']);
