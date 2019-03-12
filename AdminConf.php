<?php
session_start();
if(isset($_SESSION["pwd"])){
echo "
<meta charset='utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
<link rel='stylesheet' type='text/css' href='Semantic-UI-CSS-master/semantic.min.css'>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='Semantic-UI-CSS-master/semantic.min.js'></script>
<script type='text/javascript' src='js/app.js'></script>
<link rel='stylesheet' href='css/main.css'>";
echo "
<body>

<div class='ui grid'>
  <div id='attrPadrao' class='thirteen wide column'>
        <div id='ti'>
          <h1 class='ui header'>Configurações da Home</h1>
          <h2 id='TT' class='ui dividing header'>Título e texto</h2>
          <form class='ui form' action='homeConf.php' method='POST'>
              <div class='field'>
                <label>Título</label>
                <input type='text' name='Ti1' placeholder=''>
              </div>
            <div class='field'>
              <label>Texto</label>
              <input type='text' name='Te1' placeholder=''>
            </div>
            <button class='ui button' type='submit'>Alterar informações</button>
          </form>
        </div>

        <div id='im'>
          <h1 class='ui dividing header'>Configurações dos Filmes</h1>
          <h2 id='adicionarF' class='ui dividing header'>Adicionar filme</h2>
          <form class='ui form' action='fotos.php' method='POST' enctype='multipart/form-data'>
            <div class='field'>
              <label>Adicione um foto do filme</label>
              <input type='file' name='foto'>
            </div>
            <div class='field'>
              <label>Diga o nome do filme</label>
              <input type='text' name='nome_filme'>
            </div>
            <div class='field'>
              <label>Adicione uma sinopse do filme</label>
              <input type='text' name='sinopse' />
            </div>
            <div class='field'>
              <label>Classificação</label>
              <input type='number' name='classificacao' min='14' max='18'>
            </div>
            <div class='field'>
              <label>Gênero do filme</label>
              <select name='genero' class='ui fluid dropdown'>
              <option selected>Selecione...</option>
              <option value='F - ' selected>Todos</option>
              <option value='F - ação'>ação</option>
              <option value='F - comédia'>comédia</option>
              <option value='F - terror'>terror</option>
              <option value='F - romance'>romance</option>
              <option value='F - ficção'>ficção</option>
              <option value='F - animação'>animação</option>
              <option value='F - documentário'>documentário</option>
              <option value='F - fantasia'>fantasia</option>
              <option value='F - erótico'>erótico</option>
              <option value='F - guerra'>guerra</option>
              <option value='F - comédia romântica'>comédia romântica</option>
              <option value='F - comédia dramatica'>comédia dramática</option>
              </select>
            </div>
            <button class='ui button' type='submit' >Adicionar</button>
          </form>";
    
          require_once("lib/Controle/FilmesControle.class.php");
          $comando = new FilmesControle();
      echo"<h2 id='removerF' class='ui dividing header'>Remover filme</h2>
          <table class='ui celled padded table'>
            <thead>
              <tr>
                <th class='single line'>#</th>
                <th>Filme</th>
                <th>Deletar</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>";
              foreach($comando->consultaTodos() as $item){
          echo"<tr>
                <td>
                  <h2 class='ui header'>{$item->getId()}</h2>
                </td>
                <td class='single line'>
                  {$item->getNomeF()}
                </td>
                <td>
                  <a href='deletarF.php?id={$item->getId()}'><i class='trash icon'></i></a>
                </td>
                <td>
                  <a id='edi' href='editarF.php?id={$item->getId()}'><i class='edit icon'></i></a>
                </td>
              </tr>";
  }
        echo"</tbody>
            <tfoot>
              <tr>
                <th colspan='5'>
                  <div class='ui right floated pagination menu'>
                    <a class='icon item'>
                    <i class='left chevron icon'></i>
                    <a class='item'>1</a>
                    <a class='item'>2</a>
                    <a class='item'>3</a>
                    <a class='item'>4</a>
                    <a class='icon item'>
                    <i class='right chevron icon'></i>
                  </div>
                </th>
              </tr>
            </tfoot>
          </table>
        </div>";
    echo"
      
        <div id='te'>
          <h2 id='adicionarF' class='ui dividing header'>Alterar um TOP</h2>
          <form class='ui form' action='editarVideo.php' method='POST' enctype='multipart/form-data'>
            <div class='field'>
              <label>Gênero do filme</label>
              <select name='genero' class='ui fluid dropdown'>
                <option value='ação'>ação</option>
                <option value='comédia'>comédia</option>
                <option value='terror'>terror</option>
                <option value='romance'>romance</option>
                <option value='ficção'>ficção</option>
              </select>
            </div>
            <div class='field'>
              <label>Troque o título do filme</label>
              <input type='text' name='nomeF'>
            </div>
            <div class='field'>
              <label>Troque o video</label>
              <input type='file' name='video'>
            </div>
            <div class='field'>
              <label>Troque a imagem de fundo</label>
              <input type='file' name='foto'>
            </div>
            <button class='ui button' type='submit'>Alterar Top</button>
          </form>
        </div>
    </div>
  <div class='three wide column'>
    <div class='ui right fixed vertical menu'>
      <div class='item'>
        <img class='ui mini image' src='imagens/theNet.png'>
      </div>
      <div id='clic' class='ui vertical menu'>
        <div id='home' class='item'>
          <div class='header'>Home</div>
          <div class='menu'>
            <a href='#TT' class='item'>Título & Texto</a>
          </div>
        </div>
        <div id='filmes' class='item'>  
          <div class='header'>Filmes</div>
          <div class='menu'>
            <a href='#adicionarF' class='item'>Adicionar filme</a>
            <a href='#removerF' class='item'>Deletar um filme</a> 
          </div>
        </div>
        <div id='top' class='item'>    
          <div class='header'>Top Five</div>
          <div class='menu'>
            <a class='item'>Atualizar um top</a>
          </div>
        </div>
        <div class='item'>
          <div class='header'></div>
          <div class='menu'>
            <a class='item'>Informar Modificações</a>
            <a href='Logout.php' class='item'>Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body";
}else{
  header("Location: home.php");
}
?>