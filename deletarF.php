<?php
require_once("lib/Controle/FilmesControle.class.php");
$comando = new FilmesControle();
$comando->deletarFilme($_GET['id']);
header("Location: AdminConf.php");

?>