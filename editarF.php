<?php

echo"<meta charset='utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
<link rel='stylesheet' type='text/css' href='Semantic-UI-CSS-master/semantic.min.css'>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='Semantic-UI-CSS-master/semantic.min.js'></script>
<script type='text/javasxript' src='Plugins/sweetAlert/sweetalert2.min.js'></script>
<script type='text/javascript' src='js/app.js'></script>
<link rel='stylesheet' href='Plugins/sweetAlert/sweetalert2.min.css'>
<link rel='stylesheet' href='css/main.css'>";

require_once("lib/Controle/FilmesControle.class.php");
$comando = new FilmesControle();
$item = $comando->selecionarId($_GET['id']);
 echo"
 <div class='ui justified aligned container'>
 <h2 name='meuForm2' id='editarF' class='ui dividing header'>Editar filme</h2>
    <form class='ui form' action='editarFilme.php' method='POST' enctype='multipart/form-data'>
      <div class='field'>
        <label>#</label>
        <input type='text' value='{$item->getId()}' name='id'>
      </div>
      <div class='field'>
        <label>Adicione um foto do filme</label>
        <input type='file' value='{$item->getId()}' name='foto'>
      </div>
      <div class='field'>
        <label>Diga o nome do filme</label>
        <input type='text' value='{$item->getNomeF()}' name='nome_filme'>
      </div>
      <div class='field'>
        <label>Adicione uma sinopse do filme</label>
        <input type='text' value='{$item->getSinopse()}' name='sinopse'>
      </div>
      <div class='field'>
        <label>Classificação</label>
        <input type='number' value='{$item->getClassificacao()}' name='classificacao' min='14' max='18'>
      </div>
      <div class='field'>
        <label>Gênero do filme</label>
        <select value='{$item->getGenero()}' name='genero' class='ui fluid dropdown'>
          <option selected>Selecione...</option>
          <option value='ação'>ação</option>
          <option value='comédia'>comédia</option>
          <option value='terror'>terror</option>
          <option value='romance'>romance</option>
          <option value='ficção'>ficção</option>
          <option value='animação'>animação</option>
          <option value='documentário'>documentário</option>
          <option value='fantasia'>fantasia</option>
          <option value='erótico'>erótico</option>
          <option value='guerra'>guerra</option>
          <option value='comédia romântica'>comédia romântica</option>
          <option value='comédia dramática'>comédia dramática</option>
        </select>
      </div>
      <button onclick='editarF();' class='ui button' type='button'>Adicionar</button>
      </form>
</div>";
?>