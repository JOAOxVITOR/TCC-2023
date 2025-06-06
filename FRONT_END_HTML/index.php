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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navegação Web -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand">HELPFAST</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Arrumar caminhos -->
                    <li class="nav-item">
                        <a class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../FRONT_END_HTML/pagina_inicial/biografia.php">Quem Somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../FRONT_END_HTML/pagina_inicial/contato.php">Contato</a>
                    </li>
                </ul>

                <!-- Arrumar caminhos... -->
                <!-- Parte para Entrar dentro do PAD -->
                <form class="d-flex" role="search">
                    <a class="btn btn-success" href="../FRONT_END_HTML/login_registro/login.php" alt="Entrar">Entrar</a>
                </form>
            </div>
        </div>
    </nav>
    <br>
    <!-- Contéudo da Página Home -->
    <div class="container">
        <div class="mx-auto">
            <h2>Conversor Braille</h2>
            <h5>Após escrever algo aperte no botão "Enviar" e logo em seguida no botão "Baixar"</h5><br>

            <!-- Quill Editor -->
            <div id="editor"></div>

            <!-- Botões para o Envio e apagar -->
            <br>
            <button class="btn btn-primary" type="submit" alt="Enviar Texto" onclick="enviarTexto()">Enviar Texto</button>
            <button class="btn btn-danger" type="reset" alt="Apagar Texto" onclick="apagarTexto()">Apagar Texto</button>

            <!-- Botão que irá permitir o download do arquivo em Braille -->
            <a class="btn btn-success" id="Download" alt="Baixar Arquivo" download="braille.txt"> &darr; Baixar Arquivo Braille</a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
        });

        // Defina o tamanho da fonte inicial para "Heading 1"
        quill.format('header', '1');

        function apagarTexto() {
            quill.root.innerHTML = '<p><br></p>'; // Limpa o conteúdo do Quill
        }

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
</body>
</html>