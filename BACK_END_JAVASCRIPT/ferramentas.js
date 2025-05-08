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