<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2 - Preço Total</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5">Olá! </h1>
    <p class="lead mt-3">
    <?php
    if(isset($_POST['bt_ex02'])) { /* validação se existe a botao (precisa do nome) */
      $pkg = $_POST["pkg"];
      $qtdekg = $_POST["qtdekg"];
      $total = $pkg *  $qtdekg;
      $format_total = number_format($total, 2, ',', '.');
      echo "O preço total a ser pago é R$ $format_total.";
    }
    ?>
    </p>
  </div>
</div>
</body>
</html>