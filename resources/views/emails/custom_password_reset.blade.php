<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Redefinição de Senha</title>
    <style>
        /* Estilos simples para o e-mail */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Redefinição de Senha</h1>
        <p>Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta.</p>
        <p>Clique no link abaixo para redefinir sua senha:</p>
        <a href="{{ url('password/reset', $token) }}">Redefinir Senha</a>
        <p>Se você não solicitou a redefinição de senha, não é necessário tomar nenhuma outra ação.</p>
    </div>
</body>
</html>
