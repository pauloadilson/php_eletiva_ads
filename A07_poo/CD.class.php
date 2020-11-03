<?php 

    class CD extends Item_Colecionavel {
        private $genero_musical; 
        private $id_faixa_audio;

        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }
        public function iterarAtributos() {
            echo "Atributos do CD:</br>";
            foreach ($this as $key => $value) {
                print "$key => $value</br>";
            }
        }
    }

?>