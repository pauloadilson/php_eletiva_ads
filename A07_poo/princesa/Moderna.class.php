<?php 
    namespace Lista4;

    class Classica extends Princesa {
        private $cor_principal_vestidos; 
        private $cor_cabelo;
        private $ano_de_nascimento;
        private $possui_principe_encantado;

        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }

        abstract public function chorar(){}
    }

?>