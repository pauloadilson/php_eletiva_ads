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

    <title>Instituições de Ensino</title>
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
            <main class="content p-3">
                <div class="container-fluid ">
                    <div class="p-3">
                        <a class="btn btn-light" data-toggle="collapse" href="#inserirInstituicao" role="button" aria-expanded="false" aria-controls="inserirInstituicao">
                            Nova Instituição
                        </a>
                        <div class="collapse mt-2" id="inserirInstituicao">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="row ">
                                        <div class="col">
                                            <label for="nomeInstituicao" class="col-form-label " >Nome:</label>
                                            <input type="text" class="form-control mb-2" id="nomeInstituicao" name="nomeInstituicao" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="cidadeInstituicao" class="col-form-label">Cidade:</label>
                                            <input type="text" class="form-control mb-2" id="cidadeInstituicao" name="cidadeInstituicao" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="paisInstituicao" class="ccol-form-label">País:</label>
                                            <input type="text" class="form-control mb-2" id="paisInstituicao" name="paisInstituicao" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="TipoDeUsuario_idTipoUsuario" class="ccol-form-label">Tipo de Usuário:</label>
                                            <select name="TipoDeUsuario_idTipoUsuario" class="form-control mb-2">
                                            <?php
                                                $dao = new TipoDeUsuarioDAO();
                                                $tiposDeUsuarios = $dao->consultar();
                                                while ($linha = $tiposDeUsuarios->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?= $linha['idTipoUsuario'] ?>"><?= $linha['tipoUsuario'] ?></option>
                                                <?php 
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-25" type="submit" name="btnIncIE">Incluir Instituição</button>
                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST["btnIncIE"])) {
                            $_GET = array();
                            
                            $instituicao = new InstituicaoDeEnsino();
                            $instituicao->nome = $_POST['nomeInstituicao'];
                            $instituicao->cidade = $_POST['cidadeInstituicao'];
                            $instituicao->pais = $_POST['paisInstituicao'];
                            $instituicao->TipoDeUsuario_idTipoUsuario = $_POST['TipoDeUsuario_idTipoUsuario'];

                            $instituicaoDAO = new InstituicaoDeEnsinoDAO();
                            if ($instituicaoDAO->inserir($instituicao))
                                echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Inclusão realizada com sucesso.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>";
                            else
                                echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                    <strong>Erro</strong> ao inserir instituição! 
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
                            
                        }

                        ?>
                    </div>

                    <hr class="m-0">
                    <?php
                    if(isset($_GET['parem']) && $_GET['parem']=="delete")
                    {
                        //var_dump($_GET);
                        $id=$_GET['idInstituicaoEnsino'];
                        $instituicao = new InstituicaoDeEnsino();
                        $instituicao->idInstituicaoEnsino = $id;
                        //var_dump($instituicao);
                        $dao = new InstituicaoDeEnsinoDAO();
                        if($dao->excluir($instituicao))
                            echo "
                            <div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                            Registro <strong>excluído</strong> com sucesso.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                        else 
                            echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                            <strong>Registro não excluído.</strong> Há participantes vinculados à essa instituição! 
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                        }

                ?> 
                    <table class="table nowrap w-100" id="tInstitution">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Cidade</th>
                                <th>Pais</th>
                                <th>Tipo de Usuário</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            function getTUTipo($idTipoUsuario) {
                                $TUdao = new TipoDeUsuarioDAO();
                                $tipoUsuario = $TUdao->consultarTipoPeloId($idTipoUsuario);
                                //var_dump($nomeInstituicao);
                                return $tipoUsuario;
                            }
                            
                            
                            $dao = new InstituicaoDeEnsinoDAO();
                            $instituicoes = $dao->consultar();
                            while ($linha = $instituicoes->fetch(PDO::FETCH_ASSOC)) {
                                // var_dump($linha);
                            ?>
                                <tr key="<?= $linha['idInstituicaoEnsino'] ?>">
                                    <td><?= $linha['idInstituicaoEnsino'] ?></td>
                                    <td><?= $linha['nome'] ?></td>
                                    <td><?= $linha['cidade'] ?></td>
                                    <td><?= $linha['pais'] ?></td>
                                    <td><?= getTUTipo($linha['TipoDeUsuario_idTipoUsuario']) ?></td>
                                    <td>
                                        <a href="institution_alter.php?parem=alter&amp;idInstituicaoEnsino=<?= $linha['idInstituicaoEnsino'] ?>" class="btn btn-warning icon-pencil"></a>
                                        <a href="institution.php?parem=delete&amp;idInstituicaoEnsino=<?= $linha['idInstituicaoEnsino'] ?>" class="btn btn-danger icon-trash" onClick="javascript: return confirm('Confirma a exclusão?');"  ></a>
                                    </td>
                                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                        var groupColumn = 4;
                        var table = $('#tInstitution').DataTable({
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
                                { "visible": false, "targets": groupColumn }
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
                                            '<tr class="group bg-light"><td colspan="5">Tipo de usuário: <i>'+group+'</i></td></tr>'
                                        );
                    
                                        last = group;
                                    }
                                } );
                            }
                        } );
                    
                        // Order by the grouping
                        $('#tInstitution tbody').on( 'click', 'tr.group', function () {
                            var currentOrder = table.order()[0];
                            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                                table.order( [ groupColumn, 'desc' ] ).draw();
                            }
                            else {
                                table.order( [ groupColumn, 'asc' ] ).draw();
                            }
                        } );
                    } );</script>
                    </script>
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