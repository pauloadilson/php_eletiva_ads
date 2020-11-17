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
                    <p class="h5 p-1">
                        Teste de hardware 
                    </p>
                    <div class="card card-body p-1">
                        <div class="row">
                                <div class="form-group col">
                                    <form action="" class="form-inline ">
                                        <label for="audio" class="col-md-2 d-block">Testar audio:</label>
                                        <audio src="http://www.sousound.com/music/healing/healing_01.mp3" controls></audio>
                                    </form>
                                </div>
                        </div>
                        <div class="row">
                                <div class="form-group col mt-3">
                                <form class="form-inline">
                                    <div class="form-group col-md-2">
                                        <label for="escala" class="d-block">Testar barra deslizante:</label>
                                        </div>
                                    <div class="form-group col-md-10">
                                        <input type="range" class="form-control-range w-50" id="escala">
                                    </div>
                                </form>
                                </div>
                        </div>
                        <div class="row">
                                <div class="form-group col mt-3">
                                    <form>
                                        <label class="p-3" for="escala">Testar drag-and-drop</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img id="drag1" src="pizza.png" draggable="true" ondragstart="drag(event)">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="dropBox" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary ml-3 col-md-2" onclick="window.location.reload();">Atualizar Página</button>
                                    </form>
                                </div>
                        </div>
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
    </script>
</body>

</html>