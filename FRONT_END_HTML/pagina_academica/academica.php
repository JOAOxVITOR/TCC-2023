<?php

session_start();

 
$id = $_SESSION["id"]; 
$nome = $_SESSION["nome"]; 
$email = $_SESSION["email"]; 
$senha = $_SESSION["senha"];
$escola = $_SESSION["escola"];
$tipo = $_SESSION["tipo"];
$situacao = $_SESSION["situacao"];
$ano = $_SESSION["ano"];


if($tipo !== "professor" && $tipo !== "aluno" || $situacao !== "1"){
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
    <title>Helpfast - Página de Inicial</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap" rel="stylesheet">

    <!-- Fontes Integradas na Página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Brush+Script+MT&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Seu estilo personalizado -->
    <link rel="stylesheet" type="text/css" href="../../FRONT_END_CSS/paginas/style.css">
    <link rel="stylesheet" type="text/css" href="../../FRONT_END_CSS/paginas/ferramenta.css">
</head>

<body style="font-size: 22px;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" alt="Página Academica" href="../pagina_academica/academica.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pagina_academica/materias.php" alt="materias">Materias</a>
                    </li>
                    <?php 
if( $tipo == "professor"){   

echo'<li class="nav-item">
    <a class="nav-link" href="../pagina_academica/ferramentas.php" alt="ferramenta">Ferramenta</a>
</li>'; }?>
                   <?php 
if( $tipo == "aluno"){   

echo'<li class="nav-item">
    <a class="nav-link" href="../pagina_academica/ferramenta.php" alt="ferramenta">Ferramenta</a>
</li>'; }?>
                  
                </ul>
            </div>
        </div>
    </nav>
    <!-- Final do navbar  -->

    <!-- Body da Página -->
    <br>
    <form class="container" method="post" action="../../BACK_END_PHP/registrar/controller/RegistrarController.php">

        <h2 style="display: flex; justify-content: center;"> Dados Pessoais</h2>

        <div class="row">

            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <?php echo"<h2>$nome</h2>";  ?>
            </div>


            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <?php echo"<h2>$email</h2>";  ?>
            </div>
            <div class="col-md-12">
      <input type= "hidden"><br>
            </div>
            <div class="col-md-6">
                <label for="ano" class="form-label">Ano de Matricula</label>
                <?php echo"<h2>$ano</h2>";  ?>
            </div>
            <div class="col-md-6">
                <label for="ano" class="form-label">Escola Matriculada</label>
                <?php echo"<h2>$escola</h2>";  ?>
            </div>
            <div class="col-md-12">
      <input type= "hidden"><br>
            </div>
    
                <h2 style="margin-top: 20px; ">Redefinir Senha</h2>

            <div class="col-md-6">
                <label for="senha" class="form-label">Digite a Senha Atual</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>

            <div class="col-md-6">
                <label for="novasenha" class="form-label">Digite Nova Senha</label>
                <input type="text" class="form-control" id="newpassword" name="newpassword">
            </div>


        </div>
        <!-- Botões -->
        <button class="btn btn-primary" name="att-senha">Enviar</button>
        </div>
    </form>

    <!-- Widget Acessibilidade -->
    <div class="accessibility-panel">
        <button id="alterar-fonte" class="custom-tooltip" title="Zoom In">
            <i class="material-icons">add</i>
        </button>

        <button id="high-contrast-button" class="custom-tooltip high-contrast-button-link"
            title="Ativar Alto Contraste">
            <i class="material-icons">invert_colors</i>
        </button>

        <button id="screen-reader-button" class="custom-tooltip" title="Ativar Leitor de Tela">
            <a href="https://chrome.google.com/webstore/detail/screen-reader/kgejglhpjiefppelpmljglcjbhoiplfn">
                <i class="material-icons">desktop_windows</i>
            </a>
        </button>

    </div>

    <!-- Final -->
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Ao clicar no botão
    $(".high-contrast-button-link").on("click", function() {
      // Adicionar classe para o corpo da página
      $("body").toggleClass("high-contrast");
    });

    // Ao passar o cursor sobre parágrafos, botões e títulos
    $("p, button, h1, h2, h3").hover(
      function() {
        $(this).addClass("hover zoom-effect");
      },
      function() {
        $(this).removeClass("hover zoom-effect");
      }
    );
  });

  // Baixar leitor de tela
  document.getElementById("screen-reader-button").addEventListener("click", function(event) {
    event.preventDefault(); // Evita que o link seja seguido normalmente
    var link = this.querySelector("a").getAttribute("href");
    window.open(link, "_blank"); // Abre o link em uma nova aba
  });

  // Aumenta o tamanho da fonte
  var botao = document.getElementById("alterar-fonte");
  var bodyElement = document.body;
  var headers = document.querySelectorAll("h1, h2, h3, h4, h5, h6");
  var tamanhoOriginal = "22px";
  var tamanhoAumentado = "40px";
  var tamanhoAtual = tamanhoOriginal;
  var clicouUmaVez = false;

  function alternarTamanhoFonte() {
    if (!clicouUmaVez) {
      tamanhoAtual = tamanhoAumentado;
      clicouUmaVez = true;
    } else {
      tamanhoAtual = tamanhoOriginal;
      clicouUmaVez = false;
    }
    bodyElement.style.fontSize = tamanhoAtual;
    headers.forEach(function(header) {
      header.style.fontSize = tamanhoAtual;
    });
  }

  botao.addEventListener("click", alternarTamanhoFonte);
</script>