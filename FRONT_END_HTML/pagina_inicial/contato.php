<?php
include_once "../../BACK_END_PHP/Contato/conexao/Conexao.php";
include_once "../../BACK_END_PHP/Contato/dao/ContatoDao.php";
include_once "../../BACK_END_PHP/Contato/model/ContatoMod.php";

$contato = new Contato();
$contatodao = new ContatoDAO();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Helpfast - Página de Inicial</title>
  <!-- Fontes Integradas na Página -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Brush+Script+MT&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- CSS Integrado na Página -->
  <link rel="stylesheet" href="../../FRONT_END_CSS/paginas/ferramenta.css">
  <link rel="stylesheet" href="../../FRONT_END_CSS/paginas/biografia.css">
 
</head>
<body style="font-size: 22px;">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">HELPFAST</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php" alt="Página Inicial">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pagina_inicial/biografia.php" alt="Biografia">Quem Somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pagina_inicial/contato.php" alt="Contato">Contato</a>
                    </li>
                  </ul>
            </div>
            <form class="d-flex" role="search">
                    <a class="btn btn-success" href="../login_registro/login.php" alt="Entrar">Entrar</a>
                </form>         
        </div>
    </nav>
  <!-- Final do navbar  -->

  <!-- Body da Página -->
  <br>
  <form  method="post" action="../../BACK_END_PHP/Contato/controller/ContatoController.php">
    <h1 class="centered">Preencha os dados a seguir:</h1>

    <div class="container-md">
      <div class="row">

        <!-- col-md-x -->
        <div class="col-md-6">
          <label  for="email" class="form-label paragrafo">E-mail:</label>
          <input name="email" type="text" class="form-control" id="email" not null required>
        </div>
        <!-- select/option -->
        <div class="col-md-6">
          <label for="motivo" class="form-label paragrafo">Motivo:</label>
          <select name="tipo_coment" class="form-select" id="motivo">
          <option name="reclamação"> Reclamação </option>
          <option name="opnião"> Opnião </option>
          <option name="duvida"> Dúvida </option>
          </select>
        </div> 
        <!-- textarea -->
        <div class="col-md-12">
          <label for="mensagem" class="form-label paragrafo">Mensagem:</label><br>
          <div  class="form-floating">
            <textarea  name="comentario" class="form-control" id="comentario" style="height: 200px"></textarea>
          </div>
          <br>
        </div>

       
      </div>
  
    </div>
    <button name="enviar" type="submit" class="animated-button">Enviar</button>
</form>

  <!-- Widget Acessibilidade -->
  <div class="accessibility-panel">
    <button id="alterar-fonte" class="custom-tooltip" title="Zoom In">
      <i class="material-icons">add</i>
    </button>

    <button id="high-contrast-button" class="custom-tooltip high-contrast-button-link" title="Ativar Alto Contraste">
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
<script src="../BACK_END_JAVASCRIPT/ferramentas.js"></script>
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
