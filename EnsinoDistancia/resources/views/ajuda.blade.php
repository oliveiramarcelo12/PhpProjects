@extends('layouts.app')

@section('content')
<h1>Ajuda</h1>

<div class="help-section">
    <h2>1. Acesso à Plataforma</h2>
    <h3>1.1 Página Inicial</h3>
    <p><strong>URL:</strong> EadEnsino</p>
    <p><strong>Descrição:</strong> A página inicial fornece uma visão geral da plataforma, com informações sobre os cursos disponíveis e acesso às funcionalidades de login e cadastro.</p>

    <h3>1.2 Menu de Navegação</h3>
    <p>O menu de navegação está disponível no topo da página e possui as seguintes opções:</p>
    <ul>
        <li><strong>Home:</strong> Redireciona para a página inicial.</li>
        <li><strong>Login:</strong> Acesso à página de login para usuários cadastrados.</li>
        <li><strong>Cadastro:</strong> Acesso à página de registro para novos usuários.</li>
        <li><strong>Cursos:</strong> (Disponível apenas para professores) Redireciona para o painel de gerenciamento de cursos.</li>
        <li><strong>Perfil:</strong> Acesso à página de perfil para atualizar suas informações.</li>
        <li><strong>Logout:</strong> Encerra a sessão do usuário e redireciona para a página inicial.</li>
    </ul>

    <h2>2. Cadastro e Login</h2>
    <h3>2.1 Registro de Novo Usuário</h3>
    <p>No menu de navegação, clique em <strong>Cadastro</strong>.</p>
    <p>Preencha o formulário com seus dados: nome, e-mail e senha.</p>
    <p>Clique em <strong>Registrar</strong> para criar sua conta.</p>
    <p>Após o registro, você será redirecionado para a página de login.</p>

    <h3>2.2 Login</h3>
    <p>No menu de navegação, clique em <strong>Login</strong>.</p>
    <p>Insira seu e-mail e senha cadastrados.</p>
    <p>Clique em <strong>Entrar</strong>.</p>
    <p>Você será redirecionado para o dashboard de cursos se for professor, ou para a página inicial se for aluno.</p>

    <h2>3. Navegação para Professores</h2>
    <h3>3.1 Dashboard de Cursos</h3>
    <p><strong>Acesso:</strong> Automaticamente redirecionado após o login ou clicando em <strong>Cursos</strong> no menu.</p>
    <p><strong>Descrição:</strong> Exibe uma lista de cursos que você gerencia.</p>
    <p><strong>Funções:</strong></p>
    <ul>
        <li><strong>Pesquisar Cursos:</strong> Use a barra de pesquisa para encontrar cursos específicos.</li>
        <li><strong>Editar Curso:</strong> Clique em "Editar Curso" para modificar as informações do curso.</li>
        <li><strong>Excluir Curso:</strong> Clique em "Excluir Curso" para remover o curso. Uma confirmação será solicitada.</li>
    </ul>

    <h3>3.2 Criar Novo Curso</h3>
    <p>No Dashboard de Cursos, clique em <strong>Novo Curso</strong>.</p>
    <p>Preencha os detalhes do curso, como nome, descrição, datas e quantidade de alunos.</p>
    <p>Clique em <strong>Criar Curso</strong> para adicionar o curso à plataforma.</p>

    <h2>4. Navegação para Alunos</h2>
    <h3>4.1 Inscrição em Cursos</h3>
    <p>Após o login, acesse a lista de cursos disponíveis.</p>
    <p>Utilize a barra de pesquisa para encontrar cursos específicos.</p>
    <p>Para se inscrever em um curso, clique em <strong>Inscrever-se</strong>.</p>
    <p>Após a inscrição, o curso aparecerá na sua lista de cursos inscritos.</p>

    <h3>4.2 Cancelar Inscrição</h3>
    <p>No dashboard de cursos, localize o curso em que está inscrito.</p>
    <p>Clique em <strong>Cancelar Inscrição</strong> para remover sua inscrição do curso.</p>

    <h2>5. Gerenciamento de Perfil</h2>
    <h3>5.1 Visualizar e Editar Perfil</h3>
    <p>No menu de navegação, clique em <strong>Perfil</strong>.</p>
    <p>A página de perfil exibirá seus dados atuais.</p>
    <p>Modifique as informações desejadas, como nome e e-mail.</p>
    <p>Clique em <strong>Atualizar Perfil</strong> para salvar as alterações.</p>

    <h2>6. Logout</h2>
    <p><strong>Descrição:</strong> Para sair da plataforma, clique em <strong>Logout</strong> no menu de navegação. Isso encerrará sua sessão e o redirecionará para a página inicial.</p>

    <h2>7. Suporte e Ajuda</h2>
    <p><strong>Suporte:</strong> Caso encontre problemas ou precise de ajuda, entre em contato com o suporte através do e-mail <strong>suporte@eadensino.com</strong>.</p>
</div>
@endsection
