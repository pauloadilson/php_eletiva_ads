<?php
class GrupoDAO {

    private $sql;

    public function consultar() {
        $this->sql = "SELECT * FROM grupos";
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
     public function consultarGruposPeloIdEstudo($Estudos_idEstudo){
        $this->sql = "SELECT idGrupo, nome from grupos where Estudos_idEstudo = :Estudos_idEstudo";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":Estudos_idEstudo", $Estudos_idEstudo);
            $executar->execute();
            return $executar->fetchAll();
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function consultarNomeGrupo($idGrupo,$Estudos_idEstudo){
        $this->sql = "SELECT nome from grupos where Estudos_idEstudo = :Estudos_idEstudo and idGrupo = :idGrupo";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":Estudos_idEstudo", $Estudos_idEstudo);
            $executar->bindValue(":idGrupo", $idGrupo);
            $executar->execute();
            return $executar->fetch()['nome'];
        } catch (Exception $e) {
            return 0;
        }     
     }



}