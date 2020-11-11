<?php
class SessaoDeTesteDAO {

    private $sql;

    public function inserir($sessao)
    {
        $this->sql = "INSERT INTO sessaodeteste (anoEscolar,data,idadeParticipante, numeroSessao, Usuarios_idUsuario,Participantes_idParticipante,Estudos_idEstudo) "
        ."VALUES (:anoEscolar,:data,:idadeParticipante, :numeroSessao, :Usuarios_idUsuario,:Participantes_idParticipante,:Estudos_idEstudo)";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql); // substituir parametros pelos valores a serm incluidos no BD
            $executar->bindValue(":anoEscolar", $sessao->anoEscolar);
            $executar->bindValue(":data", $sessao->data);
            $executar->bindValue(":idadeParticipante", $sessao->idadeParticipante);
            $executar->bindValue(":numeroSessao", $sessao->numeroSessao);
            $executar->bindValue(":Usuarios_idUsuario", $sessao->Usuarios_idUsuario);
            $executar->bindValue(":Participantes_idParticipante", $sessao->Participantes_idParticipante);
            $executar->bindValue(":Estudos_idEstudo", $sessao->Estudos_idEstudo);
            //$executar->bindValue(":idSessaoAnterior", $sessao->idSessaoAnterior);
            return $executar->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar() {
        $this->sql = "SELECT * FROM sessaodeteste";
        try {
            $conexao = new Conexao();
            $resultado = $conexao->getCon();
            return $resultado->query($this->sql);
        } catch (Exception $e) {
            echo "Conexão não estabelecida";
            return 0;
        }

    }
    public function consultarId($idSessaoTeste){
        $this->sql = "SELECT * from sessaodeteste where idSessaoTeste = :idSessaoTeste";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idSessaoTeste", $idSessaoTeste);
            $executar->execute();
            return $executar->fetch();
        } catch (Exception $e) {
            return 0;
        }     
     }
    public function excluir($sessao){
        $this->sql = "DELETE from sessaodeteste where idSessaoTeste = :idSessaoTeste";
        try {
            $conexao = new Conexao();
            $executar = $conexao->getCon()->prepare($this->sql);
            $executar->bindValue(":idSessaoTeste", $sessao->idSessaoTeste);
            return $executar->execute(); 
        } catch (Exception $e) {
            return 0;
        }     
     }

}