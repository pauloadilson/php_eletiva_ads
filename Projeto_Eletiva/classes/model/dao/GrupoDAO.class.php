<?php
class GrupoDAO {

    private $sql;
    public function inserir($grupo)
    {
        $this->sql = "INSERT INTO grupos (Estudos_idEstudo,nome) "
        ."VALUES (:Estudos_idEstudo, :nome)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":Estudos_idEstudo", $grupo->Estudos_idEstudo);
            $executar->bindValue(":nome", $grupo->nome);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
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
            return $executar->fetchAll(PDO::FETCH_ASSOC);
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