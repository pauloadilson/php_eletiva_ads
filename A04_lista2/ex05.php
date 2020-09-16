
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Exercício 5 - Lista 2</title>
    <style>
    </style>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 5 - Lista 2</h1>
        <div class=" p-4">
            <form class="form" id="form1" method="post">
                <div class="form-group row">
                    <label for="intNum1" class="col-sm-6 col-form-label">Informe a altura:</label>
                    <div class="input-group col-sm-6 ">
                        <input type="number" class="form-control" id="intNum1" name="intNum1" step='0.01' value='0.01' placeholder='0.01' min="0.01">
                        <div class="input-group-append ">
                            <span class="input-group-text alt">m.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="intNum2" class="col-sm-6 col-form-label">Informe o peso:</label>
                    <div class="input-group col-sm-6 ">
                        <input type="number" class="form-control" id="intNum2" name="intNum2" step='0.1' value='0.1' placeholder='0.1' min="0.1">
                        <div class="input-group-append ">
                            <span class="input-group-text alt">kg.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" name="bt_ex01" value='Comparar e exibir'>
                    </div>
                </div>
            </form>
             
                <?php 
                function getBMI($height, $weight) 
                {
                   return $weight / ($height * $height);
                }

                function BMIClassification($BMI) 
                {
                   if ($BMI < 18.5) echo "Você está abaixo do peso";
                   elseif ($BMI < 25)  echo"Você está no peso ideal. Parabéns!!";
                   elseif ($BMI < 30)  echo"Você está levemente acima do peso.";
                   elseif ($BMI < 35)  echo"Você apresenta obesidade de grau I.";
                   elseif ($BMI < 40)  echo"Você apresenta obesidade de grau II (severa).";
                   else echo"Você apresenta obesidade de grau II (severa).";
                }

                if ($_POST) {
                    //var_dump($_POST);
                    echo "<div class='p-4 m-5 bg-dark text-white text-center'>";
                    $n1 = $_POST["intNum1"];
                    $n2 = $_POST["intNum2"];
                    $BMI = number_format(getBMI($n1, $n2),1,",","");
                    echo "O seu IMC é $BMI. <br>";
                    BMIClassification($BMI);
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