<?php

include 'cms.php';

use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\SocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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


//Google Login
Route::get('redirect', [SocialiteController::class, 'redirect'])->name('redirect');
Route::get('callback', [SocialiteController::class, 'callback'])->name('callback');


Route::middleware(['website', 'seo'])->group(function () {

    //Home
    Route::get('/', [HomeController::class, 'show'])->name('home');

    //Register Routes
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    //Login Routes
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

    //Logout Routes
    Route::post('/logout', [SessionController::class, 'destroy']);

    //Password Reset Routes
    Route::get('/forgot-password', [RegisteredUserController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [RegisteredUserController::class, 'forgotPasswordSendEmail']);
    Route::get('/reset-password/{email}/{token}', [RegisteredUserController::class, 'resetPassword'])->name('reset-password');
    Route::post('/reset-password', [RegisteredUserController::class, 'resetPasswordSendEmail']);

    //Email verification
    Route::get('/email-verification/{email}/{token}', [RegisteredUserController::class, 'verifyEmail']);

    //contact form
    Route::post('/contact', [HomeController::class, 'submitContactForm'])->name('contact');

    //Progress form
    Route::post('/progress', [HomeController::class, 'submitProgressForm'])->name('progress');
});

Route::middleware(['auth', 'website', 'seo'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});
