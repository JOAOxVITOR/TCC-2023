<?php
    class Contato {
        private $id;
        private $email;
        private $comentario;
        private $tipocoment;
        
        //GET
        function getId() {
            return $this->id;
        }
        function getEmail() {
            return $this->email;
        }
        function getComentario() {
            return $this->comentario;
        }
        function getTipocoment() {
            return $this->tipocoment;
        }
        // SET
        function setId($id) {
            $this->id = $id;
        }
        function setEmail($email) {
            $this->email = $email;
        }
        function setComentario($comentario) {
            $this->comentario = $comentario;
        }
        function setTipocoment($tipocoment) {
            $this->tipocoment = $tipocoment;
        }
    }
?>