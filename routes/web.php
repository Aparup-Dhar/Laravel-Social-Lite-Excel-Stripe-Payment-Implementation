<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('payment');

Route::post('/single-charge', [App\Http\Controllers\HomeController::class, 'singleCharge'])->name('single.charge');

Route::get('/plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plans');
Route::get('/plan/{plan}', [App\Http\Controllers\PlanController::class, 'show'])->name('plans.show');
Route::post('/subscription', [App\Http\Controllers\SubscriptionController::class, 'create'])->name('subscription.create');



Route::get('/import', [App\Http\Controllers\StudentController::class, 'index'])->name('import');
Route::post('/import-student', [App\Http\Controllers\StudentController::class, 'importExcel']);


// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Linkedin login
Route::get('login/linkedin', [App\Http\Controllers\Auth\LoginController::class, 'redirectToLinkedin'])->name('login.linkedin');
Route::get('login/linkedin/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleLinkedinCallback']);