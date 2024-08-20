<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\PageController; // Controlador para páginas estáticas

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotas para Cursos
Route::resource('cursos', CursoController::class);

// Rotas para Autenticação de Alunos
Route::get('aluno/login', [AlunoController::class, 'showLoginForm'])->name('aluno.login');
Route::post('aluno/login', [AlunoController::class, 'login']);
Route::get('aluno/registro', [AlunoController::class, 'showRegistroForm'])->name('aluno.registro');
Route::post('aluno/registro', [AlunoController::class, 'registro']);
Route::post('aluno/logout', [AlunoController::class, 'logout'])->name('aluno.logout');

// Rotas para Autenticação de Professores
Route::get('professor/login', [ProfessorController::class, 'showLoginForm'])->name('professor.login');
Route::post('professor/login', [ProfessorController::class, 'login']);
Route::get('professor/registro', [ProfessorController::class, 'showRegistroForm'])->name('professor.registro');
Route::post('professor/registro', [ProfessorController::class, 'registro']);
Route::post('professor/logout', [ProfessorController::class, 'logout'])->name('professor.logout');

