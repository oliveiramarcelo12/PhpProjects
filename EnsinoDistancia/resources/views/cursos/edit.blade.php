<!-- resources/views/cursos/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>
    
    <!-- Exibe mensagens de sucesso -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $curso->nome) }}" required>
        </div>
        
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required>{{ old('descricao', $curso->descricao) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="data_criacao">Data de Criação</label>
            <input type="date" name="data_criacao" id="data_criacao" class="form-control" value="{{ old('data_criacao', $curso->data_criacao->format('Y-m-d')) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar Curso</button>
    </form>
</div>
@endsection
