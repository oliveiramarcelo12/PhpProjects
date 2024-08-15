<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Loja Ferramentas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @if(Auth::check() && Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link" href="/produtos">Produtos</a>
                </li>
                @endif

                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/perfil">Perfil</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registro">Registro</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>