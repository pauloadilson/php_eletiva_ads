<?php 

    abstract class Item_Colecionavel {
        protected $id_item; 
        protected $nome;
        protected $data_aquisicao;
        protected $lista_autores;

        public function __set($atrib , $value){  
            return $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }

        abstract protected function iterarAtributos();
    }

?>