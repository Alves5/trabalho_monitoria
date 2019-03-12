<?php
require_once("Conexao.class.php");
require_once("lib/Modelo/VideoModelo.class.php");
final class VideoControle{
    public function selecionarId($id){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $comando = $conexao->getConexao()->prepare("SELECT * FROM videos WHERE id=:id");
        $comando->bindParam("id", $id);
        $comando->execute();
        $consulta = $comando->fetch();
        $filmes = new VideoModelo();
        $filmes->setId($consulta->id);
        $filmes->setVideo($consulta->video);
        $filmes->setTipo($consulta->tipo);
        $conexao->__destruct();
        return $filmes;
    }

    public function inserirVideo($video){
        $videoTipo = explode("/",$video->getTipo());
        $videoTipo = $videoTipo[1];
        $videoBin = file_get_contents($video->getVideo());
        require_once("lib/Controle/Conexao.class.php");
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql = "INSERT INTO videos(video, tipo) VALUES(:vi,:ti)";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindParam(":vi", $videoBin);
        $comando->bindParam(":ti", $videoTipo);
        if($comando->execute()){
            $conexao->__destruct();
            return true;
        }else{
            $conexao->__destruct();
            return false;
        }
    }

    public function trocarVideo($video){
        $videoTipo = explode("/",$video->getTipo());
        $videoTipo = $videoTipo[1];
        $videoBin = file_get_contents($video->getVideo());
        require_once("lib/Controle/Conexao.class.php");
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql ="UPDATE videos SET video=:vi, tipo=:ti WHERE id=:id;";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindParam("id", $video->getId());
        $comando->bindParam("fo", $videoBin);
        $comando->bindParam("ti", $videoTipo);
        if($comando->execute()){
            $conexao->__destruct();
            return true;
        }else{
            $conexao->__destruct();
            return false;
        }
    }
}
?>