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
        $this->sql = "SELECT * from tipodeusuario where idTipoUsuario = :idTipoUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idTipoUsuario", $idTipoUsuario);
            $executar->execute();
            return $executar->fetch();
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function consultarTipoPeloId($idTipoUsuario){
        $this->sql = "SELECT tipoUsuario from tipodeusuario where idTipoUsuario = :idTipoUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idTipoUsuario", $idTipoUsuario);
            $executar->execute();
            return $executar->fetch()['tipoUsuario'];
        } catch (Exception $e) {
            return 0;
        }     
     }



}