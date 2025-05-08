<?php
    class ArquivoDAO {
        public function create(Arquivo $arquivo) {
            try{
                $sql = "INSERT INTO arquivos( nomeArq, materia)
                values( :nomeArq, :materia)";
                
                $p_sql = Conexao::getConexao()->prepare($sql);
                
        
                $p_sql->bindValue(":nomeArq",$arquivo->getNomeArq());
                $p_sql->bindValue(":materia",$arquivo->getMateria());
                return $p_sql->execute();

          
            }
            catch(Exception $erro) {
                print "Erro ao Inserir ao enviar o comentario <br>". $erro ."<br>";
            }
        } 
        public function read(){
            try{
                $sql = "SELECT * FROM arquivos order by id asc";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->Lista_arquivos($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os registros <br>". $e ."<br>";
            }

    }
    public function read_arq($id){
        try{
            $sql = "SELECT nomeArq FROM arquivos where id = '$id'";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchALL(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach($lista as $l){
                $f_lista[] = $this->Lista_ler($l);
            }
            
            return $f_lista;
        }
        catch(Exception $e){
            print "Ocorreu um erro ao buscar todos os registros <br>". $e ."<br>";
        }}
    public function Lista_arquivos($row){
        $arquivo = new Arquivo();
        $arquivo->setId($row['id']);
        $arquivo->setNomeArq($row['nomeArq']);
        $arquivo->setMateria($row['materia']);

        

        return $arquivo;
    }

    public function Lista_ler($row){
        $arquivo = new Arquivo();
        $arquivo->setNomeArq($row['nomeArq']);

        

        return $arquivo;
    }
}
?>