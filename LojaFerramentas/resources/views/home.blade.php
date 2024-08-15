@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2>Bem-vindo à Loja de Ferramentas</h2>
    <p>Por favor, faça login ou registre-se para continuar.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="/login" class="btn btn-primary btn-lg w-100">Login</a>
        </div>
        <div class="col-md-6">
            <a href="/registro" class="btn btn-secondary btn-lg w-100">Registrar-se</a>
        </div>
    </div>
</div>
@endsection
