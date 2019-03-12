<?php
class Filmes{
    private $id;
    private $foto;
    private $tipo;
    private $genero;
    private $nomeF;
    private $sinopse;
    private $classificacao;

    //GETs
    public function getId(){
        return $this->id;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function getNomeF(){
        return $this->nfilme;
    }
    public function getSinopse(){
        return $this->sinopse;
    }
    public function getClassificacao(){
        return $this->classificacao;
    }
    //SETs
    public function setId($id){
        $this->id = ($id != NULL) ? $id : NULL;
    }
    public function setFoto($f){
        $this->foto = ($f != NULL) ? $f : NULL;
    }
    public function setTipo($t){
        $this->tipo = ($t != NULL) ? $t : NULL;
    }
    public function setGenero($g){
        $this->genero = ($g != NULL) ? $g : NULL;
    }
    public function setNomeF($f){
        $this->nfilme = ($f != NULL) ? $f : NULL;
    }
    public function setSinopse($s){
        $this->sinopse = ($s != NULL) ? $s : NULL;
    }
    public function setClassificacao($c){
        $this->classificacao = ($c != NULL) ? $c : NULL;
    }
}
?>