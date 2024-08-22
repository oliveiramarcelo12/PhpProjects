<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InscricaoController;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Registro
Route::get('/registro', [UserController::class, 'showRegistroForm'])->name('usuarios.registro');
Route::post('/registro', [UserController::class, 'registro'])->name('usuarios.registro');

// Login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('usuarios.login');
Route::post('/login', [UserController::class, 'login'])->name('usuarios.login');

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('usuarios.logout');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');

// Página inicial para cursos
Route::resource('/cursos', CursoController::class);

// Rota para exibir um curso específico
Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

// Rota para exibir o formulário de edição de um curso
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');

// Rota para atualizar um curso existente
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');

Route::post('/cursos/{curso}/inscrever', [InscricaoController::class, 'inscrever'])->name('cursos.inscrever');

Route::post('/cursos/{curso}/sair', [InscricaoController::class, 'destroy'])->name('cursos.sair');
