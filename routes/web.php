<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomServiceController;

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
Route::get('register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//dashboard/define or get service/ define installments/ define categories/define custom service
Route::get('categories', [AdminController::class, 'defineCategories'])->name('defineCategories');
Route::post('categories', [AdminController::class, 'storeCategories'])->name('storeCategories');
Route::get('dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
Route::get('defineInstallment', [InstallmentController::class, 'defineInstallment'])->name('defineInstallment');
Route::post('storeInstallment', [InstallmentController::class, 'storeInstallment'])->name('storeInstallment');
Route::get('defineService', [ServiceController::class, 'defineService'])->name('defineService');
Route::post('storeService', [ServiceController::class, 'storeService'])->name('storeService');
Route::get('findService', [ServiceController::class, 'findService'])->name('findService');
Route::post('findServiceResult', [ServiceController::class, 'findServiceResult'])->name('findServiceResult');
Route::get('defineCustomServiceForm', [CustomServiceController::class, 'defineCustomServiceForm'])->name('defineCustomServiceForm');
Route::post('defineCustomService', [CustomServiceController::class, 'defineCustomService'])->name('defineCustomService');


//order
Route::post('order', [PaymentController::class, 'order'])->name('order');

