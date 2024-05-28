<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function (){

});

Route::get('login', [SessionController::class, 'loginForm'])->name('login');
Route::post('login-post', [SessionController::class,'login']);

Route::get('/register', [SessionController::class, 'registerForm']);
Route::post('/register', [SessionController::class,'register']);

Route::post('/logout', [SessionController::class, 'logout']);

Route::middleware('auth:administrators')->group(function () {
    Route::get('/dashboard', [AdministratorController::class, 'index'])->name('admin.dashboard');
});

Route::post('/save-region', [AdministratorController::class, 'insert']);

