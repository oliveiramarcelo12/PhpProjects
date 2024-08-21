<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/registro',[UserController::class,'showRegistroForm'])->name('usuarios.registro');

//Rota para processar o registro
Route::post('/registro',[UserController::class, 'registro'])->name('usuarios.controller');

Route::get('/login',[UserController::class,'showLoginForm'])->name('usuarios.login');

//Rota para processar o login
Route::post('/login',[UserController::class, 'login'])->name('usuarios.controller');
