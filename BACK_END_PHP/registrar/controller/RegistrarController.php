
    <?php
    include_once "../conexao/Conexao.php";
    include_once "../dao/RegistrarDao.php";
    include_once "../model/registrarMod.php";

    $registrar = new Registrar();
    $registrardao = new RegistrarDAO();

   $d = filter_input_array(INPUT_POST);

if(isset($_REQUEST['registrar'])){
       $registrar->setName($d['name']);
       $registrar->setEmail($d['email']);
       $registrar->setSchool($d['escola']);
       $registrar->setAno($d['ano_matricula']);

       $email = $_REQUEST['email'];
       $senha =  $_REQUEST['password'];
       $tipo =  $_REQUEST['opcao'];
       $confirmar_senha = $_REQUEST['confirm-password'];
       
       
       $registrar->setTipo($d['opcao']);

       
      $row = $registrardao->verify($email);
      $numeroDeLinhas = count($row);
      if ($numeroDeLinhas >=1){

        echo "<script language='javascript'>
        alert('Já existe um login no banco com esse email!!!');
        window.location.href='../../../FRONT_END_HTML/administração/conf.php';
    </script>";
    exit;
      }

      $row = $registrardao->verify_adm($email);
      $numeroDeLinhas = count($row);

      if ($numeroDeLinhas >=1){


        echo "<script language='javascript'>
        alert('Já existe um login no banco com esse email!!!');
        window.location.href='../../../FRONT_END_HTML/administração/conf.php';
    </script>";
    
    exit;
    
      }

if($confirmar_senha ==  $senha && $numeroDeLinhas == 0 && $tipo !== "admin"){
  $hash = hash('sha256', $senha);
  $registrar->setPassword($hash);
  

  $registrardao->create($registrar);

echo "<script language=javascript>
alert('Usuario Adicionado com Sucesso!!');
window.location.href='../../../FRONT_END_HTML/administração/conf.php'
</script>";

}
             
if($confirmar_senha ==  $senha && $numeroDeLinhas == 0 && $tipo == "admin" && $numeroDeLinhas == 0){
    $hash = hash('sha256', $senha);
    $registrar->setPassword($hash);
    
  
    $registrardao->create_admin($registrar);
    header("Location: ../../../FRONT_END_HTML/administração/conf.php");
  }
 

else{
echo"Sua senha não é copativel com o seu confirmar senha";
}
      }
   

   //LOGIN

   if(isset($_REQUEST['enviar-login'])){
    $email = $_REQUEST['email'];
    $password = hash('sha256', $_REQUEST['password']);


   
 


    $row = $registrardao->login_adm($email, $password);
    $numeroDeLinhas= count($row);

    if ($numeroDeLinhas == 1 ){
        
        $situacao = $row[0]->getSituacao();
        $senha_confirm =$row[0]->getPassword();
        $tipo = $row[0]->getTipo();

            if($situacao == 0){
                echo "<script language=javascript>
                        alert('Usuário inativo!');
                        window.location.href='../../../FRONT_END_HTML/login_registro/login.php'
                    </script>";
                  
                    
            }
            if($situacao == 1){
 session_start();
 $_SESSION["email"] = $row[0]->getEmail();
 $_SESSION["senha"] = $row[0]->getPassword();

                header("Location: ../controller/login_adm.php");
            exit;
            }
        }
            
            if($numeroDeLinhas == 0){

    $row = $registrardao->login($email, $password);
    $numeroDeLinhas= count($row); 

    if($numeroDeLinhas == 0){
        echo "<script language=javascript>
        alert('Usuário Inecistente!!!!!!!');
        window.location.href='../../../../../TCC_FULL/FRONT_END_HTML/login_registro/login.php'
        </script>";
        exit;
       }
            else{
            $situacao = $row[0]->getSituacao();
            $senha_confirm =$row[0]->getPassword();
            $tipo = $row[0]->getTipo();
        }}

      
           
            if ($situacao == 0 ){


             echo "<script language=javascript>
             alert('Usuário inativo!!!!!!!');
             window.location.href='../../../../../TCC_FULL/FRONT_END_HTML/login_registro/login.php'
             </script>";
            }
if($situacao  == 1 && $senha_confirm == $password && $tipo !== "admin"){
    session_start();


                $_SESSION["id"] = $row[0]->getId();
                $_SESSION["nome"] = $row[0]->getName();
                $_SESSION["email"] = $row[0]->getEmail();
                $_SESSION["senha"] = $row[0]->getPassword();
                $_SESSION["escola"] = $row[0]->getSchool();
                $_SESSION["ano"] = $row[0]->getAno();
                $_SESSION["tipo"] = $row[0]->getTipo();
                $_SESSION["situacao"] = $row[0]->getSituacao();
            
 
             header("Location: ../../../FRONT_END_HTML/pagina_academica/academica.php");
             exit;
            } 
  
            
            else{
        
                    echo "<script language=javascript>
                    alert('Erro ao efetuar o login!!!!');
                    window.location.href='../../../../TCC_FULL/FRONT_END_HTML/login_registro/login.php'
                    </script>";
                exit;
            }

            
        




        }

    // ALTERAR SENHA 
    if(isset($_REQUEST['att-senha'])){
        session_start();
        $email = $_SESSION["email"]; 
        $password = hash('sha256',$_REQUEST['password']);

        $row = $registrardao->login($email, $password);
        $numeroDeLinhas= count($row);
             

        if ($numeroDeLinhas == 1 ){
    
        $registrar->setEmail($email);
        $registrar->setPassword(hash('sha256',$_REQUEST['newpassword']));

    
    

         echo "<script language=javascript>
         alert('Senha Alterada com Sucesso!!!!');
         window.location.href='../../../../../TCC_FULL/FRONT_END_HTML/pagina_academica/academica.php'
         </script>";
     
         $registrardao->update($registrar);
        }
        else{
            echo"Erro ao atualizar senha";
        }
    }
    
   else if(isset($_GET['ativar'])){

    $registrar->setId($_GET['ativar']);

        $registrardao->Ativar($registrar);


     
         echo "<script language=javascript>
         alert('Ativação bem Sucedida!!!!');
         window.location.href='../../../../../TCC_FULL/FRONT_END_HTML/administração/conf.php'
         </script>";
     
     
     
     
     }
     
     
     else if(isset($_GET['desativar'])){
       $registrar->setId($_GET['desativar']);
        
       $registrardao->Desativar($registrar);
     
       
     
        echo "<script language=javascript>
        alert('Desativação bem Sucedida!!!!');
        window.location.href='../../../../../TCC_FULL/FRONT_END_HTML/administração/conf.php'
        </script>";
     
     }
     
     
    