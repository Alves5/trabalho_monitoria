<?php
require_once("lib/Controle/Conexao.class.php");
require_once("lib/Modelo/Filmes.class.php");
require_once("lib/Modelo/FormsModelo.class.php");
final class FilmesControle{

    public function selecionarId($id){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $comando = $conexao->getConexao()->prepare("SELECT * FROM fotos WHERE id=:id");
        $comando->bindParam("id", $id);
        $comando->execute();
        $consulta = $comando->fetch();
        $filmes = new Filmes();
        $filmes->setId($consulta->id);
        $filmes->setFoto($consulta->foto);
        $filmes->setTipo($consulta->tipo);
        $filmes->setSinopse($consulta->sinopse);
        $filmes->setClassificacao($consulta->classificacao);
        $filmes->setNomeF($consulta->nomeF);
        $filmes->setGenero($consulta->genero);
        $conexao->__destruct();
        return $filmes;
    }
    public function consultaTodos(){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $comando = $conexao->getConexao()->prepare("SELECT * FROM fotos;");
        $comando->execute();
        $resultado = $comando->fetchAll();
        $lista = [];
        foreach($resultado as $item){
            $filme = new Filmes();
            $filme->setId($item->id);
            $filme->setFoto($item->foto);
            $filme->setTipo($item->tipo);
            $filme->setSinopse($item->sinopse);
            $filme->setClassificacao($item->classificacao);
            $filme->setNomeF($item->nomeF);
            $filme->setGenero($item->genero);
            array_push($lista, $filme);
        }
        $conexao->__destruct();
        return $lista;
    }
    public function inserirFoto($foto){
        $imagemTipo = explode("/",$foto->getTipo());
        $imagemTipo = $imagemTipo[1];
        $imagemBin = file_get_contents($foto->getFoto());
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql = "INSERT INTO fotos(foto, tipo, sinopse, classificacao, nomeF, genero) VALUES(:fo,:ti,:si,:cla,:nf,:ge)";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindParam("fo", $imagemBin);
        $comando->bindParam("ti", $imagemTipo);
        $comando->bindParam("si", $foto->getSinopse());
        $comando->bindParam("cla", $foto->getClassificacao());
        $comando->bindParam("nf", $foto->getNomeF());
        $comando->bindParam("ge", $foto->getGenero());
        if($comando->execute()){
            $conexao->__destruct();
            return true;
        }else{
            $conexao->__destruct();
            return false;
        }
    }
    public function trocarFoto($foto){
        $imagemTipo = explode("/",$foto->getTipo());
        $imagemTipo = $imagemTipo[1];
        $imagemBin = file_get_contents($foto->getFoto());
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql ="UPDATE fotos SET foto=:fo, tipo=:ti, sinopse=:si, classificacao=:cla, nomeF=:nf, genero=:ge WHERE id=:id;";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindParam("id", $foto->getId());
        $comando->bindParam("fo", $imagemBin);
        $comando->bindParam("ti", $imagemTipo);
        $comando->bindParam("si", $foto->getSinopse());
        $comando->bindParam("cla", $foto->getClassificacao());
        $comando->bindParam("nf", $foto->getNomeF());
        $comando->bindParam("ge", $foto->getGenero());
        if($comando->execute()){
            $conexao->__destruct();
            return true;
        }else{
            $conexao->__destruct();
            return false;
        }
    }
    public function deletarFilme($id){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql="DELETE FROM fotos WHERE id=:id";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindParam("id", $id);
        if($comando->execute()){
            $conexao->__destruct();
            return true;
        }else{
            $conexao->__destruct();
            return false;
        }
    }
    public function inserirForm($form,$tipo){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql="INSERT INTO Forms(form, tipo) VALUES(:fo, :ti)";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindValue("fo", $form);
        $comando->bindValue("ti", $tipo);
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