<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }
        .container {
            padding: 2em;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        form div {
            margin-bottom: 1em;
        }
        form label {
            display: block;
            margin-bottom: 0.5em;
        }
        form input, form textarea {
            width: 100%;
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            background-color: #333;
            color: white;
            padding: 0.5em 2em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
@include('components.header')

    <div class="container">
        <form action="processa_contato.php" method="POST">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>

    @include('components.footer')
</body>
</html>
