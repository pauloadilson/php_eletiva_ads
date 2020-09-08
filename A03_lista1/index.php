<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Lista de Exercícios 1</title>
    <style>
        .alt {
            height: calc(1.5em + .75rem + 2px);
        }
    </style>
</head>

<body>
    <div class="container p-4">
        <h1>Exercícios - Lista 1</h1>
        <div class=" p-4">
            <h4>Exercício 1</h4>
            <form class="form" id="form1" action="resultado_ex01.php" method="post">
                <div class="form-group row">
                    <label for="vpago" class="col-sm-4 col-form-label">Informe o valor pago:</label>
                    <div class="input-group col-sm-8 ">
                        <div class="input-group-prepend ">
                            <span class="input-group-text alt">R$</span>
                        </div>
                        <input type="number" class="form-control" id="vpago" name="vpago" step='0.01' value='0.00' placeholder='0.00'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pproduto" class="col-sm-4 col-form-label">Informe o preço do produto:</label>
                    <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                            <span class="input-group-text alt">R$</span>
                        </div>
                        <input type="number" class="form-control" id="pproduto" name="pproduto" step='0.01' value='0.00' placeholder='0.00'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" name="Ex01" value="Calcular o troco">
                    </div>
                </div>
            </form>
        </div>
        <div class=" p-4">
            <h4>Exercício 2</h4>
            <form action="resultado_ex02.php" method="post">
                <div class="form-group row">
                    <label for="pkg" class="col-sm-4 col-form-label">Informe o preço do quilo:</label>
                    <div class="input-group col-sm-8 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text alt">R$</span>
                        </div>
                        <input type="number" class="form-control" id="pkg" name="pkg" step='0.01' value='0.00' placeholder='0.00'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qtdekg" class="col-sm-4 col-form-label">Informe a quantidade de quilos consumida:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="qtdekg" name="qtdekg" step='0.1' value='0.0' placeholder='0.0'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="bt_ex02">Calcular o total a ser pago</button>
                    </div>
                </div>
            </form>
        </div>
        <div class=" p-4">
            <h4>Exercício 3</h4>
            <form action="resultado_ex03.php" method="post">
                <div class="form-group row">
                    <label for="valor" class="col-sm-4 col-form-label">Informe um valor:</label>
                    <div class="col-sm-8 ">
                        <input type="number" class="form-control" id="valor" name="valor">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary">Comparar valor com 10</input>
                    </div>
                </div>
            </form>
        </div>
        <div class=" p-4">
            <h4>Exercício 4</h4>
            <form action="resultado_ex04.php" method="post">
                <div class="form-group row">
                    <label for="valor2" class="col-sm-4 col-form-label">Informe um valor:</label>
                    <div class="col-sm-8 ">
                        <input type="number" class="form-control" id="valor2" name="valor2">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Exibir se é positivo ou negativo</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="p-4">
            <h4>Exercício 5</h4>
            <form action="resultado_ex05.php" method="post">
                <div class="form-group row">
                    <label for="notas" class="col-sm-12 col-form-label">Informe as notas:</label>
                    <?php
                    for ($i=1; $i<=4; $i++){
                    ?>
                    <div class="input-group col-sm-12 mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text alt">Nota <?= $i ?></span>
                        </div>
                        <input type="number" class="form-control" id="nota<?= $i ?>" name="nota<?= $i ?>" step='0.1' value='0.0' placeholder='0.0'>
                    </div>
                    <?php
                    }   
                    ?>
                 
<!--                <div class="input-group col-sm-12 mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text alt">Nota 2</span>
                        </div>
                        <input type="number" class="form-control" id="nota1" name="nota2" step='0.1' value='0.0' placeholder='0.0'>
                    </div>
                    <div class="input-group col-sm-12 mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text alt">Nota 3</span>
                        </div>
                        <input type="number" class="form-control" id="nota1" name="nota3" step='0.1' value='0.0' placeholder='0.0'>
                    </div>
                    <div class="input-group col-sm-12 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text alt">Nota 4</span>
                        </div>
                        <input type="number" class="form-control" id="nota1" name="nota4" step='0.1' value='0.0' placeholder='0.0'>
                    </div> -->
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Calcule a média e verifique o estado do aluno</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>