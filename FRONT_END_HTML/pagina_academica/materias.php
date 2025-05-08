<?php

session_start();

 

$tipo = $_SESSION["tipo"];
$situacao = $_SESSION["situacao"];


if($tipo !== "professor" && $tipo !== "aluno" || $situacao !== "1"){
    header("Location: ../../FRONT_END_HTML/restringido.php");
}







include_once "../../BACK_END_PHP/arquivos/conexao/conexao.php";
include_once "../../BACK_END_PHP/arquivos/dao/ArquivoDao.php";
include_once "../../BACK_END_PHP/arquivos/model/ArquivosMod.php";


$arquivo = new Arquivo();
$arquivodao = new ArquivoDAO();


$opcoesDeMaterias = array('geografia', 'portugues', 'biologia', 'matematica', 'fisica', 'educacaofisica', 'historia', 'filosofia', 'sociologia');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpfast - Página de Inicial</title>
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
    <!-- CSS Integrado na Página -->

    <link rel="stylesheet" href="../../FRONT_END_CSS/paginas/style.css">
    <link rel="stylesheet" href="../../FRONT_END_CSS/paginas/ferramenta.css">
    <link rel="stylesheet" href="../../FRONT_END_CSS/adm/tabela.css">

  <style>

          /* Estilo para ocultar as divs das matérias por padrão */
    .materia {
        display: none;
    }
    .materia {
        display: none;
        opacity: 0;
        transition: opacity 0.5s;
    }

    .materia.mostrar {
        display: block;
        opacity: 1;
    }

    /* Estilo para animação do menu suspenso ao passar o mouse */
    select#materias:hover {
        background-color: #336699; /* Cor de fundo quando o mouse passa por cima */
        color: #fff; /* Cor do texto quando o mouse passa por cima */
    }

    select#materias {
        background-color: #fff; /* Cor de fundo padrão */
        color: #000; /* Cor do texto padrão */
        transition: background-color 0.3s, color 0.3s;

    }

  </style>

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
                        <a class="nav-link" aria-current="page" href="../pagina_academica/academica.php" alt="Página Academica">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" alt="materias">Materias</a>
                    </li>
                    <?php 

if( $tipo == "professor"){   

echo'<li class="nav-item">
    <a class="nav-link" href="../pagina_academica/ferramentas.php" alt="ferramenta">Ferramenta</a>
</li>';
 } ?>
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

<form method="post" action="materias.php">
    <label for="materia">Filtrar por Matéria:</label>
    <select name="materia" id="materia">
        <option value="">Todas as Matérias</option>
        <?php
        foreach ($opcoesDeMaterias as $materia){
            echo "<option value=\"$materia\">$materia</option>";
        }
        ?>
    </select>
    <input type="submit" value="Filtrar">
    </form>

<table border="3">
    <tr>
        <th>ID</th>
        <th>Nome do Arquivo</th>
        <th>Matéria</th>
        <th>Download</th>
        <th>Ver Texto</th>
    </tr>

    <?php

    $materiaFiltrada = isset($_POST['materia']) ? $_POST['materia'] : '';

    foreach ($arquivodao->read() as $arquivo){
        
        // Aplica o filtro de matéria
        if ($materiaFiltrada === '' || $arquivo->getMateria() === $materiaFiltrada){
            $nomeArquivo = basename($arquivo->getNomeArq());//pega o nome do arquivo

            echo "<tr>";
            echo "<td>{$arquivo->getId()}</td>";
            echo "<td>{$nomeArquivo}</td>";
            echo "<td>{$arquivo->getMateria()}</td>";
            echo "<td><a href=\"{$arquivo->getNomeArq()}\" download>Download</a></td>";
            ?><td><a href='leitura do arquivo.php?leitura_arq=<?=$arquivo->getId()?>'>
            <button>Ler Arquivo</button>
            </a></td>
            <?php
           
        }
    }
    ?>
</table>

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
    $(document).ready(function () {
        // Ao clicar no botão
        $(".high-contrast-button-link").on("click", function () {
            // Adicionar classe para o corpo da página
            $("body").toggleClass("high-contrast");
        });

        // Ao passar o cursor sobre parágrafos, botões e títulos
        $("p, button, h1, h2, h3").hover(
            function () {
                $(this).addClass("hover zoom-effect");
            },
            function () {
                $(this).removeClass("hover zoom-effect");
            }
        );
    });

// Baixar leitor de tela
    document.getElementById("screen-reader-button").addEventListener("click", function (event) {
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

