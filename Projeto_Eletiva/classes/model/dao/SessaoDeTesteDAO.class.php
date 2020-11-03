<?php
class SessaoDeTesteDAO {

    private $sql;

    public function inserir($sessao)
    {
        $this->sql = "INSERT INTO sessaoteste (anoEscolar,idade_participante, numeroSessao, Usuarios_idUsuario,Participantes_idParticipantes,idSessaoAnterior) "
        ."VALUES (:anoEscolar,:idade_participante, :numeroSessao, :Usuarios_idUsuario,:Participantes_idParticipantes,:idSessaoAnterior)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":anoEscolar", $sessao->anoEscolar);
            $executar->bindValue(":idade_participante", $sessao->idade_participante);
            $executar->bindValue(":numeroSessao", $sessao->numeroSessao);
            $executar->bindValue(":Usuarios_idUsuario", $sessao->Usuarios_idUsuario);
            $executar->bindValue(":Participantes_idParticipantes", $sessao->Participantes_idParticipantes);
            $executar->bindValue(":idSessaoAnterior", $sessao->idSessaoAnterior);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
}