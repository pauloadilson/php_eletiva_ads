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

        if (isset($_POST['qtdeCheques'])) {
                $_SESSION['somaLote'] = $_POST['somaLote'];
                $_SESSION['qtdeCheques'] = $_POST['qtdeCheques'];
        }
     ?>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 1 - Lista 3 - Registro de voltas</h1>
        <div class=" p-4">
            <form class="form" id="form1" method="post" > <!-- action="registraSessao.php" -->
            <?php for ($i=1; $i<=$_SESSION['qtdeCheques']; $i++){ ?>
                <div class="form-group row">
                    <label for="valorCheque<?= $i ?>" class="col-sm-6 col-form-label">Informe o valor do <?= $i ?>º cheque:</label>
                    <div class="input-group  col-sm-6">
                    <div class="input-group-prepend ">
                            <span class="input-group-text alt">R$</span>
                        </div>
                        <input type="number" class="form-control" id="valorCheque<?= $i ?>" name="valorCheque<?= $i ?>" min="0" step='0.01' value='0.00' placeholder='0.00'>
                        </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            <?php } ?>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value='Registrar valor dos cheques'>
                    </div>
                </div>
            </form>
            <?php 
                
                function imprimirMensagem($somaLote, $somatorioCheques) {
                    $diferenca = number_format(($somaLote - $somatorioCheques), 2, ",", "." ) ;
                    $somaLoteFormat = number_format($somaLote, 2, ",", "." );
                    $somatorioChequesFormat = number_format($somatorioCheques, 2, ",", "." );
                    echo "<div class='p-4 m-5 bg-dark text-white text-center'>";
                    if ($somaLote == $somatorioCheques)
                        echo "Lote OK. <br/>";
                    else 
                        echo "Houve diferença de R$ $diferenca entre o valor total informado para o lote (R$ $somaLoteFormat) e a somatótia dos valores dos cheques (R$ $somatorioChequesFormat).<br/>";
                    echo "</div>";
                }
    
                if (!isset($_POST['somaLote'])) {
                    ///var_dump($_POST);
                    $somatorioCheques = 0;
                    $qtdeCheques = $_SESSION['qtdeCheques'];
                    $somaLote = $_SESSION['somaLote'];
                    for ($i=1; $i<=$qtdeCheques; $i++)
                        $somatorioCheques += $_POST["valorCheque$i"];
                    
                    imprimirMensagem($somaLote,$somatorioCheques);
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


