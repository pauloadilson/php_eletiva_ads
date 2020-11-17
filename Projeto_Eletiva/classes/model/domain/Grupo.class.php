<?php 
class Grupo {
    private $Estudos_idEstudo;
    private $idGrupo;
    private $nome;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
    function __construct($nome)
    {
        $this->nome = $nome;
    }
}
?>