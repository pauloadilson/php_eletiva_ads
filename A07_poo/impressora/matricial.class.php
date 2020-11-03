<?php 

    namespace POO;

    class Matricial extends Impressora {          
        private $num_agulhas, $imprime_vias;
        
        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }
    } 

?>