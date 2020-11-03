<?php
class Conexao {

    private $con;

    public function __construct(){
        $this->con = new PDO(
            "mysql:host=localhost; dbname=eletiva_web",
            "root",
            "1986Ab14"
        );
    }

    public function getCon(){
        return $this->con;
    }
}


?>