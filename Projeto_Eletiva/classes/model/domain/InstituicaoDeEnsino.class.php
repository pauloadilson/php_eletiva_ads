<?php 
class InstituicaoDeEnsino {
    private $nome;
    private $cidade;
    private $pais;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>