<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/registro',[UserController::class,'showRegistroForm'])->
name('usuarios.registro');

//Rota para processar o registro
Route::post('/registro',[UserController::class, 'registro'])->
name('usuarios.controller');

Route::get('/login',[UserController::class,'showLoginForm'])->
name('usuarios.login');

//Rota para processar o login
Route::post('/login',[UserController::class, 'login'])->
name('usuarios.controller');

//Rota para a página interna
Route::get('/dashboard',function(){
    return view('usuarios.dashboard');
})->middleware('auth')->name('usuarios.dashboard');

//Rota do logout
Route::post('/logout', [UserController::class, 'logout']);

Route::resource('produtos', ProdutoController::class);