<?php 
class Estudo {
    private $idEstudo;
    private $titulo;
    private $descricao;
    private $Usuarios_idPesquisadorPrincipal;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>