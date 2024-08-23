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

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Recursos de Cursos
Route::resource('/cursos', CursoController::class)->except(['show', 'edit', 'update', 'destroy']);

// Exibir um curso específico
Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

// Formulário de edição de um curso
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');

// Atualizar um curso existente
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');

// Excluir um curso
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

// Inscrições
Route::post('/cursos/{curso}/inscrever', [InscricaoController::class, 'inscrever'])->name('inscricoes.inscrever');
Route::delete('/inscricoes/{inscricao}/cancelar', [InscricaoController::class, 'cancelar'])->name('inscricoes.cancelar');


Route::post('/cursos/{curso}/sair', [InscricaoController::class, 'sair'])->name('cursos.sair');

// Em web.php
Route::get('/cursos/aluno', [CursoController::class, 'aluno'])->name('cursos.aluno');



// Rota para exibir a lista de alunos inscritos
Route::get('/cursos/{id}/alunos', [CursoController::class, 'mostrarAlunos'])->name('cursos.mostrar_alunos');

// Rota para atualizar o número de vagas disponíveis
Route::post('/cursos/{id}/atualizar-vagas', [CursoController::class, 'atualizarVagas'])->name('cursos.atualizar_vagas');

Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');
