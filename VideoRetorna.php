<?php
if(isset($_GET['id'])){
    $pdo = new PDO("mysql:host=localhost;dbname=INTEGRACAO","root","123");
    $sql ="SELECT video, tipo FROM videos WHERE id=:id;";
    $comando = $pdo->prepare($sql);
    $comando->bindValue(":id", $_GET["id"]);
    $comando->execute();
    $videos = $comando->fetchAll(PDO::FETCH_ASSOC);
    header("Content-type: {$videos[0]['tipo']}");
    echo $videos[0]['video'];
}
?>