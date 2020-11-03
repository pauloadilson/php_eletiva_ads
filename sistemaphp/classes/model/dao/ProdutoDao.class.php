<?php
class ProdutoDAO {

    private $sql;

    public function inserir($produto)
    {
        $this->sql = "INSERT INTO produtos (descricao, id_categorias) "
        ."VALUES (:descricao, :id_categorias)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":descricao", $produto->getDescricao());
            $executar->bindValue(":id_categorias", $produto->getIdCategoria());
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar() {
        $this->sql = "SELECT p.id as id, p.descricao as descricao, c.descricao as descricao_categoria FROM categoria c, produtos p
                        where c.id = p.id_categorias";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }
    }

}


?>