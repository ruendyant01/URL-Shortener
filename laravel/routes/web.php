<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UrlController;
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

Route::view('{asd?}', 'welcome');

Route::get("u/{url}", [UrlController::class, "show"]);
Route::post("/password/email", [ForgotPasswordController::class, "sendResetLinkEmail"]);
Route::view("/password/reset", "welcome")->name("password.reset");
Route::post("/password/reset", [ResetPasswordController::class, "reset"]);
// Auth::routes();
