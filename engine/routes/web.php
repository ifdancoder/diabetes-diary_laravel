<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SettingsController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');
Route::get('/login', [UserController::class, 'login'])->name('auth.login');
Route::post('/login-post', [UserController::class, 'loginPost'])->name('auth.login.post');
Route::get('/register', [UserController::class, 'register'])->name('auth.register');
Route::post('/register-post', [UserController::class, 'registerPost'])->name('auth.register.post');

Route::get('/profile/settings', [SettingsController::class, 'settings'])->name('profile.settings');
Route::post('/profile/settings-post', [SettingsController::class, 'settingsPost'])->name('profile.settings.post');

Route::get('/basal-insulin', [DataController::class, 'basal'])->name('profile.basal');
Route::post('/basal-insulin-post', [DataController::class, 'basalPost'])->name('profile.basal.post');
Route::get('/record', [DataController::class, 'record'])->name('profile.record');
Route::post('/record-post', [DataController::class, 'recordPost'])->name('profile.record.post');
