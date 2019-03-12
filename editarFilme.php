<?php
$id = $_POST['id'];
$imagem = $_FILES['foto']['tmp_name'];
$imagemT = $_FILES['foto']['type'];
$nomeF = $_POST['nome_filme'];
$sinopse = $_POST['sinopse'];
$classificacao = $_POST['classificacao'];
$genero = $_POST['genero'];
require_once("lib/Controle/FilmesControle.class.php");

//Adicionando foto, tipo e gênero dos filmes
$executar = new FilmesControle();
$filme = new Filmes();
$filme->setId($id);
$filme->setFoto($imagem);
$filme->setTipo($imagemT);
$filme->setGenero($genero);
$filme->setNomeF($nomeF);
$filme->setSinopse($sinopse);
$filme->setClassificacao($classificacao);

if($executar->trocarFoto($filme)){
    header("Location: AdminConf.php");
}else{
    header("Location: inserir.php");
}
?>