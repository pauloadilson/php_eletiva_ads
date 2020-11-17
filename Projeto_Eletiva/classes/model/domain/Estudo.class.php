<?php 
    require_once("classes/model/domain/Grupo.class.php");
class Estudo {
    private $idEstudo;
    private $titulo;
    private $descricao;
    private $Usuarios_idPesquisadorPrincipal;
    private $grupos;

    function __construct()
    {
        $this->grupos = new ArrayObject();
    }

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }

    function addGroup($groupName){

        $this->grupos->append($groupName);
    }
}
?>