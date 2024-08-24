@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Meus Cursos</h1>
    <div class="row">
        @foreach ($cursos as $curso)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $curso->nome }}</h5>
                    <p class="card-text">{{ $curso->descricao }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
