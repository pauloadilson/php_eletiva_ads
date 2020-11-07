<?php
class InstituicaoDeEnsinoDAO {

    private $sql;

    public function inserir($instituicao)
    {
        $this->sql = "INSERT INTO instituicoesensino (nome,cidade,pais,idTipoUsuario) "
        ."VALUES (:nome, :cidade, :pais, :idTipoUsuario)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":nome", $instituicao->nome);
            $executar->bindValue(":cidade", $instituicao->cidade);
            $executar->bindValue(":pais", $instituicao->pais);
            $executar->bindValue(":idTipoUsuario", $instituicao->idTipoUsuario);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar() {
        $this->sql = "SELECT * FROM instituicoesensino";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }

    }
    public function consultarId($idInstituicaoEnsino){
        $this->sql = "SELECT * from instituicoesensino where idInstituicaoEnsino = :idInstituicaoEnsino";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idInstituicaoEnsino", $idInstituicaoEnsino);
            $executar->execute();
            return $executar->fetch();
        } catch (Exception $e) {
            return 0;
        }     
     }
    
    public function consultarNomePeloId($idInstituicaoEnsino){
        $this->sql = "SELECT nome from instituicoesensino where idInstituicaoEnsino = :idInstituicaoEnsino";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idInstituicaoEnsino", $idInstituicaoEnsino);
            $executar->execute();
            return $executar->fetch()['nome'];
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function alterar($instituicao){
        $this->sql = "UPDATE instituicoesensino set nome = :nome, cidade = :cidade, pais = :pais, idTipoUsuario = :idTipoUsuario  where idInstituicaoEnsino = :idInstituicaoEnsino";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":nome", $instituicao->nome);
            $executar->bindValue(":cidade", $instituicao->cidade);
            $executar->bindValue(":pais", $instituicao->pais);
            $executar->bindValue(":idTipoUsuario", $instituicao->idTipoUsuario);
            $executar->bindValue(":idInstituicaoEnsino", $instituicao->idInstituicaoEnsino);
            return $executar->execute();
        } catch (Exception $e) {
            return 0;
        }     
     }

     public function excluir($instituicao){
        $this->sql = "DELETE from instituicoesensino where idInstituicaoEnsino = :idInstituicaoEnsino";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idInstituicaoEnsino", $instituicao->idInstituicaoEnsino);
            return $executar->execute(); 
        } catch (Exception $e) {
            return 0;
        }     
     }

}