@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Novo Curso</h1>
    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="quantidade_alunos" class="form-label">Quantidade de Alunos</label>
            <input type="number" class="form-control" id="quantidade_alunos" name="quantidade_alunos" required>
        </div>
        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
        </div>
        <div class="mb-3">
            <label for="data_termino" class="form-label">Data de Término</label>
            <input type="date" class="form-control" id="data_termino" name="data_termino" required>
        </div>
        <div class="mb-3">
            <label for="data_fim_inscricao" class="form-label">Data do Fim da Inscrição</label>
            <input type="date" class="form-control" id="data_fim_inscricao" name="data_fim_inscricao" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Curso</button>
    </form>
</div>
@endsection
