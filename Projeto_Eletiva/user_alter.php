<?php  require_once("controleAcesso.php"); ?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="template/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <title>Usuários - Alteração</title>
    <?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/UsuarioDAO.class.php");
    require_once("classes/model/domain/Usuario.class.php");
    require_once("classes/model/dao/InstituicaoDeEnsinoDAO.class.php");
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
                            Alteração de dados do usuário 
                        </p>
                        <div class="card card-body">

                            <?php
                            //session_start();
                            //var_dump($_GET);
                            if (!isset($_POST['btnAltUser'])) {
                                $id = $_GET['idUsuario'];

                                $dao = new UsuarioDAO();
                                $resultado = $dao->consultarId($id);
                                //var_dump($resultado);

                                if ($resultado != 0) {
                                    $_SESSION['idUsuarioAlteracao'] = $id;
                                    ?>
                                                                    <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nome:</label>
                                            <input type="text" class="form-control mb-2" id="nome" name="nome" value="<?= $resultado['nome'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="telefone">Telefone:</label>
                                            <input type="tel" class="form-control mb-2" id="telefone" name="telefone" value="<?= $resultado['telefone'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pais">País:</label>
                                            <input type="text" class="form-control mb-2" id="pais" name="pais" value="<?= $resultado['pais'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="InstituicoesEnsino_idInstituicaoEnsino">Instituição de Ensino:</label>
                                            <select name="InstituicoesEnsino_idInstituicaoEnsino" class="form-control mb-2">
                                                <?php
                                                //require_once("classes/config/Conexao.class.php");
                                                $dao = new InstituicaoDeEnsinoDAO();
                                                $instituicoes = $dao->consultar();
                                                while ($linha = $instituicoes->fetch(PDO::FETCH_ASSOC)) {
                                                    //var_dump($linha);
                                                    //var_dump($resultado);
                                                    if ($linha['TipoDeUsuario_idTipoUsuario'] != '4') {
                                                    
                                                        if ($linha['idInstituicaoEnsino'] == $resultado['InstituicoesEnsino_idInstituicaoEnsino']) {?>
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
                                            <label for="tipoDoc">Tipo de Documento:</label>
                                            <input type="text" class="form-control mb-2" id="tipoDoc" name="tipoDoc" value="<?= $resultado['tipoDoc'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="numeroDoc">Número do Documento:</label>
                                            <input type="text" class="form-control mb-2" id="numeroDoc" name="numeroDoc" value="<?= $resultado['numeroDoc'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">E-mail:</label>
                                            <input type="email" class="form-control mb-2" id="email" name="email" value="<?= $resultado['email'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hashSenha">Senha:</label>
                                            <input type="password" class="form-control mb-2" id="hashSenha" name="hashSenha">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="TipoDeUsuario_idTipoUsuario">Tipo de Usuário:</label>
                                            <select name="TipoDeUsuario_idTipoUsuario" class="form-control mb-2">
                                            <?php
                                                $dao = new TipoDeUsuarioDAO();
                                                $tiposDeUsuarios = $dao->consultar();
                                                while ($linha = $tiposDeUsuarios->fetch(PDO::FETCH_ASSOC)) {
                                                    if ($linha['idTipoUsuario'] != '4') {

                                                    //var_dump($linha);
                                                    //var_dump($resultado);
                                                    if ($linha['idTipoUsuario'] == $resultado['TipoDeUsuario_idTipoUsuario']) {?>
                                                        <option value="<?= $linha['idTipoUsuario'] ?>" selected><?= $linha['tipoUsuario'] ?></option>
                                                    <?php 
                                                    } else {?>
                                                        ?>
                                                        <option value="<?= $linha['idTipoUsuario'] ?>"><?= $linha['tipoUsuario'] ?></option>
                                                <?php 
                                                }}
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary ml-3" type="submit" name="btnAltUser">Alterar Usuário</button>
                                    </div>
                                    </form>

                            <?php
                                }
                            } else {
                                $usuario = new Usuario();
                                $usuario->idUsuario = $_SESSION['idUsuarioAlteracao'];
                                $usuario->nome = $_POST['nome'];
                                $usuario->telefone = $_POST['telefone'];
                                $usuario->pais = $_POST['pais'];
                                $usuario->InstituicoesEnsino_idInstituicaoEnsino = $_POST['InstituicoesEnsino_idInstituicaoEnsino'];
                                $usuario->tipoDoc = $_POST['tipoDoc'];
                                $usuario->numeroDoc = $_POST['numeroDoc'];
                                $usuario->email = $_POST['email'];
                                $usuario->TipoDeUsuario_idTipoUsuario = $_POST['TipoDeUsuario_idTipoUsuario'];
                                
                                $succeded = false;
                                $dao = new UsuarioDAO();
                                if (empty($_POST['hashSenha'])){
                                    $succeded = ($dao->alterarSemSenha($usuario));
                                } else {
                                    $pepper = "c1isvFdxMDdmjOlvxpecFw";
                                    
                                    $pwd = $_POST['hashSenha'];
                                    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
                                    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2I);

                                    $usuario->hashSenha = $pwd_hashed;
                                    $succeded = ($dao->alterarComSenha($usuario));
                                }
    
                                // var_dump($dao->alterar($usuario));
                                if ($succeded)
                                    echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
                                        Registro de usuário alterado com sucesso! <a href='user.php'class='alert-link' >Retornar.</a>
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