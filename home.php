<?php
session_start();
if(!isset($_SESSION["pwd"])){
echo "
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='Semantic-UI-CSS-master/semantic.min.css'>
    <link rel='icon' href='imagens/favicon.ico' />
    <link rel='stylesheet' href='css/main.css'>
    <script type='text/javascript' src='Plugins/scrollreveal/dist/scrollreveal.min.js'></script>";

    echo "<body>
    <div id='menuG' class='ui stackable menu'>
  <div class='item'>
    <img src='imagens/theNet.png'>
  </div>
  <a href='Filmes.php' class='item'><i class='film icon'></i>Filmes</a>
  <a href='TopFive.php' class='item'><i class='star icon'></i>Top Five</a>
</div>

<div class='ui left demo vertical inverted sidebar labeled icon menu'>
  <a href='Filmes.php' class='item'>
    <i class='film icon'></i>
    Filmes
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
</script>

        <div id='bemV' class='ui center aligned container'>
            <img class='ui centered image' src='imagens/theNet.png' />
        </div>
        <div id='img1' class='ui centered grid'>
            <div class='ui centered large images anim'>
                <h1>Sempre buscando o melhor</h1>
                    <img class='ui image' src='retornarFoto.php?id=1'>
                    <img class='ui image' src='retornarFoto.php?id=2'>
            </div>
            <div class='ui container anim'>
                <p>Se você deseja que tudo corra bem quando for a procura de um filme, está no lugar certo.
                Aqui temos as melhores dicas de flmes, e melhor, toda família pode acessar sem medo.
                Venha explore mais e se maravilhe e se divirta bastante procurando o melhor filme para você.</p>
              </div>
        </div>
        <div id='second' class='ui centered grid'>
            <div class='ui centered big images anim'>
                <img class='ui big image' src='retornarFoto.php?id=5'>
            </div>";
            require_once("lib/Controle/FilmesControle.class.php");
            $sesi = new FilmesControle();
            $item = $sesi->selecionarId(5);
            echo"<div class='eight wide column'>
                <div class='ui piled segment anim'>
                    <h4 class='ui header'>{$item->getNomeF()}</h4>
                    <p>{$item->getSinopse()}</p>
                </div>
            </div>
        </div>

        <div id='footer' class='ui vertical footer segment'>
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

	    //ScrollReveal
		window.sr = ScrollReveal({
            reset: true,
            delay: 300
		});
		sr.reveal('.anim');
      </script>
</body>
<script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='Semantic-UI-CSS-master/semantic.min.js'></script>
    
<script type='text/javascript' src='js/app.js'></script>";
    }else{
        header("Location: AdminConf.php");
    }
?>