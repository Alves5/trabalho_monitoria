<?php
class TopFive{
    private $titulos;
    private $fotos;

    public function getTitulos(){
        return $this->titulos;
    }
    public function setTitulos($t){
        $this->titulos = $t;
    }
    public function getFotos(){
        return $this->fotos;
    }
    public function setFotos($f){
        $this->fotos = $f;
    }
}
?>