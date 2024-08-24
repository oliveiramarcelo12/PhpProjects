<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">EadEnsino</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ajuda') }}">Ajuda</a>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.registro') }}">Cadastro</a>
                </li>
                @endguest

                @auth
                @if(auth()->user()->isAluno())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cursos.meus') }}">Meus Cursos</a>
                </li>
                @endif


                @if(auth()->user()->isProfessor())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
                </li>
                @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                @auth
                <li class="nav-item">
                    <span class="navbar-text me-3">
                        Olá, {{ auth()->user()->name }} ({{ auth()->user()->isProfessor() ? 'Professor' : 'Aluno' }})
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.perfil') }}">Perfil</a> <!-- Link para a página de perfil -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('usuarios.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>