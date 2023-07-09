<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified.phone'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthorizationController::class, 'login'])->name('login');
    Route::post('login', [AuthorizationController::class, 'authorization'])->name('authorization');

    Route::get('register', [RegistrationController::class, 'register'])->name('register');
    Route::post('register', [RegistrationController::class, 'registration'])->name('registration');
});

Route::middleware('auth')->group(function () {
    Route::get('verification', [VerificationController::class, 'index'])->name('verification.index');
    Route::post('verification', [VerificationController::class, 'verification'])->name('verification.verification');
    Route::post('send_new_code', [VerificationController::class, 'sendNewCode'])->name('send-new-code');
});


