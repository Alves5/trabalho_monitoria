<?php
require_once("lib/Controle/VideoControle.class.php");
    $executar = new VideoControle();
    $video = new VideoModelo();
    $video->setVideo($_FILES['video']['tmp_name']);
    $video->setTipo($_FILES['video']['type']);
    if($executar->inserirVideo($video)){
        header("Location: VideoView.php");
    }else{
        echo "não deu certo";
    }
?>