<?php


    class PostagensDAO{
        public function create(postagem $postagem){
            try{
                $sql = "INSERT INTO edit_postagens(titulo, texto, local_pag)
                values(:titulo, :texto, :local_pag)";
                
                $p_sql = Conexao::getConexao()->prepare($sql);
                
                $p_sql->bindValue(":titulo",$postagem->getTitulo());
                $p_sql->bindValue(":texto",$postagem->getTexto());
                $p_sql->bindValue(":local_pag",$postagem->getlocal_pag());
                
                return $p_sql->execute();
            }
            catch(Exception $erro){
                print "Erro ao Inserir ao enviar o comentario <br>". $erro ."<br>";
            }
        }
        public function read(){
            try{
                $sql = "SELECT * FROM edit_postagens order by id asc";
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
        public function read_pages($local_pag){
            try{
                $sql = "SELECT * FROM edit_postagens where local_pag = :local_pag order by id asc";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindParam(':local_pag', $local_pag, PDO::PARAM_STR);
                $stmt->execute();
        
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            $postagem = new Postagem();
            $postagem->setId($row['id']);
            $postagem->setTitulo($row['titulo']);
            $postagem->setTexto($row['texto']);
            $postagem->setlocal_pag($row['local_pag']);
            
    
            return $postagem;
        }
      


 
    public function update(Postagem $postagem){
        try{
            $sql = "UPDATE edit_postagens SET titulo = :titulo, texto = :texto, local_pag = :local_pag   where id = :id";
            
            $p_sql = Conexao::getConexao()->prepare($sql);
            
            $p_sql->bindValue(":id",$postagem->getId());
            $p_sql->bindValue(":titulo",$postagem->getTitulo());
            $p_sql->bindValue(":texto",$postagem->getTexto());
            $p_sql->bindValue(":local_pag",$postagem->getlocal_pag());


            
            return $p_sql->execute();
        }
        catch(Exception $e){
            print "Ocorreu um erro ao tentar atualizar o editar postagens <br>". $e ."<br>";
        }
    }

    public function delete(Postagem $postagem){
        try{
            $sql = "DELETE  FROM edit_postagens where id = :id";
            
            $p_sql = Conexao::getConexao()->prepare($sql);

            $p_sql->bindValue(":id",$postagem->getId());
            
            return $p_sql->execute();

        }
        catch(Exception $e){
            print "Erro ao excluir o editor postagens <br>". $e ."<br>";
        }


    }

}
?>