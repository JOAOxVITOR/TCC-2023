<?php
    class Postagem
    {
        private $id;
        private $titulo;
        private $texto;
        private $local_pag;
  

        
        //GET
        function getId(){
            return $this->id;
        }
        function getTitulo(){
            return $this->titulo;
        }
        function getTexto(){
            return $this->texto;
        }
        function getlocal_pag(){
            return $this->local_pag;
        }

        // SET
        function setId($id){
            $this->id = $id;
        }
        function setTitulo($titulo){
            $this->titulo = $titulo;
        }
        function setTexto($texto){
            $this->texto = $texto;
        }
        function setlocal_pag($local_pag){
            $this->local_pag = $local_pag;
        }

          }

?>