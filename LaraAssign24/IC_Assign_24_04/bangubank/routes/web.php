<?php

use Src\Http\Route;
use App\Controllers\HomeController;
use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\CustomerController;
use App\Controllers\RegistrationController;

Route::get('/', [HomeController::class, 'index']); //->name('home');
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'authVerify']);

Route::get('/registration', [RegistrationController::class, 'index']);
Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/deposit', [CustomerController::class, 'deposit']);
Route::get('/customer/withdraw', [CustomerController::class, 'withdraw']);
Route::get('/customer/transfer', [CustomerController::class, 'transfer']);

Route::get('/admin/add_customer', [AdminController::class, 'add_customer']);
Route::get('/admin/customers_transaction', [AdminController::class, 'customers_transaction']);
Route::get('/admin/customers', [AdminController::class, 'customers']);
Route::get('/admin/transactions', [AdminController::class, 'transactions']);

Route::get('/logout', [AuthController::class, 'logout']);