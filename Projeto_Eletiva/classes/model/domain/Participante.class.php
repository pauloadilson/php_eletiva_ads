<?php 
class Participante {
    private $idParticipantes;
    private $Responsaveis_idResponsaveis;
    private $InstituicoesEnsino_idInstituicaoEnsino;
    private $nome;
    private $dataNascimento;
    private $pais;
    private $grupo;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>