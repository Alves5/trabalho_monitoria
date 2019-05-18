<?php
class LetrasModelo{
    private $id;
    private $titulo;
    private $texto;

    //GETs
    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getTexto(){
        return $this->texto;
    }
    //SETs
    public function setId($id){
        $this->id = ($id != NULL) ? $id : NULL;
    }
    public function setTitulo($t){
        $this->titulo = ($t != NULL) ? $t : NULL;
    }
    public function setTexto($te){
        $this->texto = ($te != NULL) ? $te : NULL;
    }
}
?>