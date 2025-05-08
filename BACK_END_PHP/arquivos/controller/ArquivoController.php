<?php
include_once "../conexao/conexao.php";
include_once "../dao/ArquivoDao.php";
include_once "../model/ArquivosMod.php";

$arquivo = new Arquivo();
$arquivodao = new ArquivoDAO();

$d = filter_input_array(INPUT_POST);

if(isset($_REQUEST['enviar-materias'])) {
    $nomeArquivo = $_FILES['arquivo']['name'];
    $caminhoDestino = '../Arquivos Converts/' . $nomeArquivo;

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoDestino)) {
        echo "<script language='javascript'>
        alert('Material adicionado com sucesso!!!');
        window.location.href='../../../FRONT_END_HTML/pagina_academica/ferramentas.php';
    </script>";
    } else {
        echo "<script language='javascript'>
        alert('erro ao adicionar arquivo!!!');
        window.location.href='../../../FRONT_END_HTML/pagina_academica/ferramentas.php';
    </script>";
    }
    
    $caminhoDestino = '../../BACK_END_PHP/arquivos/Arquivos Converts/' .$nomeArquivo;
    $arquivo->setMateria($d['Materia']);
    $arquivo->setNomeArq($caminhoDestino);
    $arquivodao->create($arquivo);


    // header("Location: ../../../FRONT_END_HTML/pagina_academica/ferramentas.php");
}

