<?php

    namespace POO;

    class Laser extends Impressora {          
        private $capacidade_toner, $frente_verso;
        
        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }        
    }

?>