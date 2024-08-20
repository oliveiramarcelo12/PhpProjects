<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('alunos.login');
    }

    // Processar o login do aluno
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('aluno')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    // Exibir o formulário de registro
    public function showRegistroForm()
    {
        return view('alunos.registro');
    }

    // Processar o registro de um novo aluno
    public function registro(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:alunos',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Aluno::create($validated);

        return redirect('/login');
    }

    // Realizar o logout do aluno
    public function logout(Request $request)
    {
        Auth::guard('aluno')->logout();

        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/login');
    }
}
