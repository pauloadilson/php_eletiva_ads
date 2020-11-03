<?php 
session_start();
    if ($_POST) {
        $nome_usuario = $_POST['user_name'];
        $senha = $_POST['password'];

        $adm_nome_usuario = "jose";
        $adm_senha = "1234";

        if (($nome_usuario == $adm_nome_usuario) && ($senha == $adm_senha)){
            $_SESSION['ativo'] = true;
            echo "Acesso permitido!";
        } else {
            echo "Acesso negado!";
            $_SESSION['ativo'] = false;
        }

    }
?>