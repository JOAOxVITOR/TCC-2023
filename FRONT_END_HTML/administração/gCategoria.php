<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="admStyle.css">
</head>

<body>

    <!-- Administração -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand">ADM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="adm.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadUsuario.php">Cadastrar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabela.php">Tabelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login_registro/login.php">Sair</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Conteúdo do formulário -->

    <h1 style="display: flex; justify-content: center; margin-top: 20px;"> Gerenciamento de Categoria</h1>

    <form class="form">
        <div class="container" style="margin-top: 20px;">
            <div class="row">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Matematica</td>
                        <td>Padrão</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Informatica</td>
                        <td>Curso</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Ética</td>
                        <td>Novo Ensino</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <a class="btn btn-danger" href="../administração/tabelas.html">Voltar</a>
        </div>
    </form>
    <!-- Final da administração -->
</body>

</html>