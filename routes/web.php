<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\V1\AgentTransactionController;

Route::get('/login-page', [AuthController::class, 'loginPage'])->name('web.login');
Route::get('/register-page', [AuthController::class, 'registerPage'])->name('web.register');
Route::get('/send-otp-page', [AuthController::class, 'sendOtpPage'])->name('web.send-otp');
Route::get('/verify-otp-page', [AuthController::class, 'verifyOtpPage'])->name('web.verify-otp');
Route::get('/reset-password-page', [AuthController::class, 'resetPasswordPage'])->name('web.reset-password');

Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('web.dashboard');
Route::get('/customer', [DashboardController::class, 'customerPage'])->name('web.customer');
Route::get('/category', [DashboardController::class, 'categoryPage'])->name('web.category');
Route::get('/product', [DashboardController::class, 'productPage'])->name('web.product');
Route::get('/agent', [DashboardController::class, 'agentPage'])->name('web.agent');
Route::delete('/agent-transactions/{id}', [AgentTransactionController::class, 'destroy']);
Route::get('/sale', [DashboardController::class, 'salePage'])->name('web.sale');
Route::get('/invoice', [DashboardController::class, 'invoicePage'])->name('web.invoice');
Route::get('/report', [DashboardController::class, 'reportPage'])->name('web.report');
Route::get('/profile', [DashboardController::class, 'profilePage'])->name('web.profile');

Route::view('/', 'home');
