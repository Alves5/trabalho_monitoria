<?php
if(isset($_GET['id'])){
    $pdo = new PDO("mysql:host=localhost;dbname=INTEGRACAO","root","123456");
    $sql ="SELECT form, tipo FROM Forms WHERE id=:id;";
    $comando = $pdo->prepare($sql);
    $comando->bindValue(":id", $_GET["id"]);
    $comando->execute();
    $forms = $comando->fetchAll(PDO::FETCH_ASSOC);
    header("Content-type: {$forms[0]['tipo']}");
    echo $forms[0]['form'];
}
?>