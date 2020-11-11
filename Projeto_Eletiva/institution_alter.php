<?php require_once("controleAcesso.php"); ?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <title>Instituições de Ensino - Alteração</title>
    <?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/InstituicaoDeEnsinoDAO.class.php");
    require_once("classes/model/domain/InstituicaoDeEnsino.class.php");
    require_once("classes/model/dao/TipoDeUsuarioDAO.class.php");
    ?>
</head>

<body>
    <div id="root">
        <div class="app">
            <?php require_once("template/header.php"); ?>
            <?php require_once("template/menu.php"); ?>
            <main class="content">
                <div class="container-fluid ">
                    <div class="p-3 mt-3">
                        <p class="h5 p-3">
                            Alteração da Instituição de Ensino 
                        </p>
                        <div class="card card-body">

                            <?php
                            //session_start();
                            //var_dump($_GET);
                            if (!isset($_POST['btnAltIE'])) {
                                $id = $_GET['idInstituicaoEnsino'];

                                $dao = new InstituicaoDeEnsinoDAO();
                                $resultado = $dao->consultarId($id);
                                //var_dump($resultado);

                                if ($resultado != 0) {
                                    $_SESSION['idInstituicaoEnsino'] = $id;
                                    ?>
                                    <form action="" method="post">
                                        <div class="row ">
                                            <div class="col">
                                                <label for="nomeInstituicao" class="col-form-label">Nome:</label>
                                                <input type="text" class="form-control mb-2" id="nomeInstituicao" name="nomeInstituicao" value="<?= $resultado['nome'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="cidadeInstituicao" class="col-form-label">Cidade:</label>
                                                <input type="text" class="form-control mb-2" id="cidadeInstituicao" name="cidadeInstituicao" value="<?= $resultado['cidade'] ?>">
                                        </div>
                                    </div>
                                    <div class=" row">
                                                <div class="col">
                                                    <label for="paisInstituicao" class="ccol-form-label">País:</label>
                                                    <input type="text" class="form-control mb-2" id="paisInstituicao" name="paisInstituicao" value="<?= $resultado['pais'] ?>">
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="col">
                                            <label for="tipoDeUsuario" class="ccol-form-label">Tipo de Usuário:</label>
                                            <select name="tipoDeUsuario" class="form-control mb-2">
                                            <?php
                                                require_once("classes/model/dao/TipoDeUsuarioDAO.class.php");
                                                $dao = new TipoDeUsuarioDAO();
                                                $categorias = $dao->consultar();
                                                while ($linha = $categorias->fetch(PDO::FETCH_ASSOC)) {
                                                    //var_dump($linha);
                                                    //var_dump($resultado);
                                                    if ($linha['id'] == $resultado['idTipoUsuario']) {?>
                                                        <option value="<?= $linha['id'] ?>" selected><?= $linha['tipo'] ?></option>
                                                    <?php 
                                                    } else {?>
                                                        <option value="<?= $linha['id'] ?>"><?= $linha['tipo'] ?></option>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button class=" btn btn-primary w-25" type="submit" name="btnAltIE">Alterar Instituição</button>
                                    </form>
                            <?php
                                }
                            } else {
                                $instituicao = new InstituicaoDeEnsino();
                                $instituicao->idInstituicaoEnsino =  $_SESSION['idInstituicaoEnsino'];
                                $instituicao->nome = $_POST['nomeInstituicao'];
                                $instituicao->cidade = $_POST['cidadeInstituicao'];
                                $instituicao->pais = $_POST['paisInstituicao'];
                                $instituicao->idTipoUsuario = $_POST['tipoDeUsuario'];
                                //var_dump($instituicao);
    
                                $instituicaoDAO = new InstituicaoDeEnsinoDAO();
                                if ($instituicaoDAO->alterar($instituicao))
                                    echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Registro alterado com sucesso! <a href='institution.php'class='alert-link' >Retornar.</a>
                                        <button  type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                                else
                                echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                <strong>Erro</strong> ao alterar instituição! 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                            }

                            ?>
                        </div>

                        <hr>


                    </div>
            </main>
            <?php require_once("template/footer.php"); ?>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>