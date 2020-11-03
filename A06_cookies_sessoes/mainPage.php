<?php
    session_start();

    if (isset($_SESSION['ativo'])){
        if ($_SESSION['ativo'] == true)
            echo "Bem vindo Admninistrador";
        else echo "Acesso Negado!";
    }
    session_destroy();

?>