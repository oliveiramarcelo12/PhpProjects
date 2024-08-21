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
            <label for="data_criacao" class="form-label">Data de Criação</label>
            <input type="date" class="form-control" id="data_criacao" name="data_criacao" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Curso</button>
    </form>
</div>
@endsection
