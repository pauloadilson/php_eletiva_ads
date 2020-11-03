<?php
class UsuarioDAO {

    private $sql;

    public function inserir($usuario)
    {
        $this->sql = "INSERT INTO usuario (InstituicoesEnsino_idInstituicaoEnsino, nome, pais, email, tipoUsuario, senhaAcesso, telefone, tipoDoc, numeroDoc) "
        ."VALUES (:InstituicoesEnsino_idInstituicaoEnsino, :nome, :pais, :email, :tipoUsuario, :senhaAcesso, :telefone, :tipoDoc, :numeroDoc)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $usuario->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $usuario->nome);
            $executar->bindValue(":pais", $usuario->pais);
            $executar->bindValue(":email", $usuario->email);
            $executar->bindValue(":senhaAcesso", $usuario->senhaAcesso);
            $executar->bindValue(":telefone", $usuario->telefone);
            $executar->bindValue(":tipoDoc", $usuario->tipoDoc);
            $executar->bindValue(":numeroDoc", $usuario->numeroDoc);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
}