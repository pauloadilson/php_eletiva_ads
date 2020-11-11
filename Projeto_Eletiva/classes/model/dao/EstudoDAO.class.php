<?php
class EstudoDAO {

    private $sql;

    public function inserir($estudo)
    {
        $this->sql = "INSERT INTO estudos (titulo,descricao,Usuarios_idPesquisadorPrincipal) "
        ."VALUES (:titulo, :descricao, :Usuarios_idPesquisadorPrincipal)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":titulo", $estudo->titulo);
            $executar->bindValue(":descricao", $estudo->descricao);
            $executar->bindValue(":Usuarios_idPesquisadorPrincipal", $estudo->Usuarios_idPesquisadorPrincipal);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
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
     public function alterar($estudo){
        $this->sql = "UPDATE estudos set titulo = :titulo, descricao = :descricao, Usuarios_idPesquisadorPrincipal = :Usuarios_idPesquisadorPrincipal  where idEstudo = :idEstudo";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":titulo", $estudo->titulo);
            $executar->bindValue(":descricao", $estudo->descricao);
            $executar->bindValue(":Usuarios_idPesquisadorPrincipal", $estudo->Usuarios_idPesquisadorPrincipal);
            $executar->bindValue(":idEstudo", $estudo->idEstudo);
            return $executar->execute();
        } catch (Exception $e) {
            return false;
        }     
     }
     public function excluir($estudo){
        $this->sql = "DELETE from estudos where idEstudo = :idEstudo";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idEstudo", $estudo->idEstudo);
            return $executar->execute(); 
        } catch (Exception $e) {
            return 0;
        }     
     }


}