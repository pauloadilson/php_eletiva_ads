<?php 
class Participante {
    private $idParticipante;
    private $Responsaveis_idResponsaveis;
    private $InstituicoesEnsino_idInstituicaoEnsino;
    private $nome;
    private $dataNascimento;
    private $pais;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>