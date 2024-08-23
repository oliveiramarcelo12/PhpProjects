@extends('layouts.app')

@section('content')
<h1>Dashboard de Cursos</h1>

<form method="GET" action="{{ route('dashboard') }}">
    <input type="text" name="search" placeholder="Pesquisar cursos..." value="{{ request('search') }}">
    <button type="submit">Pesquisar</button>
</form>

<div class="row mt-4">
    @foreach ($cursos as $curso)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="\assets\img\curso.png" class="card-img-top" alt="{{ $curso->nome }}">
            <div class="card-body">
                <h5 class="card-title">{{ $curso->nome }}</h5>
                <p class="card-text">{{ $curso->descricao }}</p>
                <p class="card-text">Data de Início: {{ $curso->data_inicio->format('d/m/Y') }}</p>

                @if(Auth::user()->user_type === 'professor')
                <!-- Botões para professor -->
                <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-secondary">Editar Curso</a>

                <!-- Formulário de exclusão -->
                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir Curso</button>
                </form>
                @else
                <!-- Botões para aluno -->
                @if(!$curso->alunos->contains(Auth::user()))
                <form action="{{ route('cursos.inscrever', $curso->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Inscrever-se</button>
                </form>
                @else
                <form action="{{ route('inscricoes.cancelar', $curso->inscricao_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja cancelar a inscrição?')">Sair do Curso</button>
                </form>
                @endif
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection