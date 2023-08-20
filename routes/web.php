<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionnaireController;
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

    Route::middleware(['verified.profile'])->group(function () {
        Route::get('/', [QuestionnaireController::class, 'index'])->name('questionnaires');
        Route::post('/action_questionnaire', [QuestionnaireController::class, 'actionQuestionnaire'])->name('questionnaires.action-questionnaire');

        Route::get('likes', [LikeController::class, 'index'])->name('likes');
        Route::post('/get_likes_questionnaire', [LikeController::class, 'getLikesQuestionnaire'])->name('get-likes-questionnaire');
    });

    Route::post('/upload_avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.avatar-upload');
    Route::delete('/delete_avatar', [ImageController::class, 'deleteAvatar'])->name('image.avatar-delete');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('/profile', ProfileController::class)->except([
        'edit', 'update', 'destroy', 'store', 'create'
    ]);
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthorizationController::class, 'login'])->name('login');
    Route::post('login', [AuthorizationController::class, 'authorization'])->name('authorization');

    Route::get('register', [RegistrationController::class, 'register'])->name('register');
    Route::post('register', [RegistrationController::class, 'registration'])->name('registration');
});

Route::middleware(['auth', 'not.verified.phone'])->group(function () {
    Route::withoutMiddleware('verified.phone')->group(function () {
        Route::get('verification', [VerificationController::class, 'index'])->name('verification.index');
        Route::post('verification', [VerificationController::class, 'verification'])->name('verification.verification');
        Route::post('send_new_code', [VerificationController::class, 'sendNewCode'])->name('send-new-code');
    });
});
