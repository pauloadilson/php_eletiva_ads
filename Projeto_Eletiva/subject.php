<?php require_once("controleAcesso.php"); ?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="template/style.css">
    <!-- jmask validação front end no JS -->
    <title>Participantes</title>
    <style>
    </style>
    <?php
        require_once("classes/config/Conexao.class.php");
        require_once("classes/model/dao/InstituicaoDeEnsinoDAO.class.php");
        require_once("classes/model/dao/ParticipanteDAO.class.php");
        require_once("classes/model/domain/Participante.class.php");
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
                            Novo Participante
                        </a>
                        <div class="collapse mt-2" id="inserirUsuario">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nome:</label>
                                            <input type="text" class="form-control mb-2" id="nome" name="nome">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="dataNascimento">Data de Nascimento:</label>
                                            <input type="date" class="form-control mb-2" id="dataNascimento" name="dataNascimento">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="telefone">Telefone:</label>
                                            <input type="tel" class="form-control mb-2" id="telefone" name="telefone">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pais">País:</label>
                                            <input type="text" class="form-control mb-2" id="pais" name="pais">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="InstituicoesEnsino_idInstituicaoEnsino">Instituição de Ensino:</label>
                                            <select name="InstituicoesEnsino_idInstituicaoEnsino" id="InstituicoesEnsino_idInstituicaoEnsino" class="form-control mb-2">
                                                <?php
                                                $dao = new InstituicaoDeEnsinoDAO();
                                                $categorias = $dao->consultar();
                                                while ($linha = $categorias->fetch(PDO::FETCH_ASSOC)) {
                                                    if ($linha['TipoDeUsuario_idTipoUsuario'] == '4') {

                                                ?>
                                                    <option value="<?= $linha['idInstituicaoEnsino'] ?>"><?= $linha['nome'] ?></option>
                                                <?php
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
                                            <label for="primeiroResponsavel">Primeiro Responsável</label>
                                            <input type="text" class="form-control mb-2" id="primeiroResponsavel" name="primeiroResponsavel">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="segundoResponsavel">Segundo Responsável:</label>
                                            <input type="text" class="form-control mb-2" id="segundoResponsavel" name="segundoResponsavel">
                                        </div>

                                       
                                        <button class="btn btn-primary ml-3" type="submit" name="btnIncSub">Incluir Usuário</button>
                                    </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <?php

                            if (isset($_POST["btnIncSub"])) {
                                $_GET = array();
                                //var_dump($_POST);

                                $participante = new Participante();
                                $participante->InstituicoesEnsino_idInstituicaoEnsino = $_POST['InstituicoesEnsino_idInstituicaoEnsino'];
                                $participante->nome = $_POST['nome'];
                                $participante->dataNascimento = $_POST['dataNascimento'];
                                $participante->pais = $_POST['pais'];
                                $participante->primeiroResponsavel = $_POST['primeiroResponsavel'];
                                $participante->segundoResponsavel = $_POST['segundoResponsavel'];
                                $participante->telefone = $_POST['telefone'];

                                $dao = new ParticipanteDAO();
                                if ($dao->inserir($participante))
                                    echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Inclusão de participante realizada com sucesso.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                        </div>";
                                else
                                echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                <strong>Erro</strong> ao incluir participante! 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";

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
                                    <th>Nome</th>
                                    <th>Data de Nascimento</th>
                                    <th>País</th>
                                    <th>Primeiro Responsável</th>
                                    <th>Segundo Responsável</th>
                                    <th>Telefone</th>
                                    <th>Escola</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            function getIEName($idInstituicaoEnsino) {
                                $IEdao = new InstituicaoDeEnsinoDAO();
                                $nomeInstituicao = $IEdao->consultarNomePeloId($idInstituicaoEnsino);
                                //var_dump($nomeInstituicao);
                                return $nomeInstituicao;
                            }
                            
                            
                            $ParticipanteDao = new ParticipanteDAO();
                            $participantes = $ParticipanteDao->consultar();
                            while ($linha = $participantes->fetch(PDO::FETCH_ASSOC)) {
                                // var_dump($linha);
                            ?>
                                <tr key="<?= $linha['idParticipante'] ?>">
                                    <td><?= $linha['idParticipante'] ?></td>
                                    <td><?= $linha['nome'] ?></td>
                                    <td><?= date("d-m-Y", strtotime(($linha['dataNascimento']))) ?></td>
                                    <td><?= $linha['pais'] ?></td>
                                    <td><?= $linha['primeiroResponsavel'] ?></td>
                                    <td><?= $linha['segundoResponsavel'] ?></td>
                                    <td><?= $linha['telefone'] ?></td>
                                    <td><?= getIEName($linha['InstituicoesEnsino_idInstituicaoEnsino']) ?></td>
                                    <td>
                                        <a href="subject_alter.php?idParticipante=<?= $linha['idParticipante'] ?>" class="btn btn-warning icon-pencil"></a>
                                        <a href="subject.php?parem=delete&amp;idParticipante=<?= $linha['idParticipante'] ?>" class="btn btn-danger icon-trash" onClick="javascript: return confirm('Confirma a exclusão?');"  ></a>
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
                        var groupColumn = 7;
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