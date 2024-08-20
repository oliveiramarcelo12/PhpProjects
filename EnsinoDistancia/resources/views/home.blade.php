@extends('layouts.app')

@section('content')



<div class="container">
    <header>
        <h1>Bem-vindo ao CursosEad</h1>
        <p>Plataforma de Ensino à Distância para Cursos Online</p>
    </header>

    <section class="features">
        <h2>O que oferecemos</h2>
        <div class="feature">
            <h3>Curso 1</h3>
            <p>Descrição breve do curso 1.</p>
        </div>
        <div class="feature">
            <h3>Curso 2</h3>
            <p>Descrição breve do curso 2.</p>
        </div>
        <div class="feature">
            <h3>Curso 3</h3>
            <p>Descrição breve do curso 3.</p>
        </div>
    </section>

    <section class="call-to-action">
        <h2>Comece Agora</h2>
        <p>Inscreva-se para acessar nossos cursos e começar a aprender hoje mesmo!</p>
        <!-- <a href="{{ route('cursos.create') }}" class="btn btn-primary">Inscreva-se</a> -->
    </section>
</div>



@endsection