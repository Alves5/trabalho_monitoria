<?php
 try {
    $db = new PDO('mysql:host=localhost;dbname=INTEGRACAO', 'root', '123456');
 } catch (PDOException  $e) {
    print $e->getMessage();
 }
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>pesquisa simples com PDO</title>
</head>

<body>

<h2>Pesquisa simples com PDO
</h2>
<p>

<form name="form1" method="post" action="">
  <label>
  <input name="cxnome" type="text" id="cxnome" value="" size="30">
  </label>
  <label></label>
  
  <label>
  &nbsp;&nbsp;
  <input type="submit" name="pesquisar" value="Pesquisar">
  </label>
</form>

<?php
$nome=$_POST["cxnome"];
$pesquisa=$_POST['pesquisar'];
  if(isset($pesquisa)&&!empty($nome)){
    $stmt = $db->prepare("SELECT * FROM fotos WHERE genero like :letra");
    $stmt->bindValue(':letra', '%'.$nome.'%', PDO::PARAM_STR);
    $stmt->execute();
    $resultados = $stmt->rowCount();
    if($resultados>=1){
        echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
        while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
        echo $reg->nomeF;
    }

    }else{
	    echo "Não existe usuario cadastrado";
   }

}else{
	echo "Preencha o campo de pesquisa";
	}
 ?>
 </body>
</html>