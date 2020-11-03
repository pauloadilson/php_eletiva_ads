<?php 

    class Livro extends Item_Colecionavel {
        private $nome_editora; 
        private $ano_publicacao;

        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }
        public function iterarAtributos() {
            echo "Atributos do Livro:</br>";
            foreach ($this as $key => $value) {
                print "$key => $value</br>";
            }
        }
    }

?>