<?php
session_start();
if(!isset($_SESSION["pwd"])){
require_once("lib/Controle/FilmesControle.class.php");
echo "
<head>
<meta charset='utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
<link rel='stylesheet' type='text/css' href='Semantic-UI-CSS-master/semantic.min.css'>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='Semantic-UI-CSS-master/semantic.min.js'></script>
<script type='text/javascript' src='Plugins/scrollreveal/dist/scrollreveal.min.js'></script>
<script type='text/javascript' src='js/app.js'></script>
<link rel='stylesheet' href='Plugins/slick/slick/slick.css'>
<link rel='stylesheet' href='Plugins/slick/slick/slick-theme.css'>
<link rel='stylesheet' href='css/main.css'>
</head>
<style>
  .ui.card{
    margin: 10px 10px 10px 30px;
  }
  .ui.card > .image > img {
    width: 290px;
    height: 146px;
  }
</style>";
echo"
<body>
<div id='menuG' class='ui stackable menu'>
  <div class='item'>
    <img src='imagens/theNet.png'>
  </div>
    <a href='index.php' class='item'><i class='home icon'></i>Home</a>
    <a href='TopFive.php' class='item'><i class='star icon'></i>TopFive</a>
  <div id='pes' class='item right'>
  <form class='ui form' action='' method='POST'>
    <div class='item right'>
      <div class='field'>
        <select name='genero' class='ui search dropdown'>
          <option value='F - ' selected>Selecione...</option>
          <option value='F - '>Todos</option>
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
      <button id='pess' class='ui button' type='submit'>Vá</button>
    </div>
  </form>
  </div>
</div>

<div class='ui left demo vertical inverted sidebar labeled icon menu'>
  <a href='index.php' class='item'>
    <i class='home icon'></i>
    Home
  </a>
  <a href='TopFive.php' class='item'>
    <i class='star icon'></i>
    TopFive
  </a>
</div>
<button id='menuP' onclick='abrirMenu();' class='ui white button'><i class='bars icon'></i></button>
<script>
function abrirMenu(){
    $('.ui.labeled.icon.sidebar').sidebar('toggle');   
};
</script>";
require_once("lib/Controle/Conexao.class.php");
$conexao = new Conexao("lib/Controle/mysql.ini");
echo "<div class='ui grid'>";
$nome = isset($_POST['genero']) ? $_POST['genero'] : null;
    $comando = $conexao->getConexao()->prepare("SELECT * FROM fotos WHERE genero like '%$nome%' ");
    $comando->bindValue(':letra', '%'.$nome.'%', PDO::PARAM_STR);
    $comando->execute();
    $resultados = $comando->rowCount();
    if($resultados>=1){
        while($reg = $comando->fetch(PDO::FETCH_OBJ)){
          echo"
          <div class='ui link cards'>
            <div class='card'>
              <div class='image'>
                <img src='retornarFoto.php?id={$reg->id}'>
              </div>
              <div class='content'>
                <div class='header'>{$reg->nomeF}</div>
                <div class='meta'>
                  <a>{$reg->genero}</a></BR>
                  <a>Classificação: {$reg->classificacao}</a>
                </div>
                <div class='description'>
                  {$reg->sinopse}
                </div>
              </div>
            </div>
          </div>";
        }
    }else{
	    echo "Não existe usuario cadastrado";
   }
echo"</div>";
echo"</div>";
echo"<div id='footer' class='ui vertical footer segment'>
        <div class='ui center aligned container'>
          <div class='ui stackable grid'>
            <div id='RS' class='nine wide column'>
              <h4 class='ui header'>Redes Sociais</h4>
              <div class='ui link list'>
                <button class='ui circular facebook icon button'>
                    <i class='facebook icon'></i>
                </button>
                <button class='ui circular instagram icon button'>
                    <i class='instagram icon'></i>
                </button>
                <button class='ui circular google plus icon button'>
                    <i class='google plus icon'></i>
                </button>
              </div>
            </div>
            <div id='FSR' class='seven wide right floated column'>
              <h4 class='ui header'>Área destinada ao Admin</h4>
              <p>Somente o administrador com login e senha válidos pode ter acesso a essa área.</p>
              <button onclick='Abrir();' class='negative ui button'>
                <i class='icon settings'></i>
                    Somente Admin
                <div class='ui mini modal'>
                    <div class='ui icon header'>
                        <i class='user icon'></i>
                            Suas informações Admin
                    </div>
                <div class='content'>
                    <form name='meuForm' action='adminP.php' method='POST'>
                    <div class='ui form'>
                    <div class='field'>
                      <label>Username</label>
                      <div class='ui left icon input'>
                        <input type='text' placeholder='Username' name='admin' id='admin'>
                        <i class='user icon'></i>
                      </div>
                    </div>
                    <div class='field'>
                      <label>Password</label>
                      <div class='ui left icon input'>
                        <input type='password' name='pwd' id='pwd'>
                        <i class='lock icon'></i>
                      </div>
                    </div>
                    <div id='env' class='ui blue submit button'>Login</div>
                    <script>
                    let vet = document.getElementById('env');
                    vet.onclick = function(){
                        var nome_admin = document.getElementById('admin').value;
                    if(nome_admin.length < 5 || nome_admin.length > 64 ){
                      return false;
                    }
                    var nome_pwd = document.getElementById('pwd').value;
                    if(nome_pwd.length < 5 || nome_pwd.length > 64){
                      return false;
                    }
                        document.forms['meuForm'].submit();
                    };
                </script>
                  </div>
                    </form>
                </div>
                <div class='actions'>
                    <div class='ui red ok inverted button'>
                        <i class='close icon'></i>
                            Voltar
                    </div>
                </div>
            </div>
              </button>
            </div>
          </div>
      </div>
      <script>
      function Abrir(){
        $('.ui.mini.modal').modal('show');
        };
      </script>
</body>
";
      }else{
        header("Location: AdminConf.php");
      }
?>