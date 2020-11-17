<?php  require_once("controleAcesso.php");
if ($_SESSION['usuario']['TipoDeUsuario_idTipoUsuario'] != 1){
    header('Location: index.php'); 
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="template/style.css">
    <!-- jmask validação front end no JS -->
    <title>Teste de Hardware</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        #div1 {
        width: 200px;
        height: 200px;
        padding: 10px;
        border: 1px solid #aaaaaa;
        }
    </style>
    <script>
        function allowDrop(ev) {
        ev.preventDefault();
        }

        function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
        }
    </script>
</head>

<body>
    <div id="root">
        <div class="app">
            <?php require_once("template/header.php"); ?>
            <?php require_once("template/menu.php"); ?>
            <main class="content p-3">
                <div class="p-3 mt-3">
                    <p class="h5 p-3">
                        Relatório de Avaliação
                    </p>
                    <div class="card card-body">
                        <embed src="reports/report.pdf" type="application/pdf" width="100%" height="1200px" />
                    </div>
                </div>
            </main>
            <?php require_once("template/footer.php"); ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $('.alert').alert()
    </script>
</body>

</html>