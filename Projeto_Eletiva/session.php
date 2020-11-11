<?php require_once("controleAcesso.php"); ?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- jmask validação front end no JS -->
    <title>Sessões de Teste</title>
    <style>
    </style>
    <?php
        require_once("classes/config/Conexao.class.php");
        require_once("classes/model/dao/EstudoDAO.class.php");
        require_once("classes/model/dao/ParticipanteDAO.class.php");
        require_once("classes/model/dao/GrupoDAO.class.php");
        require_once("classes/model/dao/SessaoDeTesteDAO.class.php");
        require_once("classes/model/dao/UsuarioDAO.class.php");
        require_once("classes/model/domain/SessaoDeTeste.class.php");
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>
    <div id="root">
        <div class="app">
            <?php require_once("template/header.php"); ?>
            <?php require_once("template/menu.php"); ?>
            <main class="content">
                <div class="container-fluid ">
                    <div class="p-3 mt-3">
                        <a class="btn btn-light" data-toggle="collapse" href="#inserirUsuario" role="button" aria-expanded="false" aria-controls="inserirUsuario">
                            Nova Sessão de Teste
                        </a>
                        <div class="collapse mt-2" id="inserirUsuario">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="Participantes_idParticipante">Participante:</label>
                                            <select name="Participantes_idParticipante" id="Participantes_idParticipante" class="form-control mb-2">
                                                <option selected>Selecionar...</option>

                                                <?php
                                                $dao = new ParticipanteDAO();
                                                $participantes = $dao->consultar();
                                                while ($linha = $participantes->fetch(PDO::FETCH_ASSOC)) {
                                                    //var_dump($linha);
                                                    //var_dump($linha['idTipoUsuario'] != '4');
                                                ?>
                                                    <option value="<?= $linha['idParticipante'] ?>"><?= $linha['nome'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <script>
                                            $('#Participantes_idParticipante').on('change', function() {
                                                var idParticipante = $('#Participantes_idParticipante').val(); 
                                                //alert( `idEstudo: ${idParticipante}` );
                                                $.ajax({
                                                    url:'getAge.php',
                                                    type: 'POST',
                                                    data:{Participantes_idParticipante:idParticipante},
                                                    beforeSend: function (){
                                                        $('#idadeParticipante').html("<label for='idadeParticipante'>Idade:</label>")
                                                    },
                                                    success: function (data) {
                                                        $('#idadeParticipante').html(data);
                                                        
                                                    },
                                                    error: function (data) {
                                                        $('#idadeParticipante').html("Houve um erro ao carregar!");
                                                        
                                                    },
                                                })
                                                });
                                        </script>
                                        <div class="form-group col-md-3" id="idadeParticipante">
                                        <label for='idadeParticipante'>Idade:</label>
                                        <input type='text' class='form-control mb-2' name='idadeParticipante'  disabled >
                                         </div>
                                        <div class="form-group col-md-3">
                                            <label for="anoEscolar">Ano Escolar:</label>
                                            <input type="text" class="form-control mb-2" id="anoEscolar"  name="anoEscolar">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Estudos_idEstudo">Estudo:</label>
                                            <select name="Estudos_idEstudo" id="Estudos_idEstudo" class="form-control mb-2">
                                                <option selected>Selecionar</option>
                                                <?php

                                                $dao = new EstudoDAO();
                                                $estudos = $dao->consultar();
                                                while ($linha = $estudos->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                    <option value="<?= $linha['idEstudo'] ?>"><?= $linha['titulo'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
       
                                        <script>
                                            $('#Estudos_idEstudo').on('change', function() {
                                                var idEstudo = $('#Estudos_idEstudo').val(); 
                                                //alert( `idEstudo: ${idEstudo}` );
                                                $.ajax({
                                                    url:'getGroups.php',
                                                    type: 'POST',
                                                    data:{Estudos_idEstudo:idEstudo},
                                                    beforeSend: function (){
                                                        $('#Grupos_idGrupo').html("<option>Carregando..</option>")
                                                    },
                                                    success: function (data) {
                                                        $('#Grupos_idGrupo').html(data);
                                                        
                                                    },
                                                    error: function (data) {
                                                        $('#Grupos_idGrupo').html("Houve um erro ao carregar!");
                                                        
                                                    },
                                                })
                                                });
                                        </script>
                                        <div class="form-group col-md-4">
                                            <label for="Grupos_idGrupo">Grupo:</label>
                                            <select name="Grupos_idGrupo" id="Grupos_idGrupo" class="form-control mb-2">
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="numeroSessao">Número da Sessão:</label>
                                            <input type="text" class="form-control mb-2" id="numeroSessao" name="numeroSessao">
                                        </div>
                                        <button class="btn btn-primary ml-3" type="submit" name="btnIncSess">Incluir Sessão</button>
                                        
                                    </div>
                                    </form>
                                    
                                </div>
                            </div>
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
                            if (isset($_POST["btnIncSess"])) {
                                $_GET = array();
                                var_dump($_POST);
                                var_dump($_SESSION);

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
                                if ($dao->inserir($sessao))
                                    echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Inclusão de sessão de teste realizada com sucesso.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                        </div>";
                                else
                                echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                <strong>Erro</strong> ao incluir sessão! 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";

                                //var_dump($_POST);
                            } 
                            ?>

                        <hr>
                        <?php
                    if(isset($_GET['parem']) && $_GET['parem']=="delete")
                    {
                        //var_dump($_GET);
                        $id=$_GET['idParticipante'];
                        $participante = new Participante();
                        $participante->idParticipante = $id;
                        //var_dump($participante);
                        $dao = new ParticipanteDAO();
                        if($dao->excluir($participante))
                            echo "
                            <div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                            Registro <strong>excluído</strong> com sucesso.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                        else 
                            echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                            <strong>Registro não excluído.</strong> 
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                        }

                ?> 
                        <table class="table nowrap w-100" id="tParticipantes">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Participante</th>
                                    <th>Idade</th>
                                    <th>Ano Escolar</th>
                                    <th>Estudo</th>
                                    <th>Grupo</th>
                                    <th>Número da Sessão</th>
                                    <th>Data da Sessão</th>
                                    <th>Avaliador</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            function getParticipanteNome($idParticipante) {
                                $ParticipanteDao = new ParticipanteDAO();
                                $nomeParticipante = $ParticipanteDao->consultarNomePeloId($idParticipante);
                                //var_dump($tituloEstudo);
                                return $nomeParticipante;
                            }
                            function getEstudoTitulo($idEstudo) {
                                $EstudoDao = new EstudoDAO();
                                $tituloEstudo = $EstudoDao->consultarTituloPeloId($idEstudo);
                                //var_dump($tituloEstudo);
                                return $tituloEstudo;
                            }
                            function getGroupName($idParticipante,$idEstudo) {
                                $grupoDao = new GrupoDAO();
                                $ParticipanteDao = new ParticipanteDAO();
                                $participante = $ParticipanteDao->consultarId($idParticipante);
                                $idGrupo = $participante['Grupos_idGrupo'];
                                $nomeGrupo = $grupoDao->consultarNomeGrupo($idGrupo,$idEstudo);
                                //var_dump($tituloEstudo);
                                return $nomeGrupo;
                            }
                            function getUserName($idUsuario) {
                                $usuarioDao = new UsuarioDAO();
                                $nomeUsuario = $usuarioDao->consultarNomePeloId($idUsuario);
                                //var_dump($tituloEstudo);
                                return $nomeUsuario;
                            }
                         
                            
                            $SessaoDao = new SessaoDeTesteDAO();
                            $participantes = $SessaoDao->consultar();
                            while ($linha = $participantes->fetch(PDO::FETCH_ASSOC)) {
                                $idEstudo = $linha['Estudos_IdEstudo'];
                            ?>
                                <tr key="<?= $linha['idSessaoTeste'] ?>">
                                    <td><?= $linha['idSessaoTeste'] ?></td>
                                    <td><?= getParticipanteNome($linha['Participantes_idParticipante']) ?></td>
                                    <td><?= $linha['idadeParticipante'] ?></td>
                                    <td><?= $linha['anoEscolar'] ?></td>
                                    <td><?= getEstudoTitulo($linha['Estudos_IdEstudo']) ?></td>
                                    <td><?= getGroupName($linha['Participantes_idParticipante'],$idEstudo) ?></td>
                                    <td><?= $linha['numeroSessao'] ?></td>
                                    <td><?= date("d-m-Y", strtotime(($linha['data']))) ?></td>
                                    <td><?= getUserName($linha['Usuarios_idUsuario']) ?></td>
                                    <td>
<!--                                         <a href="subject_alter.php?idParticipante=<?= $linha['idParticipante'] ?>" class="btn btn-warning icon-pencil"></a>
                                        <a href="subject.php?parem=delete&amp;idParticipante=<?= $linha['idParticipante'] ?>" class="btn btn-danger icon-trash" onClick="javascript: return confirm('Confirma a exclusão?');"  ></a> -->
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        $(document).ready(function() {
                        var groupColumn = 4;
                        var table = $('#tParticipantes').DataTable({ 
                            "scrollX": true,
                            language: {
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sLoadingRecords": "Carregando...",
                            "sProcessing": "Processando...",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                            },
                            "oAria": {
                                "sSortAscending": ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
                            },
                            "select": {
                                "rows": {
                                    "_": "Selecionado %d linhas",
                                    "0": "Nenhuma linha selecionada",
                                    "1": "Selecionado 1 linha"
                                }
                            },
                            "buttons": {
                                "copy": "Copiar para a área de transferência",
                                "copyTitle": "Cópia bem sucedida",
                                "copySuccess": {
                                    "1": "Uma linha copiada com sucesso",
                                    "_": "%d linhas copiadas com sucesso"
                                }
                            }
                        },
                            "columnDefs": [
                                { "visible": false, "targets": groupColumn },
                            ],
                            "order": [[ groupColumn, 'asc' ]],
                            "displayLength": 25,
                            "drawCallback": function ( settings ) {
                                var api = this.api();
                                var rows = api.rows( {page:'current'} ).nodes();
                                var last=null;
                    
                                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                                    if ( last !== group ) {
                                        $(rows).eq( i ).before(
                                            '<tr class="group bg-light"><td colspan="10">'+group+'</td></tr>'
                                        );
                    
                                        last = group;
                                    }
                                } );
                            }
                        } );
                    
                        // Order by the grouping
                        $('#tParticipantes tbody').on( 'click', 'tr.group', function () {
                            var currentOrder = table.order()[0];
                            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                                table.order( [ groupColumn, 'desc' ] ).draw();
                            }
                            else {
                                table.order( [ groupColumn, 'asc' ] ).draw();
                            }
                        } );
                    } );</script>
            </main>
            <?php require_once("template/footer.php"); ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <!-- < src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $('.alert').alert()
        
    </script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"></script>

</body>

</html>