@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Curso: {{ $curso->nome }}</h1>

    <p><strong>Descrição:</strong> {{ $curso->descricao }}</p>
    <p><strong>Quantidade de Alunos:</strong> {{ $curso->quantidade_alunos }}</p>
    <p><strong>Data de Início:</strong> {{ $curso->data_inicio ? $curso->data_inicio->format('d/m/Y') : 'Não definida' }}</p>
    <p><strong>Data de Término:</strong> {{ $curso->data_termino ? $curso->data_termino->format('d/m/Y') : 'Não definida' }}</p>
    <p><strong>Fim das Inscrições:</strong> {{ $curso->data_fim_inscricao ? $curso->data_fim_inscricao->format('d/m/Y') : 'Não definida' }}</p>

    <h3>Alunos Inscritos</h3>
    @if($curso->alunos->isEmpty())
        <p>Não há alunos inscritos neste curso.</p>
    @else
        <ul>
            @foreach($curso->alunos as $aluno)
            <li>{{ $aluno->name }} ({{ $aluno->email }})</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
