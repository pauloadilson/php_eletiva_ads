<?php
class ParticipanteDAO {

    private $sql;

    public function inserir($participante)
    {
        $this->sql = "INSERT INTO participantes (InstituicoesEnsino_idInstituicaoEnsino, nome, dataNascimento, pais, grupo, primeiroResponsavel, segundoResponsavel, telefone, Estudos_idEstudo) "
        ."VALUES (:InstituicoesEnsino_idInstituicaoEnsino, :nome, :dataNascimento, :pais, :grupo, :primeiroResponsavel, :segundoResponsavel, :telefone, :Estudos_idEstudo)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $participante->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $participante->nome);
            $executar->bindValue(":dataNascimento", $participante->dataNascimento);
            $executar->bindValue(":pais", $participante->pais);
            $executar->bindValue(":grupo", $participante->grupo);
            $executar->bindValue(":primeiroResponsavel", $participante->primeiroResponsavel);
            $executar->bindValue(":segundoResponsavel", $participante->segundoResponsavel);
            $executar->bindValue(":telefone", $participante->telefone);
            $executar->bindValue(":Estudos_idEstudo", $participante->Estudos_idEstudo);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
    public function consultar() {
        $this->sql = "SELECT * FROM participantes";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }

    }
    public function consultarId($idParticipante){
        $this->sql = "SELECT * from participantes where idParticipante = :idParticipante";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idParticipante", $idParticipante);
            $executar->execute();
            return $executar->fetch();
        } catch (Exception $e) {
            return 0;
        }     
     }
     public function alterar($participante){
        $this->sql = "UPDATE participantes set InstituicoesEnsino_idInstituicaoEnsino = :InstituicoesEnsino_idInstituicaoEnsino, nome = :nome, dataNascimento = :dataNascimento, pais = :pais, grupo = :grupo, primeiroResponsavel = :primeiroResponsavel, segundoResponsavel = :segundoResponsavel, telefone = :telefone, Estudos_idEstudo = :Estudos_idEstudo  where idParticipante = :idParticipante";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":InstituicoesEnsino_idInstituicaoEnsino", $participante->InstituicoesEnsino_idInstituicaoEnsino);
            $executar->bindValue(":nome", $participante->nome);
            $executar->bindValue(":dataNascimento", $participante->dataNascimento);
            $executar->bindValue(":pais", $participante->pais);
            $executar->bindValue(":grupo", $participante->grupo);
            $executar->bindValue(":primeiroResponsavel", $participante->primeiroResponsavel);
            $executar->bindValue(":segundoResponsavel", $participante->segundoResponsavel);
            $executar->bindValue(":telefone", $participante->telefone);
            $executar->bindValue(":Estudos_idEstudo", $participante->Estudos_idEstudo);
            return $executar->execute();
        } catch (Exception $e) {
            return 0;
        }     
     }
    public function excluir($participante){
        $this->sql = "DELETE from participantes where idParticipante = :idParticipante";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idParticipante", $participante->idParticipante);
            return $executar->execute(); 
        } catch (Exception $e) {
            return 0;
        }     
     }
}