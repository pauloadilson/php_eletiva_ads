<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado POST</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Olá, <?php
    if (isset($_POST["name2"])) {
      echo $_POST["name2"]; 
    }  elseif (isset($_GET["name3"])) {
      echo $_GET["name3"];
    }
    ?>!</h1>
    <p class="lead">Seja muito bem vindo(a)!!!</p>
  </div>
</div>
</body>
</html>