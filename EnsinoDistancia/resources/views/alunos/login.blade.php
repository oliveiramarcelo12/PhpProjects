@extends('layouts.app')

@section('title', 'Login Aluno')

@section('content')
    <div class="auth-container">
        <h1>Login Aluno</h1>
        <form method="POST" action="{{ route('aluno.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}" />
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required />
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Login</button>

            <p>Não tem uma conta? <a href="{{ route('aluno.registro') }}">Cadastre-se aqui</a></p>
        </form>
    </div>
@endsection
