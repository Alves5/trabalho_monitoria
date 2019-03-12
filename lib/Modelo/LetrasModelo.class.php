<?php
class LetrasModelo{
    private $id;
    private $titulos;
    private $textos;

    //GETs
    public function getId(){
        return $this->id;
    }
    public function getTitulos(){
        return $this->titulos;
    }
    public function getTextos(){
        return $this->textos;
    }
    //SETs
    public function setId($id){
        $this->id = ($id != NULL) ? $id : NULL;
    }
    public function setTiulos($t){
        $this->titulos = ($t != NULL) ? $t : NULL;
    }
    public function setTextos($te){
        $this->textos = ($te != NULL) ? $te : NULL;
    }
}
?>