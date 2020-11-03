

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- jmask validação front end no JS -->
    <title>Exercício 1 - Lista 3</title>
    <style>
    </style>
</head>

<body>
    <div id="root">
        <div class="app">
        <?php require_once("header.php"); ?>
        <!-- <?php require_once("main.php"); ?>  -->
        <main class="maincontent" >
            <?php require_once("menu.php"); ?>

            <div class="content container-fluid">
        <div class="p-3 mt-3">
            <div class="form">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control"
                                name="name"
                                placeholder="Digite o nome..." />
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control"
                                name="email"
                                placeholder="Digite o e-mail..." />
                        </div>
                    </div>
                </div>

                <hr />
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary">
                            Salvar
                        </button>

                        <button class="btn btn-secondary ml-2" type="reset">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>

        </div>
        </div>
        </main>
        <?php require_once("footer.php"); ?>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>