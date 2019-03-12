<?php
if(isset($_GET['id'])){
    $pdo = new PDO("mysql:host=localhost;dbname=INTEGRACAO","root","123456");
    $sql ="SELECT foto, tipo FROM fotos WHERE id=:id;";
    $comando = $pdo->prepare($sql);
    $comando->bindValue(":id", $_GET["id"]);
    $comando->execute();
    $fotos = $comando->fetchAll(PDO::FETCH_ASSOC);
    header("Content-type: {$fotos[0]['tipo']}");
    echo $fotos[0]['foto'];
}
?>