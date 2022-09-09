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
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//dashboard/define or get service/ define installments/ define categories
Route::get('categories', [AdminController::class, 'defineCategories'])->name('defineCategories')->middleware('auth');
Route::post('categories', [AdminController::class, 'storeCategories'])->name('storeCategories')->middleware('auth');
Route::get('dashboard', [ProfileController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('defineInstallment', [InstallmentController::class, 'defineInstallment'])->name('defineInstallment')->middleware('auth');
Route::post('storeInstallment', [InstallmentController::class, 'storeInstallment'])->name('storeInstallment')->middleware('auth');
Route::get('defineService', [ServiceController::class, 'defineService'])->name('defineService')->middleware('auth');
Route::post('storeService', [ServiceController::class, 'storeService'])->name('storeService')->middleware('auth');
Route::get('findService', [ServiceController::class, 'findService'])->name('findService')->middleware('auth');
Route::post('findServiceResult', [ServiceController::class, 'findServiceResult'])->name('findServiceResult')->middleware('auth');


//define custom service/order
Route::get('defineCustomServiceForm', [CustomServiceController::class, 'defineCustomServiceForm'])->name('defineCustomServiceForm')->middleware('auth');
Route::post('defineCustomService', [CustomServiceController::class, 'defineCustomService'])->name('defineCustomService')->middleware('auth');
Route::post('order', [PaymentController::class, 'order'])->name('order')->middleware('auth');

//chatbox
Route::get('write', [])
