<?php

  include_once "../conexao/Conexao.php";
  include_once "../dao/RegistrarDao.php";
  include_once "../model/registrarMod.php";
  include_once "../controller/RegistrarController.php";

  $registrar = new Registrar();
  $registrardao = new RegistrarDAO();


  session_start();
  $email = $_SESSION["email"];
  $password = $_SESSION["senha"];
 


  $row = $registrardao->login_adm($email, $password);
  $tipo = $row[0]->getTipo();
  session_destroy();

if( $tipo == "admin") {
  session_encode();
  session_start();

                $_SESSION["id"] = $row[0]->getId();
                $_SESSION["nome"] = $row[0]->getName();
                $_SESSION["email"] = $row[0]->getEmail();
                $_SESSION["senha"] = $row[0]->getPassword();
                $_SESSION["tipo"] = $row[0]->getTipo();
                $_SESSION["situacao"] = $row[0]->getSituacao();


 
             header("Location: ../../../FRONT_END_HTML/administração/conf.php");
            
            } 


            ?>