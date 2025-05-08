<?php

session_start();

 

$tipo = $_SESSION["tipo"];
$situacao = $_SESSION["situacao"];


if($tipo !== "professor"  || $situacao !== "1"){
    header("Location: ../../FRONT_END_HTML/restringido.php");
}





?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Helpfast - Melhor Website de Acessibilidade</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap" rel="stylesheet">

    <!-- Quill - Editor de Texto Rico -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Seu estilo personalizado -->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>

    </style>
</head>
<body>
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
                        <a class="nav-link">Ferramenta</a>
                    </li>
                    
                </ul>

            </div>
        </div>
    </nav>
    <br>
    <!-- Contéudo da Página Home -->
    <div class="container">
        <div class="mx-auto">
            <h2>Adicionar Conteudo</h2>
            <h5>Mande o arquivo para que os alunos recebam a materia</h5><br>


            <form  style="margin-top: 30px;" method="post" action="../../BACK_END_PHP/arquivos/controller/ArquivoController.php" enctype="multipart/form-data">

    <div class="container-md">
      <div class="row">
   
        <!-- select/option -->
        <div class="col-md-12">
        <input type="file" name="arquivo" id="arquivo">
        </div>

        <div class="col-md-6">
          <label for="motivo" class="form-label paragrafo">Enviar para qual local?:</label>
          <select name="Materia" class="form-select" id="motivo">
          <option value="geografia">Geografia</option>
                    <option value="portugues">Português</option>
                    <option value="biologia">Biologia</option>
                    <option value="matematica">Matemática</option>
                    <option value="fisica">Física</option>
                    <option value="educacaofisica">Educação Física</option>
                    <option value="historia">História</option>
                    <option value="filosofia">Filosofia</option>
                    <option value="sociologia">Sociologia</option>
          </select>
        </div>
       
      </div>
    </div>
<br>
    <div style="display: flex; justify-content: center; align-items: center;">
      <button class="btn btn-primary" type="submit" name="enviar-materias">Enviar</button>
    </div>

  </form>
           

<!-- Conteudo -->


<!-- Final -->


</body>
</html>