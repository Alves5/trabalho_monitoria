<?php
require_once("lib/Controle/Conexao.class.php");
final class adminControle{
    function validarAdmin($u, $p){
        $conexao = new Conexao("lib/Controle/mysql.ini");
        $sql = "SELECT id FROM admin WHERE nome = :usu AND senha = :se";
        $comando = $conexao->getConexao()->prepare($sql);
        $comando->bindParam(':usu', $u);
        $comando->bindParam(':se', $p);
        $comando->execute();
        $users = $comando->fetchAll(PDO::FETCH_ASSOC);
        if (count($users) <= 0){
            echo "Email ou senha incorretos";
            exit;
        }
        // pega o primeiro usuário
        $user = $users[0];
        return $user;
    }
}
?>