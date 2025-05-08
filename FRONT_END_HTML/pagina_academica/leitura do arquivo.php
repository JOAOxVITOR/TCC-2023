<?php

session_start();


$tipo = $_SESSION["tipo"];

include_once "../../BACK_END_PHP/arquivos/conexao/conexao.php";
include_once "../../BACK_END_PHP/arquivos/dao/ArquivoDao.php";
include_once "../../BACK_END_PHP/arquivos/model/ArquivosMod.php";


$arquivo = new Arquivo();
$arquivodao = new ArquivoDAO();

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

    <!-- quill -->
   
    <!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->



    
    <!-- Seu estilo personalizado -->
    <link rel="stylesheet" type="text/css" href="../../FRONT_END_CSS/paginas/style.css">
    <link rel="stylesheet" type="text/css" href="../../FRONT_END_CSS/paginas/ferramenta.css">
    <style>


p{
    display: flex;
    align-items: center;
    justify-content: center;
}
        </style>
</head>

    <!-- Navegação Web -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Arrumar caminhos -->
                    <li class="nav-item">
                        <a class="nav-link" href="../pagina_academica/academica.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pagina_academica/materias.php">Materias</a>
                    </li>
                    <li class="nav-item">
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
                    </li>
                    
                </ul>

            </div>
        </div>
    </nav>
    <br>
<!-- função ler -->
<?php 
if(isset($_GET["leitura_arq"])){

$id = $_GET["leitura_arq"];
$arquivo = $arquivodao->read_arq($id);
$nomeArquivo = $arquivo[0]->getNomeArq();
// print_r($nomeArquivo);
$nome_filtro = basename($nomeArquivo);

$caminhoDestino = '../../BACK_END_PHP/arquivos/Arquivos Converts/' . $nome_filtro;


$arquivo = fopen($caminhoDestino,'r');

}
if ($arquivo){

    $conteudo = fread($arquivo, filesize($caminhoDestino));

echo "<br>
<p class='center'>$conteudo</p>
<br>";
    fclose($arquivo);



} else {
    echo "Não foi possível abrir o arquivo '$caminhoDestino' para leitura.";
}
?>
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
    
<div style="display: none;">

    <div id="editor" >

    </div>

 </div>
    <div>

    <br>
    <button class="btn btn-primary" type="submit" alt="Enviar Texto" onclick="enviarTexto()">Enviar Texto</button>
    <!-- Botão que irá permitir o download do arquivo em Braille -->
    <a class="btn btn-success" id="Download" alt="Baixar Arquivo" download="<?php  echo $nome_filtro;?>" style="display: none;">&darr; Baixar Arquivo Braille</a>
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
 








    <!-- JavaScript -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>


        var quill = new Quill('#editor', {
            theme: 'snow',
        });
        var conteudo = "<?php echo $conteudo; ?>";
        quill.clipboard.dangerouslyPasteHTML(conteudo);

        // Defina o tamanho da fonte inicial para "Heading 1"
        quill.format('header', '1');


        function enviarTexto() {
         



            var textoBraille = textoParaBraille(quill.root.textContent); // Converte o texto para Braille

            // Crie um objeto Blob com o texto em Braille
            var blob = new Blob([textoBraille], { type: 'text/plain' });

            // Crie uma URL para o objeto Blob
            var url = URL.createObjectURL(blob);

            // Configure o link de download para a URL do Blob
            var downloadLink = document.getElementById('Download');
            downloadLink.href = url;

            // Tornar o botão de download visível
            downloadLink.style.display = 'inline';
        }

        const brailleMap = {
            'a': '⠁',
            'b': '⠃',
            'c': '⠉',
            'd': '⠙',
            'e': '⠑',
            'f': '⠋',
            'g': '⠛',
            'h': '⠓',
            'i': '⠊',
            'j': '⠚',
            'k': '⠅',
            'l': '⠇',
            'm': '⠍',
            'n': '⠝',
            'o': '⠕',
            'p': '⠏',
            'q': '⠟',
            'r': '⠗',
            's': '⠎',
            't': '⠞',
            'u': '⠥',
            'v': '⠧',
            'w': '⠺',
            'x': '⠭',
            'y': '⠽',
            'z': '⠵',
            '/': '⠸',
            ',': '⠂',
            '.': '⠲',
            '"': '⠦',
            '+': '⠬',
            '=': '⠐',
            '-': '⠤',
            '(': '⠶',
            ')': '⠶',
            '[': '⠷',
            ']': '⠾',
            '{': '⠻',
            '}': '⠳',
            '0': '⠚⠋',
            '1': '⠁⠚',
            '2': '⠃⠚',
            '3': '⠉⠚',
            '4': '⠙⠚',
            '5': '⠑⠚',
            '6': '⠋⠚',
            '7': '⠛⠚',
            '8': '⠓⠚',
            '9': '⠊⠚'
        };

        function textoParaBraille(texto) {
            texto = texto.toLowerCase();
            let braille = '';

            for (let i = 0; i < texto.length; i++) {
                const char = texto[i];
                if (brailleMap[char]) {
                    braille += brailleMap[char];
                } else {
                    braille += char;
                }
            }

            return braille;
        }
    </script>