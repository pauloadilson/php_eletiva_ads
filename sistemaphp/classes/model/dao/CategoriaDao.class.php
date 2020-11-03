<?php
class CategoriaDAO {

    private $sql;

    public function inserir($categoria)
    {
        $this->sql = "INSERT INTO categoria (descricao) "
        ."VALUES (:descricao)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":descricao", $categoria->getDescricao());
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar() {
        $this->sql = "SELECT * FROM categoria";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }

    }
    
    public function consultarId($id){
       $this->sql = "SELECT * from categoria where id = :id";
       try {
           $conexao = new Conexao();
           $executar = $conexao->getCon()->prepare($this->sql);
           $executar->bindValue(":id", $id);
           $executar->execute();
           return $executar->fetch();
       } catch (Exception $e) {
           return 0;
       }     
    }

    public function alterar($categoria){
        $this->sql = "UPDATE categoria set descricao = :descricao where id = :id";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":descricao", $categoria->getDescricao());
            $executar->bindValue(":id", $categoria->getId());
            return $executar->execute();
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function excluir($categoria){
        $this->sql = "DELETE from categoria where id = :id";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":id", $categoria->getId());
            return $executar->execute(); 
        } catch (Exception $e) {
            return 0;
        }     
     }
}


?>