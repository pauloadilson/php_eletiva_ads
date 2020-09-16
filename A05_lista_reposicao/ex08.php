


<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Exercício 8 - Lista Reposição</title>
    <style>
    </style>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 8 - Lista Reposição</h1>
        <div class=" p-4">
            <form method="POST" >
                <div class="form-group row">
                    <label for="numInt1" class="col-sm-8 col-form-label">Informe um a quantidade de combustível:</label>
                        <div class="input-group col-sm-6 ">
                        <input type="number" class="form-control" id="numInt1" name="numInt1" placeholder='0.0' value="0" step='0.1' value='0.0' placeholder='0.0' >
                        <div class="input-group-append ">
                            <span class="input-group-text alt">litros</span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="exampleFormControlSelect1">Selecione o tipo de combustível:</label>
                    <select class="form-control" id="combustivel" name="combustivel">
                        <option value='Gasolina'>Gasolina</option>
                        <option value="Etanol">Etanol</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" name="bt_ex01" value='Calcule o custo do combustível'>
                    </div>
                </div>
            </form>
            <?php
                function calculaTotal($litros, $desconto, $preco) {
                    return $litros * ( (1 - $desconto) * $preco);
                }

                function calculaDesconto($combustivel, $litros) {
                    if ($combustivel == "Etanol" && $litros <= 20)
                        return 0.03;
                    elseif ($combustivel == "Etanol" && $litros > 20)
                        return 0.05;
                    elseif ($combustivel == "Gasolina" && $litros <= 20)
                        return 0.04;
                    elseif ($combustivel == "Gasolina" && $litros > 20)
                        return 0.06;
                    else
                        return 0;
                }
                function determinarPreco($combustivel) {
                    if ($combustivel == "Etanol")
                        return 1.9;
                    elseif ($combustivel == "Gasolina")
                        return 2.5;
                }

                if ($_POST) {
                    echo "<div class='p-4 m-5 bg-dark text-white text-center'>";
                    $litros = $_POST["numInt1"];
                    $combustivel = $_POST["combustivel"];
                    $desconto = calculaDesconto($combustivel, $litros);
                    $preco = determinarPreco($combustivel);
                    #echo "litros:$litros, desconto:$desconto, preco:$preco, combustivel:$combustivel";
                    $total = calculaTotal($litros, $desconto, $preco);
                    $totalFormated = number_format($total, 2, ",", "." );
                    echo "O valor devido na aquição de $litros litros de $combustivel é R$ $totalFormated.";
                    echo "</div>";
                }
                
                ?>
            </div>
        </div>
        <div><a href="index.php" class="badge badge-primary text-wrap"> voltar.</a></div>
    </div>

    <!-- 
        <select name="valor">
        <option value="1">Valor 1</option>
        </select>

 -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>