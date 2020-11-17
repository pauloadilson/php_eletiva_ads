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
    require_once("classes/model/domain/Grupo.class.php");
    require_once("classes/model/dao/UsuarioDAO.class.php");
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
                        <a class="btn btn-light" data-toggle="collapse" href="#inserirInstituicao" role="button" aria-expanded="false" aria-controls="inserirInstituicao">
                            Novo Estudo
                        </a>
                        <div class="collapse mt-2" id="inserirInstituicao">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="row ">
                                        <div class="col">
                                            <label for="titulo" class="col-form-label " >Título do estudo:</label>
                                            <input type="text" class="form-control mb-2" id="titulo" name="titulo" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="descricao" class="col-form-label">Descrição:</label>
                                            <textarea class="form-control" name="descricao"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="Usuarios_idPesquisadorPrincipal" class="ccol-form-label">Pesquisador Principal:</label>
                                            <select name="Usuarios_idPesquisadorPrincipal" class="form-control mb-2">
                                            <?php
                                                $dao = new UsuarioDAO();
                                                $usuarios = $dao->consultar();
                                                while ($linha = $usuarios->fetch(PDO::FETCH_ASSOC)) {
                                                    if($linha['TipoDeUsuario_idTipoUsuario'] == 1) {
                                                        ?>
                                                        <option value="<?= $linha['idUsuario'] ?>"><?= $linha['nome'] ?></option>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                    <div class="col">
                                            <label for="descricao" class="col-form-label">Grupos:</label>
                                            <div class="card card-body">    
                                                <div class="wrapper">
                                                    <div class="input-box mb-2 d-flex">
                                                        <input type="text" class="form-control form-control-sm col-3 mr-2" name="nomeGrupos[]">
                                                        <button class="btn  mb-1 btn-sm add-btn btn-outline-primary">Adicionar mais grupos</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                var maxGrupos = 10;
                                                // initialize the counter for textbox
                                                var grupo = 1;
                                            
                                                // handle click event on Add More button
                                                $('.add-btn').click(function (e) {
                                                e.preventDefault();
                                                if (grupo < maxGrupos) { // validate the condition
                                                    grupo++; // increment the counter
                                                    $('.wrapper').append(`
                                                    <div class="input-box mb-2 d-flex">
                                                        <input type="text" class="form-control-sm form-control col-3 mr-2" name="nomeGrupos[]">
                                                        <a href="#" class="remove-lnk btn btn-sm mb-1 btn-outline-danger">Remover grupo</a>
                                                    </div>
                                                    `);
                                                }
                                                });
                                            
                                                // handle click event of the remove link
                                                $('.wrapper').on("click", ".remove-lnk", function (e) {
                                                e.preventDefault();
                                                $(this).parent('div').remove();  // remove input field
                                                grupo--; // decrement the counter
                                                })
                                            
                                            });
                                            </script>
                                    </div>
                                    <button class="btn btn-primary w-25" type="submit" name="btnIncEst">Incluir Estudo</button>
                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST["btnIncEst"])) {
                            $_GET = array();
                            
                            $estudo = new Estudo();
                            $estudo->titulo = $_POST['titulo'];
                            $estudo->descricao = $_POST['descricao'];
                            $estudo->Usuarios_idPesquisadorPrincipal = $_POST['Usuarios_idPesquisadorPrincipal'];
                            if (isset($_POST["nomeGrupos"]) && is_array($_POST["nomeGrupos"])){ 
                                $nomeGrupos = $_POST["nomeGrupos"]; 
                                foreach($nomeGrupos as $nomeGrupo){
                                    $grupo = new Grupo($nomeGrupo);
                                    $estudo->addGroup($grupo);
                                }
                            } 

                            $estudoDAO = new EstudoDAO();
                            if ($estudoDAO->inserir($estudo))
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

                                if (isset($_POST["nomeGrupos"]) && is_array($_POST["nomeGrupos"])){ 
                                    $ultimEstudo = $estudoDAO->consultarUltimo();
                                    //var_dump($ultimEstudo);
                                    $idUltimoEstudo = $ultimEstudo['idEstudo']; 
                                    foreach($estudo->grupos as $grupo){
                                        //var_dump($grupo);
                                        $grupo->Estudos_idEstudo = $idUltimoEstudo;
                                        $grupoDAO = new GrupoDAO();
                                        $grupoDAO->inserir($grupo);
                                    }
                                } 
                        }

                        ?>
                    </div>

                    <hr class="m-0">
                    <?php
                    if(isset($_GET['parem']) && $_GET['parem']=="delete")
                    {
                        //var_dump($_GET);
                        $id=$_GET['idEstudo'];
                        $estudo = new Estudo();
                        $estudo->idEstudo = $id;
                        //var_dump($estudo);
                        $dao = new EstudoDAO();
                        if($dao->excluir($estudo))
                            echo "
                            <div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                            Registro <strong>excluído</strong> com sucesso.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                        else 
                            echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                            <strong>Registro não excluído.</strong> Há participantes vinculados ao estudo! 
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
                                <th>Titulo</th>
                                <th>Descrição</th>
                                <th>Pesquisador Principal</th>
                                <th>Grupos</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
     
                            function getUserName($idUsuario) {
                                $usuarioDao = new UsuarioDAO();
                                $nomeUsuario = $usuarioDao->consultarNomePeloId($idUsuario);
                                //var_dump($tituloEstudo);
                                return $nomeUsuario;
                            }
                            function getGroupNames($idEstudo) {
                                $grupoDao = new grupoDAO();
                                $nomeGrupos = "";
                                $grupos = $grupoDao->consultarGruposPeloIdEstudo($idEstudo);
                                foreach ($grupos as $grupo) {
                                    //var_dump($grupo);
                                    $nome = $grupo['nome'];
                                    $nomeGrupos .= $nome.", ";
                                }
                                //var_dump($tituloEstudo);
                                return substr($nomeGrupos, 0,-2);
                            }
                            
                            $dao = new EstudoDAO();
                            $estudos = $dao->consultar();
                            while ($linha = $estudos->fetch(PDO::FETCH_ASSOC)) {
                                // var_dump($linha);
                            ?>
                                <tr key="<?= $linha['idEstudo'] ?>">
                                    <td><?= $linha['idEstudo'] ?></td>
                                    <td><?= $linha['titulo'] ?></td>
                                    <td><?= $linha['descricao'] ?></td>
                                    <td><?= getUserName($linha['Usuarios_idPesquisadorPrincipal']) ?></td>
                                    <td><?= getGroupNames($linha['idEstudo']) ?></td>
                                    <td>
                                        <a href="study_alter.php?parem=alter&amp;idEstudo=<?= $linha['idEstudo'] ?>" class="btn btn-warning icon-pencil"></a>
                                        <a href="study.php?parem=delete&amp;idEstudo=<?= $linha['idEstudo'] ?>" class="btn btn-danger icon-trash" onClick="javascript: return confirm('Confirma a exclusão?');"  ></a>
                                    </td>
                                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                        var table = $('#tInstitution').DataTable({
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