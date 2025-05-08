<?php
    class ContatoDAO {
        public function create(Contato $contato) {
            try{
                $sql = "INSERT INTO contato(email, comentario, tipo_coment)
                values(:email, :comentario, :tipo_coment)";
                
                $p_sql = Conexao::getConexao()->prepare($sql);
                
                $p_sql->bindValue(":email",$contato->getEmail());
                $p_sql->bindValue(":comentario",$contato->getComentario());
                $p_sql->bindValue(":tipo_coment",$contato->getTipocoment());
                return $p_sql->execute();
            }
            catch(Exception $erro) {
                print "Erro ao Inserir ao enviar o comentario <br>". $erro ."<br>";
            }
        } 
        public function read(){
            try{
                $sql = "SELECT * FROM contato order by idCot asc";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->Lista_postagens($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os registros <br>". $e ."<br>";
            }

    }
    public function Lista_postagens($row){
        $contato = new Contato();
        $contato->setId($row['idCot']);
        $contato->setEmail($row['email']);
        $contato->setComentario($row['comentario']);
        $contato->setTipocoment($row['tipo_coment']);
        

        return $contato;
    }
}
?>