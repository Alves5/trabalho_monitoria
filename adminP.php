<?php
$admin = $_POST['admin'];
$pwd = $_POST['pwd'];
require_once("lib/Controle/adminControle.class.php");
$cAdmin = new adminControle();
if($cAdmin->validarAdmin($admin, $pwd)){
    session_start();
    $_SESSION['pwd'] = $pwd;
    header("Location: AdminConf.php");
}else{
    header("Location: home.php");
}
?>