@extends('layouts.app')

@section('content')


<div class="container mt-5">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


<div class="container mt-5">
    <!-- Static Images Section -->
    <div id="staticImages" class="mb-5">
        <div class="row">
            <div class="col-md-4">
                <img src="\assets\img\curso.png" class="img-fluid" alt="Image 1">
            </div>
            <div class="col-md-4">
                <img src="\assets\img\curso.png" class="img-fluid" alt="Image 2">
            </div>
            <div class="col-md-4">
                <img src="\assets\img\curso.png" class="img-fluid" alt="Image 3">
            </div>
        </div>
    </div>

    <!-- Static Courses Section -->
    <div class="mt-5">
        <h2>Alguns Cursos Disponíveis</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="\assets\img\curso.png" class="card-img-top" alt="Curso 1">
                    <div class="card-body">
                        <h5 class="card-title">Curso 1</h5>
                        <p class="card-text">Descrição do Curso 1.</p>
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="\assets\img\curso.png" class="card-img-top" alt="Curso 2">
                    <div class="card-body">
                        <h5 class="card-title">Curso 2</h5>
                        <p class="card-text">Descrição do Curso 2.</p>
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="\assets\img\curso.png" class="card-img-top" alt="Curso 3">
                    <div class="card-body">
                        <h5 class="card-title">Curso 3</h5>
                        <p class="card-text">Descrição do Curso 3.</p>
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection