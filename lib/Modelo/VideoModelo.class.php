<?php
class VideoModelo{
    private $id;
    private $video;
    private $tipo;

    //GETs
    public function getId(){
        return $this->id;
    }
    public function getVideo(){
        return $this->video;
    }
    public function getTipo(){
        return $this->tipo;
    }
    //SETs
    public function setId($id){
        $this->id = ($id != NULL) ? $id : NULL;
    }
    public function setVideo($v){
        $this->video = ($v != NULL) ? $v : NULL;
    }
    public function setTipo($t){
        $this->tipo = ($t != NULL) ? $t : NULL;
    }
}
?>