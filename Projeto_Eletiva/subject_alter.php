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

    <title>Participantes - Alteração</title>
    <?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/ParticipanteDAO.class.php");
    require_once("classes/model/domain/Participante.class.php");
    require_once("classes/model/dao/InstituicaoDeEnsinoDAO.class.php");
    require_once("classes/model/dao/EstudoDAO.class.php");
    require_once("classes/model/dao/GrupoDAO.class.php");
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
                            Alteração dos dados de participante 
                        </p>
                        <div class="card card-body">

                            <?php
                            //session_start();
                            //var_dump($_GET);
                            if (!isset($_POST['btnAltSub'])) {
                                $id = $_GET['idParticipante'];

                                $dao = new ParticipanteDAO();
                                $resultado = $dao->consultarId($id);
                                //var_dump($resultado);

                                if ($resultado != 0) {
                                    $_SESSION['idParticipante'] = $id;
                                    ?>
                                     <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nome:</label>
                                            <input type="text" class="form-control mb-2" id="nome" name="nome" value="<?= $resultado['nome'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="dataNascimento">Data de Nascimento:</label>
                                            <input type="date" class="form-control mb-2" id="dataNascimento" name="dataNascimento" value="<?= $resultado['dataNascimento'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pais">País:</label>
                                            <input type="text" class="form-control mb-2" id="pais" name="pais" value="<?= $resultado['pais'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="InstituicoesEnsino_idInstituicaoEnsino">Instituição de Ensino:</label>
                                            <select name="InstituicoesEnsino_idInstituicaoEnsino" class="form-control mb-2">
                                                <?php
                                                $dao = new InstituicaoDeEnsinoDAO();
                                                $instituicoes = $dao->consultar();
                                                while ($linha = $instituicoes->fetch(PDO::FETCH_ASSOC)) {
                                                    if ($linha['TipoDeUsuario_idTipoUsuario'] == '4') {
                                                        if ($linha['idInstituicaoEnsino'] == $resultado['InstituicoesEnsino_idInstituicaoEnsino']) {
                                                            ?>
                                                            <option value="<?= $linha['idInstituicaoEnsino'] ?>" selected><?= $linha['nome'] ?></option>
                                                        <?php 
                                                        } else {?>
                                                            <option value="<?= $linha['idInstituicaoEnsino'] ?>"><?= $linha['nome'] ?></option>
                                                        <?php 
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>

                                            <small class="right">
                                                <a class="btn btn-sm btn-light" href="institution.php">
                                                    Nova Instituição
                                                </a>
                                            </small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Estudos_idEstudo">Estudo:</label>
                                            <?php
                                                $EstudoDao = new EstudoDAO();
                                                $estudo = $EstudoDao->consultarId($resultado['Estudos_idEstudo']);
                                            ?>
                                            <input type="text" class="form-control mb-2" id="Estudos_idEstudo" name="Estudos_idEstudo" value="<?= $estudo['titulo'] ?>" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="Grupos_idGrupo">Grupo:</label>
                                            <select name="Grupos_idGrupo" class="form-control mb-2">
                                            <?php
                                                $dao = new GrupoDAO();
                                                $grupos = $dao->consultar();
                                                var_dump($resultado['Estudos_idEstudo']);
                                                while ($linha = $grupos->fetch(PDO::FETCH_ASSOC)) {
                                                    var_dump($linha['Estudos_idEstudo']);
                                                    if ($linha['Estudos_idEstudo'] == $resultado['Estudos_idEstudo']) {
                                                        if ($linha['idGrupo'] == $resultado['Grupos_idGrupo']) {
                                                            ?>
                                                            <option value="<?= $linha['idGrupo'] ?>" selected><?= $linha['nome'] ?></option>
                                                    <?php   
                                                        } else{
                                                    ?>
                                                        <option value="<?= $linha['idGrupo'] ?>"><?= $linha['nome'] ?></option>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label for="primeiroResponsavel">Primeiro Responsável</label>
                                            <input type="text" class="form-control mb-2" id="primeiroResponsavel" name="primeiroResponsavel" value="<?= $resultado['primeiroResponsavel'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="segundoResponsavel">Segundo Responsável:</label>
                                            <input type="text" class="form-control mb-2" id="segundoResponsavel" name="segundoResponsavel" value="<?= $resultado['segundoResponsavel'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="telefone">Telefone:</label>
                                            <input type="tel" class="form-control mb-2" id="telefone" name="telefone" value="<?= $resultado['telefone'] ?>">
                                        </div>
                                       
                                        <button class="btn btn-primary ml-3" type="submit" name="btnAltSub">Alterar participante </button>
                                    </div>
                                    </form>
                                            <?php }
                            } else {
                                //var_dump($_POST);
                                //var_dump($_SESSION['idParticipante']);
                                $participante = new Participante();
                                $participante->idParticipante = $_SESSION['idParticipante'];
                                $participante->nome = $_POST['nome'];
                                $participante->dataNascimento = $_POST['dataNascimento'];
                                $participante->pais = $_POST['pais'];
                                $participante->InstituicoesEnsino_idInstituicaoEnsino = $_POST['InstituicoesEnsino_idInstituicaoEnsino'];
                                $participante->Grupos_idGrupo = $_POST['Grupos_idGrupo'];
                                $participante->primeiroResponsavel = $_POST['primeiroResponsavel'];
                                $participante->segundoResponsavel = $_POST['segundoResponsavel'];
                                $participante->telefone = $_POST['telefone'];
                                // var_dump($participante);


    
                                $dao = new ParticipanteDAO();
                                // var_dump($dao->alterar($usuario));
                                if ($dao->alterar($participante))
                                    echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Registro de usuário alterado com sucesso! <a href='subject.php'class='alert-link' >Retornar.</a>
                                        <button  type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                                else
                                echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                <strong>Erro</strong> ao alterar usuário! 
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