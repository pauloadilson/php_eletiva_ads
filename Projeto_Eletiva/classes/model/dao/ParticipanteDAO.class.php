<?php
class ParticipanteDAO {

    private $sql;

    public function inserir($participante)
    {
        $this->sql = "INSERT INTO usuario (Responsaveis_idResponsaveis, InstituicoesEnsino_idInstituicaoEnsino, nome, dataNascimento, pais, grupo, Estudos_idEstudo) "
        ."VALUES (:Responsaveis_idResponsaveis, :InstituicoesEnsino_idInstituicaoEnsino, :nome, :dataNascimento,:pais, :grupo, :Estudos_idEstudo)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":Responsaveis_idResponsaveis", $participante->Responsaveis_idResponsaveis);
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $participante->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $participante->nome);
            $executar->bindValue(":dataNascimento", $participante->dataNascimento);
            $executar->bindValue(":pais", $participante->pais);
            $executar->bindValue(":grupo", $participante->grupo);
            $executar->bindValue(":Estudos_idEstudo", $participante->Estudos_idEstudo);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
}