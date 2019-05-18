<?php
require_once("lib/Controle/Conexao.class.php");
require_once("lib/Modelo/LetrasModelo.class.php");
final class LetrasControle{
    public function atualizarLetras($letra){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql = "UPDATE letras SET titulo=:ti, texto=:te WHERE id=:id;";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindParam("id", $letra->getId());
        $comando->bindParam("ti", $letra->getTitulo());
        $comando->bindParam("te", $letra->getTexto());
        if($comando->execute()){
            $conexao->__destruct();
            return true;
        }else{
            $conexao->__destruct();
            return false;
        }
    }
    public function selecionarId($id){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $comando = $conexao->getConexao()->prepare("SELECT * FROM letras WHERE id=:id");
        $comando->bindParam("id", $id);
        $comando->execute();
        $consulta = $comando->fetch();
        $letras = new LetrasModelo();
        $letras->setId($consulta->id);
        $letras->setTitulo($consulta->titulo);
        $letras->setTexto($consulta->texto);
        $conexao->__destruct();
        return $letras;
    }
}
?>