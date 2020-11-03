<?php 
class SessaoDeTeste {
    private $anoEscolar;
    private $idade_participante;
    private $numeroSessao;
    private $Usuarios_idUsuario;
    private $Participantes_idParticipantes;
    private $idSessaoAnterior;
    
    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>