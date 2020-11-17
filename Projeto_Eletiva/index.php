<?php require_once("controleAcesso.php"); ?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="template/style.css">
    <!-- jmask validação front end no JS -->
    <title>NumLine - Avaliação Neuropsicológica da Linha Numérica Mental</title>
    <style>
    </style>
</head>

<body>
    <div id="root">
        <div class="app">
        <?php require_once("template/header.php"); ?>
        <?php require_once("template/menu.php"); ?>
        <main class="content" >
            <div class="container-fluid ">
                <div class="p-3 mt-3">
                    <div class='display-4'>Bem Vindo(a) <u><?= $_SESSION['usuario']['nome']?></u> !</div>
                    <hr />
                    <div class="card card-body text-center">
                    <h3 class="mb-0">Este é um site desenvolvido como atividade avaliativa para a disciplina eletiva de Linguagem de Programação IV - INTERNET<br>
                </h3></div>
                </div>
            </div>
        </main>
        <?php require_once("template/footer.php"); ?>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>