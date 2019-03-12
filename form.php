<?php
$arq = $_FILES['form']['tmp_name'];
$tipo = $_FILES['form']['type'];
$fp = fopen($arq, "r");
$dados = fread($fp, filesize($arq));
fclose($fp);
require_once("lib/Controle/FilmesControle.class.php");
$comando = new FilmesControle();
if($comando->inserirForm($dados,$tipo)){
    echo'Deu certo';
}else{
    echo'Deu errado';
}
?>