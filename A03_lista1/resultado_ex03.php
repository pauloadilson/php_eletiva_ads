<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3 - Comparação com 10</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="display-5">Olá! 
    <p class="lead mt-3">
    <?php
    $valor = $_POST["valor"];
    if ($valor > 10) {
      echo "O valor $valor é maior que 10.";
    } elseif ($valor < 10){
      echo "O valor $valor é menor que 10.";
    } else {
      echo "O valor digitado é 10!";
    }
    ?>
    </p>
  </div>
</div>
</body>
</html>