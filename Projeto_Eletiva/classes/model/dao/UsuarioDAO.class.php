<?php
class UsuarioDAO {

    private $sql;

    public function inserir($usuario)
    {
        $this->sql = "INSERT INTO usuarios (InstituicoesEnsino_idInstituicaoEnsino, nome, pais, email, TipoDeUsuario_idTipoUsuario, senhaAcesso, telefone, tipoDoc, numeroDoc) "
        ."VALUES (:InstituicoesEnsino_idInstituicaoEnsino, :nome, :pais, :email, :TipoDeUsuario_idTipoUsuario, :senhaAcesso, :telefone, :tipoDoc, :numeroDoc)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $usuario->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $usuario->nome);
            $executar->bindValue(":pais", $usuario->pais);
            $executar->bindValue(":email", $usuario->email);
            $executar->bindValue(":TipoDeUsuario_idTipoUsuario", $usuario->TipoDeUsuario_idTipoUsuario);
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
     public function consultarNomePeloId($idUsuario){
        $this->sql = "SELECT nome from usuarios where idUsuario = :idUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idUsuario", $idUsuario);
            $executar->execute();
            return $executar->fetch()['nome'];
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function consultarSenhaPeloEmail($email){
        $this->sql = "SELECT senhaAcesso from usuarios where email = :email";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":email", $email);
            $executar->execute();
            return $executar->fetch()['senhaAcesso'];
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function alterarComSenha($usuario){
        $this->sql = "UPDATE usuarios set InstituicoesEnsino_idInstituicaoEnsino = :InstituicoesEnsino_idInstituicaoEnsino, nome = :nome, pais = :pais, email = :email, TipoDeUsuario_idTipoUsuario = :TipoDeUsuario_idTipoUsuario, senhaAcesso = :senhaAcesso, telefone = :telefone, tipoDoc = :tipoDoc, numeroDoc = :numeroDoc  where idUsuario = :idUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $usuario->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $usuario->nome);
            $executar->bindValue(":pais", $usuario->pais);
            $executar->bindValue(":email", $usuario->email);
            $executar->bindValue(":TipoDeUsuario_idTipoUsuario", $usuario->TipoDeUsuario_idTipoUsuario);
            $executar->bindValue(":senhaAcesso", $usuario->senhaAcesso);
            $executar->bindValue(":telefone", $usuario->telefone);
            $executar->bindValue(":tipoDoc", $usuario->tipoDoc);
            $executar->bindValue(":numeroDoc", $usuario->numeroDoc);
            $executar->bindValue(":idUsuario", $usuario->idUsuario);
            return $executar->execute();
        } catch (Exception $e) {
            return false;
        }     
     }
     public function alterarSemSenha($usuario){
        $this->sql = "UPDATE usuarios set InstituicoesEnsino_idInstituicaoEnsino = :InstituicoesEnsino_idInstituicaoEnsino, nome = :nome, pais = :pais, email = :email, TipoDeUsuario_idTipoUsuario = :TipoDeUsuario_idTipoUsuario, telefone = :telefone, tipoDoc = :tipoDoc, numeroDoc = :numeroDoc  where idUsuario = :idUsuario";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $usuario->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $usuario->nome);
            $executar->bindValue(":pais", $usuario->pais);
            $executar->bindValue(":email", $usuario->email);
            $executar->bindValue(":TipoDeUsuario_idTipoUsuario", $usuario->TipoDeUsuario_idTipoUsuario);
            $executar->bindValue(":telefone", $usuario->telefone);
            $executar->bindValue(":tipoDoc", $usuario->tipoDoc);
            $executar->bindValue(":numeroDoc", $usuario->numeroDoc);
            $executar->bindValue(":idUsuario", $usuario->idUsuario);
            return $executar->execute();
        } catch (Exception $e) {
            return false;
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
     public function buscaSenha($usuario){
        $this->sql = "SELECT senhaAcesso FROM usuarios 
                        WHERE email = :email";
        try{
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":email", $usuario->email);
            $executar->execute();
            return $executar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            return 0;
        }

    }
     public function acessar($usuario){
        $this->sql = "SELECT idUsuario,nome,email,TipoDeUsuario_idTipoUsuario FROM usuarios 
                        WHERE email = :email";
        try{
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":email", $usuario->email);
            $executar->execute();
            return $executar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            return 0;
        }

    }
}