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
    <?php 
        session_start();

        if (isset($_POST['numVoltas'])) {
            //var_dump($_POST);
            $voltas = $_POST['numVoltas'];
            $_SESSION['voltas'] = $voltas;
        }
     ?>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 1 - Lista 3 - Registro de voltas</h1>
        <div class=" p-4">
            <form class="form" id="form1" method="post" > <!-- action="registraSessao.php" -->
            <?php for ($i=1; $i<=$_SESSION['voltas']; $i++){ ?>
                <div class="form-group row">
                    <label for="tempoVolta<?= $i ?>" class="col-sm-6 col-form-label">Informe o tempo da <?= $i ?>ª volta:</label>
                    <div class="input-group  col-sm-6">
                        <input type="number" class="form-control" id="tempoVolta<?= $i ?>" name="tempoVolta<?= $i ?>" min="1">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1">segundos</span>
                        </div>
                        </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            <?php } ?>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value='Registrar voltas'>
                    </div>
                </div>
            </form>
            <?php 
                function exibirEstatistica($melhorTempo, $voltaMelhorTempo, $somaTotalTempo,$qtdeVoltas) {
                    $tempoMedio = number_format(($somaTotalTempo/$qtdeVoltas),2,",","") ;
                    echo "<div class='p-4 m-5 bg-dark text-white text-center'>";
                    echo "Até agora o melhor tempo foi $melhorTempo segundos. <br/>";
                    echo "Esse tempo foi alcançado na $voltaMelhorTempo º volta.<br/>";
                    echo "O tempo médio das $qtdeVoltas voltas foi $tempoMedio segundos.";
                    echo "</div>";
                }
    
                if (!isset($_POST['numVoltas'])) {
                    $melhorTempo = 0;
                    $voltaMelhorTempo = 0;
                    $somaTotalTempo = 0;
                    ///var_dump($_POST);
                    $qtdeVoltas = $_SESSION['voltas'];
                    for ($i=1; $i<=$qtdeVoltas; $i++) {
                        $tempoVolta = $_POST["tempoVolta$i"];
                        if ($i == 1) {
                            $melhorTempo = $tempoVolta;
                            $voltaMelhorTempo = $i;
                            $somaTotalTempo += $tempoVolta;
                        } else {
                            if ($tempoVolta < $melhorTempo) {
                                $melhorTempo = $tempoVolta;
                                $voltaMelhorTempo = $i;
                            }
                            $somaTotalTempo += $tempoVolta;
                        }
                    } 
                    exibirEstatistica($melhorTempo,$voltaMelhorTempo,$somaTotalTempo,$qtdeVoltas);
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


