<?php
    include_once "../conexao/Conexao.php";
    include_once "../dao/ContatoDao.php";
    include_once "../model/ContatoMod.php";

    $contato = new Contato();
    $contatodao = new ContatoDAO();

   $d = filter_input_array(INPUT_POST);

if(isset($_REQUEST['enviar'])) {
      $contato->setEmail($d['email']);
      $contato->setComentario($d['comentario']);
      $contato->setTipocoment($d['tipo_coment']);
      
      $contatodao->create($contato);

       header("Location: ../../../FRONT_END_HTML/pagina_inicial/contato.php");
}
?>