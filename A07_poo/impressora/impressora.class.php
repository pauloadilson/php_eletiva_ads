<?php 
    namespace POO;

    class Impressora {
        private $marca, $peso, $modelo, $colorida;

        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }
    }

?>

