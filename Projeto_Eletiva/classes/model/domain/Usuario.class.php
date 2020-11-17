<?php 
class Usuario {
    private $InstituicoesEnsino_idInstituicaoEnsino;
    private $nome;
    private $pais;
    private $email;
    private $idTipoUsuario;
    private $hashSenha;
    private $telefone;
    private $tipoDoc;
    private $numeroDoc;

    public function __set($atrib , $value){  
        return $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?> 