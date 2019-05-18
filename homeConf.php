<?php
$id = $_POST['text_id'];                                                             
$Ti1 = $_POST['Ti1'];
$Te1 = $_POST['Te1'];

    require_once("lib/Controle/LetrasControle.class.php");
    $letras = new LetrasControle();
    $modelo = new LetrasModelo();
    $modelo->setId($id);
    $modelo->setTitulo($Ti1);
    $modelo->setTexto($Te1);
    if($letras->atualizarLetras($modelo)){
        header("Location: AdminConf.php");
    }else{
        echo "Deu errado";
    }

?>