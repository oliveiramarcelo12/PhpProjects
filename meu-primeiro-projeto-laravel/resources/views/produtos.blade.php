<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Produtos</title>
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
        .product {
            border: 1px solid #ccc;
            padding: 1em;
            margin: 1em 0;
            display: flex;
        }
        .product img {
            max-width: 150px;
            margin-right: 1em;
        }
        .product-details {
            flex: 1;
        }
        .product-name {
            font-size: 1.5em;
            margin-bottom: 0.5em;
        }
        .product-price {
            color: green;
            font-size: 1.2em;
            margin-bottom: 0.5em;
        }
    </style>
</head>
<body>
@include('components.header')

    <div class="container">
        <div class="product">
            <img src="produto1.jpg" alt="Produto 1">
            <div class="product-details">
                <div class="product-name">Produto 1</div>
                <div class="product-price">R$ 100,00</div>
                <div class="product-description">Descrição do Produto 1.</div>
            </div>
        </div>
        <div class="product">
            <img src="produto2.jpg" alt="Produto 2">
            <div class="product-details">
                <div class="product-name">Produto 2</div>
                <div class="product-price">R$ 150,00</div>
                <div class="product-description">Descrição do Produto 2.</div>
            </div>
        </div>
        <!-- Adicione mais produtos aqui -->
    </div>

  
</body>
</html>
