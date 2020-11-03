<?php
class ResponsaveisDAO {

    private $sql;

    public function inserir($responsaveis)
    {
        $this->sql = "INSERT INTO instituicoesensino (primeiroResponsavel,segundoResponsavel, telefone1, telefone2) "
        ."VALUES (:primeiroResponsavel, :segundoResponsavel, :telefone1, :telefone2)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":primeiroResponsavel", $responsaveis->primeiroResponsavel);
            $executar->bindValue(":segundoResponsavel", $responsaveis->segundoResponsavel);
            $executar->bindValue(":telefone1", $responsaveis->telefone1);
            $executar->bindValue(":telefone2", $responsaveis->telefone2);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
}