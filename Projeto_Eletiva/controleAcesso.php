<?php
session_start();
if (!(isset($_SESSION['acesso']))){
    header('Location: login.php?acesso=negado');
}
?>