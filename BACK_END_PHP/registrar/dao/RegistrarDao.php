<?php


    class RegistrarDAO{
        public function create(registrar $registrar){
            try{
                $sql = "INSERT INTO registrar(nome, email, senha, escola, tipo, ano_matricula)
                values(:nome, :email, :senha, :escola, :tipo, :ano_matricula)";
                
                $p_sql = Conexao::getConexao()->prepare($sql);
                
                $p_sql->bindValue(":nome",$registrar->getName());
                $p_sql->bindValue(":email",$registrar->getEmail());
                $p_sql->bindValue(":senha",$registrar->getPassword());
                $p_sql->bindValue(":escola",$registrar->getSchool());
                $p_sql->bindValue(":tipo",$registrar->getTipo());
                $p_sql->bindValue(":ano_matricula",$registrar->getAno());

                return $p_sql->execute();
            }
            catch(Exception $erro){
                print "Erro ao Inserir registrar <br>". $erro ."<br>";
            }
        }

        public function create_admin(registrar $registrar){
            try{
                $sql = "INSERT INTO Adms(nome, email, senha, tipo)
                values(:nome, :email, :senha,:tipo)";
                
                $p_sql = Conexao::getConexao()->prepare($sql);
                
                $p_sql->bindValue(":nome",$registrar->getName());
                $p_sql->bindValue(":email",$registrar->getEmail());
                $p_sql->bindValue(":senha",$registrar->getPassword());
                $p_sql->bindValue(":tipo",$registrar->getTipo());

                return $p_sql->execute();
            }
            catch(Exception $erro){
                print "Erro ao Inserir registrar <br>". $erro ."<br>";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM registrar order by id asc";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaRegistrar($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os folhapag <br>". $e ."<br>";
            }
        }
        public function read_adm(){
            try{
                $sql = "SELECT * FROM registrar order by id asc";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaRegistrar_adm($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os folhapag <br>". $e ."<br>";
            }
        }

     
        private function listaRegistrar($row){
            $registrar = new Registrar();

            $registrar->setId($row['id']);
            $registrar->setName($row['nome']);
            $registrar->setEmail($row['email']);
            $registrar->setPassword($row['senha']);
            $registrar->setSchool($row['escola']);
            $registrar->setTipo($row['tipo']);
            $registrar->setSituacao($row['situacao']);
            $registrar->setAno($row['ano_matricula']);

            return $registrar;

            
        }
        private function listaRegistrar_adm($row){
            $registrar = new Registrar();

            $registrar->setId($row['id']);
            $registrar->setName($row['nome']);
            $registrar->setEmail($row['email']);
            $registrar->setPassword($row['senha']);
            $registrar->setTipo($row['tipo']);
            $registrar->setSituacao($row['situacao']);


            return $registrar;

            
        }
       
    
        public function login($email,$password){
            try{
                $sql = "SELECT * FROM registrar WHERE email = '$email' AND senha = '$password'";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaRegistrar($l);
                }
                
                return $f_lista;
            } catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os Usuarios <br>". $e ."<br>";
            }
            
        }

        public function verify($email){
            try{
                $sql = "SELECT * FROM registrar WHERE email = '$email' ";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaRegistrar($l);
                }
                
                return $f_lista;
            } catch(Exception $e){
                print "Ocorreu um erro ao buscar  os Usuarios no banco <br>". $e ."<br>";
            }
        }
        public function verify_adm($email){
            try{
                $sql = "SELECT * FROM Adms WHERE email = '$email' ";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaRegistrar_adm($l);
                }
                
                return $f_lista;
            } catch(Exception $e){
                print "Ocorreu um erro ao buscar  os Usuarios no banco <br>". $e ."<br>";
            }
        }
         
    public function update(registrar $registrar){
        try{
            $sql = "UPDATE registrar SET senha = :senha  where email = :email";
            
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":email",$registrar->getEmail());
            $p_sql->bindValue(":senha",$registrar->getPassword());



            
            return $p_sql->execute();
        }
        catch(Exception $e){
            print "Ocorreu um erro ao tentar atualizar o editar postagens <br>". $e ."<br>";
        }
    }

    public function login_adm($email,$password){
        try{
            $sql = "SELECT * FROM Adms WHERE email = '$email' AND senha = '$password'";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach($lista as $l){
                $f_lista[] = $this->listaRegistrar_adm($l);
            }
            
            return $f_lista;
        } catch(Exception $e){
            print "Ocorreu um erro ao buscar todos os Usuarios <br>". $e ."<br>";
        }
        
    }
    public function Desativar(registrar $registrar){
        try{
            $sql = "UPDATE registrar SET situacao = 0  where id = :id";
            
            $p_sql = Conexao::getConexao()->prepare($sql);
            
            $p_sql->bindValue(":id",$registrar->getId());
            
            return $p_sql->execute();
        }
        catch(Exception $e){
            print "Ocorreu um erro ao tentar atualizar o editar postagens <br>". $e ."<br>";
        }
    }
    public function Ativar(registrar $registrar){
        try{
            $sql = "UPDATE registrar SET situacao = 1  where id = :id";
            
            $p_sql = Conexao::getConexao()->prepare($sql);
            
            $p_sql->bindValue(":id",$registrar->getId());
            
            return $p_sql->execute();
        }
        catch(Exception $e){
            print "Ocorreu um erro ao tentar atualizar o editar postagens <br>". $e ."<br>";
        }
    }
        
}
?>