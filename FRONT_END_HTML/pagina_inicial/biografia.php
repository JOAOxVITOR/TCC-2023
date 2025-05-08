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
    <link rel="stylesheet" href="../../FRONT_END_CSS/paginas/ferramenta.css">
    <link rel="stylesheet" href="../../FRONT_END_CSS/paginas/biografia.css">
    <link rel="stylesheet" href="../../FRONT_END_CSS/paginas/style.css">
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
                        <a class="nav-link" aria-current="page" href="../index.php" alt="Página Inicial">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pagina_inicial/biografia.php" alt="Biografia">Quem Somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pagina_inicial/contato.php" alt="Contato">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login_registro/login_adm.php" alt="Entrar">Entrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Final do navbar  -->
    <br>
    <!-- Body da Página -->
 

    <div class="container" style="margin-bottom: 300px;">
        <div class="row">

            <div class="paragrafo">
                <h2> Biografia </h2>
                
                <p>No ano de 2023, na Escola Técnica Estadual (Etec) Rodolpho José Del Guerra, localizada em São José do Rio Pardo, um grupo composto por seis alunos do terceiro ano do ensino médio se viu diante da necessidade de realizar um Trabalho de Conclusão de Curso (TCC). Durante o período de desenvolvimento desse projeto acadêmico, uma situação notável capturou a atenção desses estudantes: a presença de uma aluna portadora de deficiência visual na instituição.</p>

                <p>A aluna em questão utilizava um método de estudo peculiar, que consistia em transcrever, em uma máquina, o conteúdo ministrado durante as aulas, possibilitando, assim, a revisão posterior. Essa observação sensibilizou a equipe, levando-os a conceber a ideia de criar um website com o propósito de aprimorar a experiência de aprendizado dessa aluna e, por extensão, de outros alunos com necessidades especiais.</p>
            
                <p>Assim nasceu a "Página Acadêmica". Esse sistema foi concebido como uma ferramenta de apoio à educação que requer um registro por parte dos usuários para ser utilizado plenamente. A distribuição das informações de registro ocorre diretamente no ambiente acadêmico onde o aluno está matriculado, tornando-se parte integrante do processo educacional. No entanto, reconhecendo que nem todos os estudantes estejam vinculados a uma instituição que adote esse sistema ou possuam acesso imediato a ele, foi implementado o modo convidado. Esse modo permite o uso limitado das ferramentas do sistema, mesmo para aqueles que não estejam matriculados em uma escola participante.</p>
            
            <p>Dessa forma, a "Página Acadêmica" busca não apenas facilitar o acesso ao conhecimento, mas também promover a inclusão e igualdade de oportunidades educacionais para todos os estudantes, independentemente de suas circunstâncias individuais ou de sua escola de origem.

                </p>
            </div>

        </div>
    </div>

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
<script src="../BACK_END_JAVASCRIPT/ferramentas.js"></script>
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