<?php
    $imagem = $_FILES['foto']['tmp_name'];
    $imagemT = $_FILES['foto']['type'];
    $nomeF = $_POST['nome_filme'];
    $sinopse = $_POST['sinopse'];
    $classificacao = $_POST['classificacao'];
    $genero = $_POST['genero'];

    if(!preg_match('/^image\/(jpg|jpeg|png)$/', $imagemT)){
        header("Location: AdminConf.php");
        exit;
    }

    require_once("lib/Controle/FilmesControle.class.php");

    //Adicionando foto, tipo, gênero, sinopse, classificação e nome dos filmes
    $executar = new FilmesControle();
    $filme = new Filmes();
    $filme->setFoto($imagem);
    $filme->setTipo($imagemT);
    $filme->setSinopse($sinopse);
    $filme->setClassificacao($classificacao);
    $filme->setNomeF($nomeF);
    $filme->setGenero($genero);

    if($executar->inserirFoto($filme)){
        header("Location: AdminConf.php");
    }else{
        header("Location: inserir.php");
    }

?>