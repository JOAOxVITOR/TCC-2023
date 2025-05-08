<?php

    include_once "../../BACK_END_PHP/registrar/conexao/Conexao.php";
    include_once "../../BACK_END_PHP/registrar/dao/RegistrarDao.php";
    include_once "../../BACK_END_PHP/registrar/model/registrarMod.php";


    $registrar = new Registrar();
    $registrardao = new RegistrarDAO();



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Adicione o link para o Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            position: relative; 
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <a href="../index" class="close-button">&#10006;</a>
        <h2 class="mb-4">Login</h2>
        <form action="../../BACK_END_PHP/registrar/controller/RegistrarController.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="enviar-login">Entrar</button>
            </div>
        </form>
    </div>

    <!-- Adicione o script do Bootstrap no final do corpo do documento para otimizar o carregamento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
