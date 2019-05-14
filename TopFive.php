<?php
session_start();
if(!isset($_SESSION["pwd"])){
echo"
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
<link rel='stylesheet' type='text/css' href='Semantic-UI-CSS-master/semantic.min.css'>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='Semantic-UI-CSS-master/semantic.min.js'></script>
<script src='Plugins/onepage/jquery.onepage-scroll.js'></script>
<script type='text/javascript' src='js/app.js'></script>
<link href='Plugins/onepage/onepage-scroll.css' rel='stylesheet' type='text/css'>
<link rel='stylesheet' href='css/main.css'>
</head>";
echo"
<body>
<div class='main'>
    <section id='one'>
        <div id='menuG' class='ui stackable menu'>
            <div class='item'>
            <img src='imagens/theNet.png'>
            </div>
            <a href='index.php' class='item'><i class='home icon'></i>Home</a>
            <a href='Filmes.php' class='item'><i class='film icon'></i>Filmes</a>
            <a onclick='Abrir();' class='item'><i class='user icon'></i>Somente Admin</a>
        </div>
        <div class='ui left demo vertical inverted sidebar labeled icon menu'>
            <a href='index.php' class='item'>
                <i class='home icon'></i>
                Home
            </a>
            <a href='Filmes.php' class='item'>
                <i class='film icon'></i>
                Filmes
            </a>
            <a onclick='Abrir();' class='item'>
                <i class='user icon'></i>
                Somente Admin
            </a>
        </div>
        <button id='menuP' onclick='abrirMenu();' class='ui white button'><i class='bars icon'></i></button>
        <script>
            function abrirMenu(){
                $('.ui.labeled.icon.sidebar').sidebar('toggle');   
            };
        </script>
        <h1 class='ui header'>First header</h1>
        <div id='second' class='ui left grid'>
            <div class='ui big images anim'>
                <video controls src='VideoRetorna.php?id=1' width='550' height='320'></video>
            </div>
        </div>
    </section>
    <section id='two'>
        <h1 class='ui header'>First header</h1>
        <video controls src='VideoRetorna.php?id=2' width='550' height='320'></video>
    </section>
    <section id='three'>
        <h1 class='ui header'>First header</h1>
        <video controls src='VideoRetorna.php?id=3' width='550' height='320'></video>
    </section>
    <section id='four'>
        <h1 class='ui header'>First header</h1>
        <video controls src='VideoRetorna.php?id=4' width='550' height='320'></video>
    </section>
    <section id='five'>
        <h1 class='ui header'>First header</h1>
        <video controls src='VideoRetorna.php?id=5' width='550' height='320'></video>
    </section>
</div>

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
<script type='text/javascript'>
$('.main').onepage_scroll();

function Abrir(){
    $('.ui.mini.modal').modal('show');
    };
</script>
</body>
</html>
";
}else{
    header("Location: AdminConf.php");
}
?>