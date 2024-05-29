<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AdminRegionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SessionController;
use App\Models\RegionalAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [SessionController::class, 'loginForm'])->name('login');
Route::get('/login-regadmin', [SessionController::class, 'loginFormRegAdmin']);
Route::post('/login-regadmin-post', [SessionController::class, 'loginRegAdmin']);
Route::post('login-post', [SessionController::class,'login']);

Route::get('/register', [SessionController::class, 'registerForm']);
Route::post('/register', [SessionController::class,'register']);

Route::post('/logout', [SessionController::class, 'logout']);

Route::middleware('auth:administrators')->group(function () {
    Route::get('/dashboard', [AdministratorController::class, 'index'])->name('admin.dashboard');
    Route::controller(RegionController::class)-> group(function (){
        Route::get('/region', 'index');
        Route::post('/insert-region', 'insert');
        Route::post('/{id}/update-region', 'update');
        Route::post('/{id}/delete-region', 'delete');
    });

    Route::controller(AdminRegionController::class)-> group(function (){
        Route::get('/region-admin', 'index');
        Route::post('/insert-region-admin', 'insert');
        Route::post('/{id}/update-region-admin', 'update');
        Route::post('/{id}/delete-region-admin', 'delete');
    });
});

Route::middleware('auth:regadmin')->group(function (){
    Route::get('/dashboard', [AdministratorController::class, 'index'])->name('admin.dashboard');
});

