
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Exercício 4 - Lista Reposição</title>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 4 - Lista Reposição</h1>
        <div class=" p-4">
            <form class="form" id="form1" method="post">
                <div class="form-group row">
                    <label for="valorHora" class="col-sm-6 col-form-label">Informe o valor da hora de trabalho:</label>
                    <div class="input-group col-sm-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text alt">R$</span>
                        </div>
                        <input type="number" class="form-control" id="valorHora" name="valorHora" step='0.01' value='0.00' placeholder='0.00'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hTrabalhadas" class="col-sm-8 col-form-label">Informe a quantidade de horas trabalhadas no mês:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="hTrabalhadas" name="hTrabalhadas">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" name="bt_ex03" value='Calcule o salário líquido'>
                    </div>
                </div>
            </form>
             
                <?php 
                
                function impostoRendaDiscount($sal) 
                {
                    if ($sal <= 900)
                        return 0;
                    elseif ($sal <= 1500)
                        return $sal * 0.05;
                    elseif ($sal <= 2500)
                        return $sal * 0.1;
                    else
                        return $sal * 0.2;
                }

                if($_POST) {
                    echo "<div class='p-4 bg-dark text-white text-left'>";
                    $hourCost = $_POST["valorHora"]; 
                    $hourCostFormated = number_format($hourCost, 2, ',', '.'); 
                    $hoursWorked = $_POST["hTrabalhadas"];
                    $salary = $hourCost * $hoursWorked;
                    $salaryFormated = number_format($salary, 2, ',', '.');
                    $IRDiscount = impostoRendaDiscount($salary);
                    $IRDiscountFormated = number_format($IRDiscount, 2, ',', '.');
                    $inssDiscount = $salary * 0.1;
                    $inssDiscountFormated = number_format($inssDiscount, 2, ',', '.');
                    $fgts = number_format($salary * 0.11, 2, ',', '.');
                    $totalDiscount = $IRDiscount + $inssDiscount;
                    $totalDiscountFormated = number_format($totalDiscount, 2, ',', '.');
                    $net_salary = $salary - $totalDiscount;
                    $net_salary_formated = number_format($net_salary, 2, ',', '.');
                    echo "Salário Bruto (R$ $hourCostFormated * $hoursWorked): R$ $salaryFormated <br>
                          (-) IR (5%): R$ $IRDiscountFormated <br>
                          (-) INSS (10%): R$ $inssDiscountFormated <br>
                          FGTS (11%): R$ $fgts <br>
                          Total de descontos: R$ $totalDiscountFormated <br>
                          Salário Líquido: R$ $net_salary_formated";
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