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
                        <p class="card-text">   Data de Início: {{ $curso->data_criacao->format('d/m/Y') }}</p>

                        @if(Auth::user()->isProfessor())
                            <!-- Se o usuário for um professor, mostrar botão de editar -->
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-secondary">Editar Curso</a>
                        @else
                            <!-- Se o usuário for um aluno -->
                            @if(!$curso->alunos->contains(Auth::user()))
                                <!-- Se o aluno não está inscrito, mostrar botão de inscrição -->
                                <form action="{{ route('cursos.inscrever', $curso->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Inscrever-se</button>
                                </form>
                            @else
                                <!-- Se o aluno está inscrito, mostrar botão de saída -->
                                <form action="{{ route('cursos.sair', $curso->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Sair do Curso</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
