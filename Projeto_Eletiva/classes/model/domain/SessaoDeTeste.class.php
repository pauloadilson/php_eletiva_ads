<?php 
class SessaoDeTeste {
    private $idSessaoTeste;
    private $anoEscolar;
    private $data;
    private $idadeParticipante;
    private $numeroSessao;
    private $Usuarios_idUsuario;
    private $Participantes_idParticipante;
    private $Grupos_idGrupo;
    private $Estudos_idEstudo;
    //private $idSessaoAnterior;
    
    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>