<?php
    class Registrar
    {
        private $id;
        private $name;
        private $email;
        private $password;
        private $school;
        private $tipo;
        private $situacao;
        private $ano_matricula;
        
        
        //GET
        function getId(){
            return $this->id;
        }
        function getName(){
            return $this->name;
        }
        function getEmail(){
            return $this->email;
        }
        function getPassword(){
            return $this->password;
        }
        function getSchool(){
            return $this->school;
        }
        function getTipo(){
            return $this->tipo;
        }
        function getSituacao(){
            return $this->situacao;
        }
        function getAno(){
            return $this->ano_matricula;
        }

        // SET
        function setId($id){
            $this->id = $id;
        }
        function setName($name){
            $this->name = $name;
        }
        function setEmail($email){
            $this->email = $email;
        }
        function setPassword($password){
            $this->password = $password;
        }
        function setSchool($school){
            $this->school = $school;
        }
        function setTipo($tipo){
            $this->tipo = $tipo;
        }
        function setSituacao($situacao){
            $this->situacao = $situacao;
        }
        function setAno($ano_matricula){
            $this->ano_matricula = $ano_matricula;
        }
          }

?>