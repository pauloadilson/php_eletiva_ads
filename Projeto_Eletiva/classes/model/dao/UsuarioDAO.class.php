<?php
class UsuarioDAO {

    private $sql;

    public function inserir($usuario)
    {
        $this->sql = "INSERT INTO usuarios (InstituicoesEnsino_idInstituicaoEnsino, nome, pais, email, idTipoUsuario, senhaAcesso, telefone, tipoDoc, numeroDoc) "
        ."VALUES (:InstituicoesEnsino_idInstituicaoEnsino, :nome, :pais, :email, :idTipoUsuario, :senhaAcesso, :telefone, :tipoDoc, :numeroDoc)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $usuario->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $usuario->nome);
            $executar->bindValue(":pais", $usuario->pais);
            $executar->bindValue(":email", $usuario->email);
            $executar->bindValue(":idTipoUsuario", $usuario->idTipoUsuario);
            $executar->bindValue(":senhaAcesso", $usuario->senhaAcesso);
            $executar->bindValue(":telefone", $usuario->telefone);
            $executar->bindValue(":tipoDoc", $usuario->tipoDoc);
            $executar->bindValue(":numeroDoc", $usuario->numeroDoc);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }

    }
    public function consultar() {
        $this->sql = "SELECT * FROM usuarios";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }

    }
    public function consultarId($idUsuario){
        $this->sql = "SELECT * from usuarios where idUsuario = :idUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idUsuario", $idUsuario);
            $executar->execute();
            return $executar->fetch();
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function alterar($usuario){
        $this->sql = "UPDATE usuarios set InstituicoesEnsino_idInstituicaoEnsino = :InstituicoesEnsino_idInstituicaoEnsino, nome = :nome, pais = :pais, email = :email, idUsuario = :idUsuario, senhaAcesso = :senhaAcesso, telefone = :telefone, tipoDoc = :tipoDoc, numeroDoc = :numeroDoc  where idUsuario = :idUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $usuario->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $usuario->nome);
            $executar->bindValue(":pais", $usuario->pais);
            $executar->bindValue(":email", $usuario->email);
            $executar->bindValue(":idTipoUsuario", $usuario->idTipoUsuario);
            $executar->bindValue(":senhaAcesso", $usuario->senhaAcesso);
            $executar->bindValue(":telefone", $usuario->telefone);
            $executar->bindValue(":tipoDoc", $usuario->tipoDoc);
            $executar->bindValue(":numeroDoc", $usuario->numeroDoc);
            $executar->bindValue(":idUsuario", $usuario->idUsuario);
            return $executar->execute();
        } catch (Exception $e) {
            return 0;
        }     
     }
    public function excluir($usuario){
        $this->sql = "DELETE from usuarios where idUsuario = :idUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idUsuario", $usuario->idUsuario);
            return $executar->execute(); 
        } catch (Exception $e) {
            return 0;
        }     
     }
}