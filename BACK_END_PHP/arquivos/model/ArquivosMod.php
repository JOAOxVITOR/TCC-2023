<?php
    class Arquivo
    {
        private $id;
        private $nomeArq;
        private $materia;

  

        
        //GET
        function getId(){
            return $this->id;
        }
        function getNomeArq(){
            return $this->nomeArq;
        }
        function getMateria(){
            return $this->materia;
        }
        
        // SET
        function setId($id){
            $this->id = $id;
        }
        function setNomeArq($nomeArq){
            $this->nomeArq = $nomeArq;
        }
        function setMateria($materia){
            $this->materia = $materia;
        }

        

    }

?>