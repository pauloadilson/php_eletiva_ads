<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5 - Média e Estado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="display-5">Olá! 
  <p class="lead mt-3">
  <?php
  $nota1 = $_POST["nota1"];
  $nota2 = $_POST["nota2"];
  $nota3 = $_POST["nota3"];
  $nota4 = $_POST["nota4"];
  $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
  $format_media = number_format($media, 1, ",", "");
  echo "A média do aluno é $format_media.<br>" ;
  if ($media >= 7) {
    echo "O aluno está Aprovado.";
  } else {
    echo "O aluno foi Reprovado.";
  }
  ?>
  </div>
</div>
</body>
</html>