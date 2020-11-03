<?php 
    class Revista extends Item_Colecionavel {
        private $ano_publicacao; 
        private $volume;
        private $editora;
        private $principais_assuntos;

        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }
        public function iterarAtributos() {
            echo "Atributos do item:</br>";
            foreach ($this as $key => $value) {
                print "$key => $value</br>";
            }
        }
    }

?>