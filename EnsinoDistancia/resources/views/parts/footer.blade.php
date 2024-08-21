<!-- resources/views/components/footer.blade.php -->
<footer class="bg-dark text-white mt-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Sobre Nós</h5>
                <p>
                    EAD Ensino é uma plataforma de ensino à distância que oferece cursos de alta qualidade para estudantes em todo o mundo.
                </p>
            </div>
            <div class="col-md-4">
                <h5>Links Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                    <li><a href="{{ route('register') }}" class="text-white">Cadastro</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contato</h5>
                <ul class="list-unstyled">
                    <li>Email: contato@eadensino.com</li>
                    <li>Telefone: (11) 1234-5678</li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-3">
            <p>&copy; {{ date('Y') }} EAD Ensino. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
