<?php
class TipoDeUsuarioDAO {

    private $sql;

    public function consultar() {
        $this->sql = "SELECT * FROM tipodeusuario";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }

    }
    public function consultarId($idTipoUsuario){
        $this->sql = "SELECT * from tipodeusuario where id = :id";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":id", $idTipoUsuario);
            $executar->execute();
            return $executar->fetch();
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function consultarTipoPeloId($idTipoUsuario){
        $this->sql = "SELECT tipo from tipodeusuario where id = :id";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":id", $idTipoUsuario);
            $executar->execute();
            return $executar->fetch()['tipo'];
        } catch (Exception $e) {
            return 0;
        }     
     }



}