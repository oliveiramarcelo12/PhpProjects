<!-- resources/views/cursos/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard de Cursos</h1>

        @if($cursos->isEmpty())
            <p>Você ainda não criou nenhum curso.</p>
        @else
            <ul class="list-group">
                @foreach($cursos as $curso)
                    <li class="list-group-item">
                        {{ $curso->nome }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
