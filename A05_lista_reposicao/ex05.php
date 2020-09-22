
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Exercício 5 - Lista Reposição</title>
    <style>
    </style>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 5 - Lista Reposição</h1>
        <div class=" p-4">
            <h6>Resolução da equação de 2º Grau utilizando a fórmula de Bhaskara</h6>
            <form class="form" id="form1" method="post">
            <?php
                $array = ["a", "b", "c"];
                for ($i=0; $i<count($array); $i++){ ?>
                <div class="form-group row">
                    <label for="<?= $array[$i] ?>Value" class="col-sm-8 col-form-label">Informe o valor de <?= $array[$i] ?>:</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="<?= $array[$i] ?>Value" required name="<?= $array[$i] ?>Value" placeholder='0' value="0" >
                    </div>
                </div>
            <?php } ?>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" name="bt_ex01" value='Comparar e exibir'>
                    </div>
                </div>
            </form>
             
                <?php 
                function Bhaskara($a, $b, $c) {
                    if ($a == 0) {
                        return 0;
                    }
                    $delta = ($b**2 - 4*$a*$c);
                    $dois_a = 2*$a;
                    
                    if ($delta > 0){
                        $raiz_de_delta = sqrt($delta);
                        $mais  = (-$b + $raiz_de_delta) / $dois_a;
                        $menos = (-$b - $raiz_de_delta) / $dois_a;
                        return array('x1' => $mais, 'x2' => $menos);
                    } elseif ($delta = 0) {
                        $root  = (-$b / $dois_a);
                        return array('x' => $root);
                    } else {
                        return -1;
                    }
                }

                if ($_POST) {
                    echo "<div class='p-4 m-5 bg-dark text-white text-center'>";
                    $a = $_POST["aValue"];
                    $b = $_POST["bValue"];
                    $c = $_POST["cValue"];
                    $roots = Bhaskara($a, $b, $c);
                    if ($roots == 0)
                        echo "Como o valor de a informado é igual a 0, esta não é uma equação do segundo grau!";
                    else if ($roots == -1)
                        echo "A equação não possui raízes reais.";
                    else {
                        if (count($roots) == 1){
                            $x = $roots['x'];
                            echo "A equação possui apenas uma raiz real igual a $x.";
                        } else {
                            $x1 = $roots['x1'];
                            $x2 = $roots['x2'];
                            echo "A equação possui duas raizes reais igual a $x1 e $x2.";
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