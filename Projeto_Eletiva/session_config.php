<?php require_once("controleAcesso.php"); ?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>Estudos</title>
<?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/EstudoDAO.class.php");
    require_once("classes/model/domain/Estudo.class.php");
    require_once("classes/model/dao/UsuarioDAO.class.php");
    require_once("classes/model/dao/SessaoDeTesteDAO.class.php");
    require_once("classes/model/domain/SessaoDeTeste.class.php");
    require_once("classes/model/dao/ParticipanteDAO.class.php");
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
                            Configuração do teste
                        </p>
                            <div class="card card-body">
                            <?php
                            function getAge($Participantes_idParticipante) {
                                $Participantes_idParticipante = $_POST['Participantes_idParticipante'];
                                $dao = new ParticipanteDAO();
                                $participante = $dao->consultarId($Participantes_idParticipante);
                                $dataNascimento = $participante['dataNascimento'];
                                $date = new DateTime($dataNascimento );
                                $idade = $date->diff( new DateTime( date('Y-m-d') ) );
                                return $idade->format( '%Y' );
                            }
                            if (!isset($_POST['btnInicTeste'])) {

                                if (isset($_POST["btnInicSessao"])) {
                                    //var_dump($_POST);
                                    $_GET = array();

                                    $sessao = new SessaoDeTeste();
                                    $sessao->Participantes_idParticipante = $_POST['Participantes_idParticipante'];
                                    $sessao->idadeParticipante = getAge($_POST['Participantes_idParticipante']);
                                    $sessao->anoEscolar = $_POST['anoEscolar'];
                                    $sessao->Estudos_idEstudo = $_POST['Estudos_idEstudo'];
                                    $sessao->Grupos_idGrupo = $_POST['Grupos_idGrupo'];
                                    $sessao->numeroSessao = $_POST['numeroSessao'];
                                    $sessao->data = date('Y-m-d');
                                    $sessao->Usuarios_idUsuario = $_SESSION['usuario']['idUsuario'];

                                    $dao = new SessaoDeTesteDAO();
                                    $sessaoIniciada = $dao->iniciar($sessao);

                                if ($sessaoIniciada) {
                                    ?>
                                    <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="Participantes_idParticipante">Participante:</label>
                                                <?php
                                                $dao = new ParticipanteDAO();
                                                $participanteNome = $dao->consultarNomePeloId($sessaoIniciada['Participantes_idParticipante']);
                                                ?>
                                                <input type="text" name="Participantes_idParticipante" id="Participantes_idParticipante" class="form-control mb-2" value="<?= $participanteNome ?>" disabled>
                                            </input>
                                        </div>
                                        </script>
                                        <div class="form-group col-md-3" id="idadeParticipante">
                                        <label for='idadeParticipante'>Idade:</label>
                                        <input type='text' class='form-control mb-2' name='idadeParticipante'  disabled  value="<?= $sessaoIniciada['idadeParticipante'] ?>">
                                         </div>
                                        <div class="form-group col-md-3">
                                            <label for="anoEscolar">Ano Escolar:</label>
                                            <input type="text" class="form-control mb-2" id="anoEscolar"  name="anoEscolar" value="<?= $sessaoIniciada['anoEscolar'] ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Estudos_idEstudo">Estudo:</label>
                                                <?php
                                                    $dao = new EstudoDAO();
                                                    $estudoTitulo = $dao->consultarTituloPeloId($sessaoIniciada['Participantes_idParticipante']);

                                                ?>
                                                <input type="text" name="Estudos_idEstudo" id="Estudos_idEstudo" class="form-control mb-2" value="<?= $estudoTitulo ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Grupos_idGrupo">Grupo:</label>
                                            <?php
                                                    $dao = new GrupoDAO();
                                                    $grupoNome = $dao->consultarNomeGrupo($sessaoIniciada['Grupos_idGrupo'],$sessaoIniciada['Estudos_idEstudo']);
                                                ?>
                                                <input type="text" name="Estudos_idEstudo" id="Estudos_idEstudo" class="form-control mb-2" value="<?= $grupoNome ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="numeroSessao">Número da Sessão:</label>
                                            <input type="text" class="form-control mb-2" id="numeroSessao" name="numeroSessao" value="<?= $sessaoIniciada['numeroSessao'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Estudos_idEstudo">Estudo:</label>
                                                <?php

                                                    $dao = new EstudoDAO();
                                                    $estudoTitulo = $dao->consultarTituloPeloId($sessaoIniciada['Participantes_idParticipante']);
                                                ?>
                                                <input type="text" name="Estudos_idEstudo" id="Estudos_idEstudo" class="form-control mb-2" value="<?= $estudoTitulo ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="magnitudeEscala">Magnitude de Escala:</label>
                                            <select name="magnitudeEscala" id="magnitudeEscala" class="form-control mb-2">
                                                <option value="vinte">0-20</option>
                                                <option value="cem">0-100</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="numeroSessao">Forma de Instrução:</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="escrita" name="escrita">
                                                <label class="custom-control-label" for="escrita">Escrita</label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="audio" name="audio" checked>
                                                <label class="custom-control-label" for="audio">Audio</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary ml-3" type="submit" name="btnInicTeste">Iniciar Teste</button>
                                        
                                    </div>
                                    </form>
                                    <?php
                                }  else
                                    echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                    <strong>Erro</strong> ao iniciar sessão! <a href='sessao.php'class='alert-link' >Retornar.</a>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";

                                //var_dump($_POST);
                            } 
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