<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Exercício 2 - Lista 2</title>
    <style>
        .alt {
            height: calc(1.5em + .75rem + 2px);
        }
    </style>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 2 - Lista 2</h1>
        <div class=" p-4">
            <form class="form" id="form1" method="post">
            <?php
                //$descricao = array('Menor de dois','Soma dos divisores','Verifica se é par ? 1 : 0','Positivo/Negativo/Zero','Calcula IMC','Cadastro e Verifica Senha','Busca na internet');
                for ($i=1; $i<=5; $i++){
                ?>
                <!-- <a href="ex0<?= $i ?>.php" class="list-group-item list-group-item-action">Aula 0<?= $i ?> - <?= $descricao[$i-1] ?></a> -->
                <div class="form-group row">
                    <label for="numInt<?= $i ?>" class="col-sm-8 col-form-label">Informe o <?= $i ?>º número inteiro:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="numInt<?= $i ?>" name="numInt<?= $i ?>" min="1">
                    </div>
                </div>
            <?php
                }   
            ?>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" name="bt_ex01" value='Comparar e exibir'>
                    </div>
                </div>
            </form>
             
                <?php 
                function showAndSumDividers($num1) 
                {
                    $dividers = "";
                    $dividersSum = 0;
                    for ($i = 1; $i < $num1; $i++) {
                        if ($num1 % $i == 0) {
                            $dividers = "$dividers + $i";
                            $dividersSum += $i;
                        }
                    }
                    return substr("$dividers = $dividersSum",2);
                }

                if($_POST) {
                    echo "<div class='p-4 bg-dark text-white text-center'>";
                    
                    for ($i = 1; $i < 5; $i++) {
                        $num = $_POST["numInt$i"];
                        if ($_POST["numInt$i"] != "") {
                            $num = $_POST["numInt$i"];
                            $dividersSum = showAndSumDividers($num);
                            echo"A soma dos divisores de $num: $dividersSum. <br>";
                        }
                    }
                    echo "</div>";
                }
                ?>
            </div>
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