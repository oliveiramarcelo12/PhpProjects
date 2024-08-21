<!-- Formulário de Registro -->
<form method="POST" action="{{ route('usuario.registro') }}">
    @csrf
    <div>
        <label for="name">Nome</label>
        <input id="name" type="text" name="name" required>
    </div>

    <div>
        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" required>
    </div>

    <div>
        <label for="password">Senha</label>
        <input id="password" type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirme a Senha</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div>
        <label for="user_type">Tipo de Usuário</label>
        <select id="user_type" name="user_type" required>
            <option value="student">Aluno</option>
            <option value="teacher">Professor</option>
        </select>
    </div>

    <button type="submit">Registrar</button>
</form>
