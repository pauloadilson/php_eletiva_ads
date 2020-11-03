<?php 
class Produto {
    private $id;
    private $descricao;
    private $id_categoria;

    public function getId() {
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function getIdCategoria(){
        return $this->id_categoria;
    }
    public function setIdCategoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }
}
?>