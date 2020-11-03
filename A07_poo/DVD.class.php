<?php 

    class DVD extends Item_Colecionavel {
        private $tipo_conteudo; 
        private $descricao;

        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }
        public function iterarAtributos() {
            echo "Atributos do DVD:</br>";
            foreach ($this as $key => $value) {
                print "$key => $value</br>";
            }
        }
    }

?>