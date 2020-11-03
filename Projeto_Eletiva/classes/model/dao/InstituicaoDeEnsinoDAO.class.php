<?php
class InstituicaoDeEnsinoDAO {

    private $sql;

    public function inserir($instituicao)
    {
        $this->sql = "INSERT INTO instituicoesensino (nome,cidade,pais) "
        ."VALUES (:nome, :cidade, :pais)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":nome", $instituicao->nome);
            $executar->bindValue(":cidade", $instituicao->cidade);
            $executar->bindValue(":pais", $instituicao->pais);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
}