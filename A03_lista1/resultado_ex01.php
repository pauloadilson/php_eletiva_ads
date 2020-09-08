<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1 - Troco</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5">Olá!</h1>
    <p class="lead mt-3">
    <?php
    if($_POST) { /* validação de array não vazio */
      $vpago = $_POST["vpago"];
      $pproduto = $_POST["pproduto"];
      $troco = $vpago -  $pproduto;
      $format_troco = number_format($troco, 2, ',', '.');
      if ($vpago > $pproduto) {
        echo "O troco é R$ $format_troco.";
      } elseif ($vpago < $pproduto) {
        echo "O valor pago é insuficiente!";
      } else {
        echo "Não há troco!";
      }
    }
    ?>
    </p>
  </div>
</div>
</body>
</html>