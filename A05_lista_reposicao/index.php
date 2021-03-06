<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Eletiva LP 4 - PHP - Lista de Exercícios - Reposição</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Eletiva: LP 4 - PHP</h1>
            <p class="lead">Aulas e exercícios práticos da disciplina de ADS da FATEC de Presidente Prudente-SP.</p>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">Lista de Exercício - Reposição</a>
            <?php
                $descricao = array('Soma de Três','Converte 24h para 12','Fatorial','Folha de Pagamento','Equação de segundo grau','Ano Bissexto','Data válida', 'Posto de Combustível');
                for ($i=1; $i<=8; $i++){
                ?>
                <a href="ex0<?= $i ?>.php" class="list-group-item list-group-item-action">Exercício 0<?= $i ?> - <?= $descricao[$i-1] ?></a>
            <?php
                }   
            ?>
         </div>
        <div><a href="../index.html" class="badge badge-primary text-wrap"> voltar.</a></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>