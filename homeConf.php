<?php
$id = $_POST['id'];                                                             
$Ti1 = $_POST['Ti1'];
$Te1 = $_POST['Te1'];
function home($ti,$te){
    $formaValid = true;
    $tamanhoTitulo = strlen($ti);
    if($tamanhoTitulo < 5 || $tamanhoTitulo > 40){
        $formaValid = false;
    }
    $tamanhoTexto = strlen($te);
    if($tamanhoTexto < 100 || $tamanhoTexto > 250){
        $formaValid = false;
    }
return $formaValid;
}
if(home($Ti1,$Te1)){
    require_once("lib/Controle/LetrasControle.class.php");
    $letras = new LetrasControle();
    $modelo = new LetrasModelo();
    $modelo->setId($id);
    $modelo->setTitulo($Ti1);
    $modelo->setTexto($Te1);
    if($letras->adicionarLetras($modelo)){
        header("Location: AdminConf.php");
    }
}else{
    echo"Informações não enviadas";
}
?>