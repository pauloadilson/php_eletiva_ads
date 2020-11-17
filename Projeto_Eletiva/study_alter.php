<?php require_once("controleAcesso.php"); ?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="template/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>Estudos</title>
<?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/EstudoDAO.class.php");
    require_once("classes/model/domain/Estudo.class.php");
    require_once("classes/model/dao/UsuarioDAO.class.php");
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
                            Alterar dados do Estudo
                        </p>
                            <div class="card card-body">
                            <?php
                            //session_start();
                            //var_dump($_GET);
                            if (!isset($_POST['btnAltEstudo'])) {
                                $id = $_GET['idEstudo'];

                                $dao = new EstudoDAO();
                                $resultado = $dao->consultarId($id);
                                //var_dump($resultado);

                                if ($resultado != 0) {
                                    $_SESSION['idEstudo'] = $id;
                                    ?>
                                    <form action="" method="post">
                                    <div class="row ">
                                        <div class="col">
                                            <label for="titulo" class="col-form-label " >Título do estudo:</label>
                                            <input type="text" class="form-control mb-2" id="titulo" name="titulo" required value="<?= $resultado['titulo'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="descricao" class="col-form-label">Descrição:</label>
                                            <textarea class="form-control" name="descricao" ><?= $resultado['descricao'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="Usuarios_idPesquisadorPrincipal" class="ccol-form-label">Pesquisador Principal:</label>
                                            <select name="Usuarios_idPesquisadorPrincipal" class="form-control mb-2" >
                                            <?php
                                                $dao = new UsuarioDAO();
                                                $usuarios = $dao->consultar();
                                                while ($linha = $usuarios->fetch(PDO::FETCH_ASSOC)) {
                                                    if($linha['TipoDeUsuario_idTipoUsuario'] == 1) {
                                                        if ($linha['idUsuario'] == $resultado['Usuarios_idPesquisadorPrincipal']) {
                                                            ?>
                                                            <option value="<?= $linha['idUsuario'] ?>" selected><?= $linha['nome'] ?></option>
                                                        <?php 
                                                        } else {?>
                                                        ?>
                                                        <option value="<?= $linha['idUsuario'] ?>"><?= $linha['nome'] ?></option>
                                                    <?php 
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button class=" btn btn-primary w-25" type="submit" name="btnAltEstudo">Alterar Estudo</button>
                                    </form>
                            <?php
                                }
                            } else {
                                $estudo = new Estudo();
                                $estudo->idEstudo =  $_SESSION['idEstudo'];
                                $estudo->titulo = $_POST['titulo'];
                                $estudo->descricao = $_POST['descricao'];
                                $estudo->Usuarios_idPesquisadorPrincipal = $_POST['Usuarios_idPesquisadorPrincipal'];
                                //var_dump($estudo);
    
                                $estudoDAO = new EstudoDAO();
                                if ($estudoDAO->alterar($estudo))
                                    echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Registro alterado com sucesso! <a href='study.php'class='alert-link' >Retornar.</a>
                                        <button  type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                                else
                                echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                <strong>Erro</strong> ao alterar estudo! 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                            }

                            ?>
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
</body>

</html>