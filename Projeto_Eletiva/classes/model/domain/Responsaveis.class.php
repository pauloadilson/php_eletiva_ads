<?php 
class Responsaveis {
    private $primeiroResponsavel;
    private $segundoResponsavel;
    private $telefone1;
    private $telefone2;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>