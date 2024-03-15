<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegitrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/registration' );

Route::view('/registration', 'registration.index')->name('registration');
//Post registration
Route::post('/registration', [RegitrationController::class, 'store'])->name('registration.store');

Route::view('/login', 'login.index')->name('login');
//Post login
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::view('/forgot-password', 'forgot-password.index')->name('forgot-password');
//Post forgot-password
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password.store');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Auth::routes(['verify' => true]);
