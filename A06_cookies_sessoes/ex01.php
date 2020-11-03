<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Exercício 1 - Lista 3</title>
    <style>
    </style>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 1 - Lista 3</h1>
        <div class=" p-4">
            <form class="form" id="form1" method="post" action="ex01registraVoltas.php"> <!--  -->
                <div class="form-group row">
                    <label for="numVoltas" class="col-sm-8 col-form-label">Informe a quantidade de voltas que deseja registrar:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="numVoltas" name="numVoltas" placeholder='0' value="0" min="1">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="bt_enviar" value="Enviar">Enviar</button>
            </form>
        </div>
        <div><a href="index.php" class="badge badge-primary text-wrap"> voltar.</a></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>