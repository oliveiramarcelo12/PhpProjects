@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Criar Novo Curso</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade de Alunos</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Fim das Inscrições</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nome }}</td>
                <td>{{ $curso->descricao }}</td>
                <td>{{ $curso->quantidade_alunos }}</td>
                <td>
                    @if($curso->data_inicio)
                        {{ $curso->data_inicio->format('d/m/Y') }}
                    @else
                        Não definida
                    @endif
                </td>
                <td>
                    @if($curso->data_termino)
                        {{ $curso->data_termino->format('d/m/Y') }}
                    @else
                        Não definida
                    @endif
                </td>
                <td>
                    @if($curso->data_fim_inscricao)
                        {{ $curso->data_fim_inscricao->format('d/m/Y') }}
                    @else
                        Não definida
                    @endif
                </td>
                <td>
                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info btn-sm">Detalhes</a>

                    <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning btn-sm">Editar</a>

                    <!-- Formulário de exclusão -->
                    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
