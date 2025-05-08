<?php

session_start();


$tipo = $_SESSION["tipo"];
$situacao = $_SESSION["situacao"];


if($tipo !== "admin" || $situacao !== "1"){
    header("Location: ../../FRONT_END_HTML/restringido.php");
}
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
    <title>Administração</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="admStyle.css">
</head>

<body>

    <!-- Administração -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand">ADM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="adm.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login_registro/login.php">Sair</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Conteúdo do formulário -->
    <h1 style="display: flex; justify-content: center; margin-top: 20px;"> Controle de Usuários </h1>

    <section class="form-container">
        <div class="container">

            <br><br>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Escola</th>
                        <th>Ano</th>
                        <th>Situação</th>
                        <th>Ativar/Desativar</th>
                    </tr>
                    <?php foreach ($registrardao->read() as $registrar) :?>
                        <tr>
                            <td><?= $registrar->getId() ?></td>
                            <td><?= $registrar->getName() ?></td>
                            <td><?= $registrar->getEmail() ?></td>
                            <td><?= $registrar->getSchool() ?></td>
                            <td><?= $registrar->getAno() ?></td>
                            <td><?php
                            if ($registrar->getSituacao() == 0){
                                echo 'Desativado';
                            } elseif ($registrar->getSituacao() == 1){
                                echo 'Ativado';
                            } else {
                                echo 'Situação desconhecida';
                            }
                            ?></td>

                            <td class="text-center">
                                <a href="../../BACK_END_PHP/registrar/controller/RegistrarController.php?ativar=<?= $registrar->getId() ?>">
                                <button class="btn btn-success btn-sm" data-toggle="modal" name="ativar" data-target="#ativar"><?= $registrar->getId() ?> ID Ativar </button>
                                </a>

                                <a href="../../BACK_END_PHP/registrar/controller/RegistrarController.php?desativar=<?= $registrar->getId() ?>">
                                <button class="btn btn-danger btn-sm" type="button"> Desativar </button>
                                </a>
                            </td>
                        </tr>

                        <?php endforeach ?>
                </table>
        
        </div>
    </section>

    <h1 style="display: flex; justify-content: center; margin-top: 20px;"> Cadastro de Usuários</h1>

    <form class="form" method="post" action="../../BACK_END_PHP/registrar/controller/RegistrarController.php">
        <div class="container" style="margin-top: 20px;">
            <div class="row">

                <div class="col-md-12">
                    <label>Nome:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
        
                <div class="col-md-12" style="margin-top: 20px;">
                    <label>E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                
                <div class="col-md-2" style="margin-top: 20px;">
                    <label>Série:</label>
                    <input type="text" class="form-control" id="ano_matricula" name="ano_matricula">
                </div>
                
                <div class="col-md-5" style="margin-top: 20px;">
                    <label>Senha:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="col-md-5" style="margin-top: 20px;">
                    <label>Confirma Senha:</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                </div>

                <div class="col-md-4" style="margin-top: 20px;">
                    <label>Tipo:</label>
                    <select class="form-select" id="opca0" name="opcao">
                        <option name="aluno" value="aluno">Aluno</option>
                        <option name="professor" value="professor">Professor</option>
                        <option name="admin" value="admin">Adiministração</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary" name="registrar">Enviar</button>
                <button type="reset" class="btn btn-danger">Apagar</button>
            </div>
        </div>
    </form>

</body>
</html>