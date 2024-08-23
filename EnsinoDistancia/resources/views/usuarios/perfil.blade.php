@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Meu Perfil</h1>

    <form action="{{ route('usuarios.atualizarPerfil') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <!-- Adicione outros campos conforme necessário -->

        <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
    </form>
</div>
@endsection
