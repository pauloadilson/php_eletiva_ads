<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- jmask validação front end no JS -->
    <title>Usuários</title>
    <?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/UsuarioDAO.class.php");
    require_once("classes/model/domain/Usuario.class.php");
    require_once("classes/model/dao/InstituicaoDeEnsinoDao.class.php");
    require_once("classes/model/dao/TipoDeUsuarioDAO.class.php");

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
                            Novo Usuário
                        </a>
                        <div class="collapse mt-2" id="inserirUsuario">
                            <div class="card card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nome:</label>
                                            <input type="text" class="form-control mb-2" id="nome" name="nome">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="telefone">Telefone:</label>
                                            <input type="tel" class="form-control mb-2" id="telefone" name="telefone">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pais">País:</label>
                                            <input type="text" class="form-control mb-2" id="pais" name="pais">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="InstituicoesEnsino_idInstituicaoEnsino">Instituição de Ensino:</label>
                                            <select name="InstituicoesEnsino_idInstituicaoEnsino" class="form-control mb-2">
                                                <?php
                                                $dao = new InstituicaoDeEnsinoDAO();
                                                $instituicoes = $dao->consultar();
                                                while ($linha = $instituicoes->fetch(PDO::FETCH_ASSOC)) {
                                                    //var_dump($linha);
                                                    //var_dump($linha['idTipoUsuario'] != '4');
                                                    if ($linha['TipoDeUsuario_idTipoUsuario'] != '4') {
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
                                            <label for="tipoDoc">Tipo de Documento:</label>
                                            <input type="text" class="form-control mb-2" id="tipoDoc" name="tipoDoc">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="numeroDoc">Número do Documento:</label>
                                            <input type="text" class="form-control mb-2" id="numeroDoc" name="numeroDoc">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">E-mail:</label>
                                            <input type="email" class="form-control mb-2" id="email" name="email">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="senhaAcesso">Senha:</label>
                                            <input type="password" class="form-control mb-2" id="senhaAcesso" name="senhaAcesso">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="TipoDeUsuario_idTipoUsuario">Tipo de Usuário:</label>
                                            <select name="TipoDeUsuario_idTipoUsuario" class="form-control mb-2">
                                            <?php
                                                $dao = new TipoDeUsuarioDAO();
                                                $tiposDeUsuarios = $dao->consultar();
                                                while ($linha = $tiposDeUsuarios->fetch(PDO::FETCH_ASSOC)) {
                                                    if ($linha['idTipoUsuario'] != '4') {

                                                        ?>
                                                        <option value="<?= $linha['idTipoUsuario'] ?>"><?= $linha['tipoUsuario'] ?></option>
                                                <?php 
                                                }
                                            }
                                                ?>
                                            </select>                                        </div>
                                        <button class="btn btn-primary ml-3" type="submit" name="btnIncUser">Incluir Usuário</button>
                                    </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <?php
                            if (isset($_POST["btnIncUser"])) {
                                $_GET = array();
                                //var_dump($_POST);

                                $usuario = new Usuario();
                                $usuario->nome = $_POST['nome'];
                                $usuario->telefone = $_POST['telefone'];
                                $usuario->pais = $_POST['pais'];
                                $usuario->InstituicoesEnsino_idInstituicaoEnsino = $_POST['InstituicoesEnsino_idInstituicaoEnsino'];
                                $usuario->tipoDoc = $_POST['tipoDoc'];
                                $usuario->numeroDoc = $_POST['numeroDoc'];
                                $usuario->email = $_POST['email'];
                                $usuario->senhaAcesso = $_POST['senhaAcesso'];
                                $usuario->TipoDeUsuario_idTipoUsuario = $_POST['TipoDeUsuario_idTipoUsuario'];
                                //var_dump($usuario);


                                $dao = new UsuarioDAO();
                                if ($dao->inserir($usuario))
                                    echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Inclusão de usuário realizada com sucesso.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                        </div>";
                                else
                                echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                <strong>Erro</strong> ao incluir usuário! 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";

                                $_POST = array();
                                //var_dump($_POST);
                            } 
                            ?>

                        <hr>
                        <?php
                        if(isset($_GET['parem']) && $_GET['parem']=="delete")
                        {
                            //var_dump($_GET);
                            $id=$_GET['idUsuario'];
                            $usuario = new Usuario();
                            $usuario->idUsuario = $id;
                            //var_dump($usuario);
                            $dao = new UsuarioDAO();
                            if($dao->excluir($usuario))
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
                        <table class="table mt-4" id="tUsuarios">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                    <th>Instituição de Ensino</th>
                                    <th>Tipo de Usuário</th>
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
                            function getTUTipo($idTipoUsuario) {
                                //var_dump($idTipoUsuario);

                                $TUdao = new TipoDeUsuarioDAO();
                                $tipoUsuario = $TUdao->consultarTipoPeloId($idTipoUsuario);
                                //var_dump($tipoUsuario);
                                return $tipoUsuario;
                            }
                            
                            $UserDao = new UsuarioDAO();
                            $usuarios = $UserDao->consultar();
                            while ($linha = $usuarios->fetch(PDO::FETCH_ASSOC)) {
                                //var_dump($linha);
                            ?>
                                <tr key="<?= $linha['idUsuario'] ?>">
                                    <td><?= $linha['idUsuario'] ?></td>
                                    <td><?= $linha['nome'] ?></td>
                                    <td><?= $linha['telefone'] ?></td>
                                    <td><?= $linha['email'] ?></td>
                                    <td><?= getIEName($linha['InstituicoesEnsino_idInstituicaoEnsino']) ?></td>
                                    <td><?= getTUTipo($linha['TipoDeUsuario_idTipoUsuario']) ?></td>
                                    <td>
                                        <a href="user_alter.php?idUsuario=<?= $linha['idUsuario'] ?>" class="btn btn-warning icon-pencil"></a>
                                        <a href="user.php?parem=delete&amp;idUsuario=<?= $linha['idUsuario'] ?>" class="btn btn-danger icon-trash" onClick="javascript: return confirm('Confirma a exclusão?');"  ></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <script>
                        $(document).ready(function() {
                        var groupColumn = 5;
                        var table = $('#tUsuarios').DataTable({
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
                                            '<tr class="group bg-light"><td colspan="5">'+group+'</td></tr>'
                                        );
                    
                                        last = group;
                                    }
                                } );
                            }
                        } );
                    
                        // Order by the grouping
                        $('#tUsuarios tbody').on( 'click', 'tr.group', function () {
                            var currentOrder = table.order()[0];
                            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                                table.order( [ groupColumn, 'desc' ] ).draw();
                            }
                            else {
                                table.order( [ groupColumn, 'asc' ] ).draw();
                            }
                        } );
                    } );
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
    <script>
        $('.alert').alert()
    </script>
</body>

</html>