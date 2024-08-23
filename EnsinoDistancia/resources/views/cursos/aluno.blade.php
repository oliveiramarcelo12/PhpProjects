@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cursos Disponíveis</h1>

    <div class="row">
        @foreach($cursos as $curso)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="/assets/img/curso.png" class="card-img-top" alt="{{ $curso->nome }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $curso->nome }}</h5>
                    <p class="card-text">{{ $curso->descricao }}</p>
                    <p class="card-text">Professor: {{ $curso->professor->name }}</p>

                    @if(!$curso->alunos->contains(Auth::user()))
                    <!-- Formulário para inscrição -->
                    <form action="{{ route('inscricoes.inscrever', $curso->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Inscrever-se</button>
                    </form>
                    @else
                    <!-- Formulário para cancelamento de inscrição -->
                    <form action="{{ route('inscricoes.cancelar', ['inscricao' => $curso->pivot->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancelar Inscrição</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
