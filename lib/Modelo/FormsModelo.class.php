<?php
class FormsModelo{
    private $id;
    private $form;
    private $tipo;

    //GETs
    public function getId(){
        return $this->id;
    }
    public function getForm(){
        return $this->form;
    }
    public function getTipo(){
        return $this->tipo;
    }
    //SETs
    public function setId($id){
        $this->id = ($id != NULL) ? $id : NULL;
    }
    public function setForm($f){
        $this->form = ($f != NULL) ? $f : NULL;
    }
    public function setTipo($it){
        $this->tipo = ($t != NULL) ? $t : NULL;
    }
}
?>