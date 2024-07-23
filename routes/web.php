<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'actionIndex']);

// Rutas accesibles solo para invitados (no autenticados)
Route::group(['middleware' => 'guest'], function () {
    Route::match(['get', 'post'], '/login', [LoginController::class, 'actionLoginSesion'])->name('login');
});

// Rutas protegidas por middleware de autenticación
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'actionHome'])->name('home');
    Route::match(['get', 'post'], '/home', [HomeController::class, 'actionHome']);
    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::match(['get', 'post'], 'user/insert', [UserController::class, 'actionInsert'])->name('user.insert');
    Route::post('user/update/{id}', [UserController::class, 'actionUpdatePassword'])->name('user.update');
});


//Route::match(['get', 'post'], 'user/insert', [UserController::class, 'actionInsert'])->name('user.insert');
/*Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});*/