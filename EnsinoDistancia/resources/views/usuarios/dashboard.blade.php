@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard de Cursos</h1>

    <!-- Mensagens de sessão -->


    <!-- Formulário de Pesquisa -->
    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar cursos..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>

    <!-- Lista de Cursos -->
    <div class="row mt-4">
        @foreach ($cursos as $curso)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('assets/img/curso.png') }}" class="card-img-top" alt="{{ $curso->nome }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $curso->nome }}</h5>
                    <p class="card-text">{{ $curso->descricao }}</p>
                    <p class="card-text">Data de Início: {{ $curso->data_inicio->format('d/m/Y') }}</p>
                    <p class="card-text">Vagas Restantes: {{ $curso->vagas_restantes }}</p>

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
                            <!-- Se o aluno estiver inscrito, exibe o botão de cancelar -->
                            @php
                                $inscricao = $curso->inscricoes->where('user_id', Auth::id())->first();
                            @endphp

                            @if($inscricao)
                                <form action="{{ route('cursos.cancelar', ['inscricao' => $inscricao->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancelar Inscrição</button>
                                </form>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
