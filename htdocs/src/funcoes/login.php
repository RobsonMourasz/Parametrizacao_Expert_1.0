<?php
    use HTDOCS\funcoes\Conexao;
    require_once __DIR__."/../../vendor/autoload.php";

    $conexao = new Conexao();
    if (!isset($_SESSION)) {
        session_start();
    }

    if(isset($_POST['user']) && isset($_POST['pass'])){
        $usuario = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "SELECT * FROM usuarios WHERE email = '".$usuario."'";
        $usuarios = array($conexao->ExecutarSql($sql));
        if ($usuarios[0][0] === "Não há registros"){
            ?><script>alert("Usuario não encontrado"); window.location.href = '../../index.php';</script><?php
        }else{
            if (count($usuarios[0]) == 1) {
                $hash = $usuarios[0][0]['senha'];
                if (password_verify($password, $hash)) {
                    $_SESSION['idUsuario'] = $usuarios[0][0]['id'];
                    header("Location: ../../public/ADM/index.php");
                } else {
                    ?><script>alert("Senha incorreta!"); window.location.href = '../../index.php';</script><?php
                }
    
            } else {
                ?><script>alert("Usuario não encontrado"); window.location.href = '../../index.php';</script><?php
            }
        }

    }
