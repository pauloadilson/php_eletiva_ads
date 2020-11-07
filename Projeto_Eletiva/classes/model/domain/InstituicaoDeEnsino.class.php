<?php 
class InstituicaoDeEnsino {
    private $idInstituicaoEnsino;
    private $nome;
    private $cidade;
    private $pais;
    private $TipoDeUsuario_idTipoUsuario;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>