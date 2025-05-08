<?php

    include_once "../conexao/conexao.php";
    include_once "../dao/PostagensDao.php";
    include_once "../model/PostagensMod.php";

    $postagem = new Postagem();
    $postagemdao = new PostagensDAO();

   $d = filter_input_array(INPUT_POST);


   
   if(isset($_POST['enviar'])){

       $postagem->setTitulo($d['titulo']);
       $postagem->setTexto($d['texto']);
       $postagem->setlocal_pag($d['local_pag']);
      
       $postagemdao->create($postagem);

 header("Location: ../../../../TCC_FULL/FRONT_END_HTML/administração/adm.php");


		  
		 
          

 }
 
 if(isset($_POST['alterar'])){

   $postagem->setId($d['id']);
   $postagem->setTitulo($d['titulo']);
   $postagem->setTexto($d['texto']);
   $postagem->setlocal_pag($d['local_pag']);

   echo"<script language=javascript>
   alert('ALTERAÇÂO Feito com Sucesso!!!');
    location.href='../../../../../TCC_FULL/FRONT_END_HTML/administração/tabela3.php'
    </script>";
   $postagemdao->update($postagem);





}

// função delete
else if(isset($_GET['del'])){
  $postagem->setId($_GET['del']); //metodo GET pega o valor que veio com o del
  $postagemdao->delete($postagem);

  
  echo"<script language=javascript>
  alert('Delete Feito com Sucesso!!!');
   location.href='../../../../../TCC_FULL/FRONT_END_HTML/administração/tabela3.php'
   </script>";


}


?>