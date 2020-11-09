<?php
class EstudoDAO {

    private $sql;

    public function consultar() {
        $this->sql = "SELECT * FROM estudos";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }

    }
    public function consultarId($idEstudo){
        $this->sql = "SELECT * from estudos where idEstudo = :idEstudo";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idEstudo", $idEstudo);
            $executar->execute();
            return $executar->fetch();
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function consultarTituloPeloId($idEstudo){
        $this->sql = "SELECT titulo from estudos where idEstudo = :idEstudo";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idEstudo", $idEstudo);
            $executar->execute();
            return $executar->fetch()['titulo'];
        } catch (Exception $e) {
            return 0;
        }     
     }



}