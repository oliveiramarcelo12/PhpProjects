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
        
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $curso->nome) }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required>{{ old('descricao', $curso->descricao) }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="quantidade_alunos">Quantidade de Alunos</label>
            <input type="number" name="quantidade_alunos" id="quantidade_alunos" class="form-control" value="{{ old('quantidade_alunos', $curso->quantidade_alunos) }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="data_inicio">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ old('data_inicio', $curso->data_inicio ? $curso->data_inicio->format('Y-m-d') : '') }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="data_termino">Data de Término</label>
            <input type="date" name="data_termino" id="data_termino" class="form-control" value="{{ old('data_termino', $curso->data_termino ? $curso->data_termino->format('Y-m-d') : '') }}" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="data_fim_inscricao">Data do Fim da Inscrição</label>
            <input type="date" name="data_fim_inscricao" id="data_fim_inscricao" class="form-control" value="{{ old('data_fim_inscricao', $curso->data_fim_inscricao ? $curso->data_fim_inscricao->format('Y-m-d') : '') }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar Curso</button>
    </form>
</div>
@endsection
