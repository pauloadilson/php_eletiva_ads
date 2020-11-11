<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- jmask validação front end no JS -->
    <title>NumLine - Avaliação Neuropsicológica da Linha Numérica Mental</title>
    <?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/UsuarioDAO.class.php");
    require_once("classes/model/domain/Usuario.class.php");

    ?>
        <style>
        .app {
            margin: 0px;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: var(--header-height) 1fr;
            grid-template-areas: "header" "content";
            height: 100vh;
            background-color: #F5F5F5;
}
    </style>
</head>

<body>
    <div id="root">
        <div class="app">
        <?php require_once("template/header.php"); ?>
        <main class="content p-5 m-5 align-self-center"  >
            <div class="container w-50">
            <div class=" p-4">
            <form method="POST" >
                <div class="form-group">
                    <label for="email">Nome de usuário:</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="senhaAcesso">Senha:</label>
                    <input type="password" class="form-control" name="senhaAcesso" id="senhaAcesso" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" value="Enviar">
            </form>
            <?php
                function isValidPassword($pwd_peppered, $resultado) 
                {
                    $pwd_hashed = $resultado[0]['senhaAcesso'];
                    return password_verify($pwd_peppered, $pwd_hashed);
                }
                if ($_POST) {
                    $pepper = "c1isvFdxMDdmjOlvxpecFw";
                    
                    $pwd = $_POST['senhaAcesso'];
                    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
                    //$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2I);

                    $email = $_POST["email"];

                    $usuario = new Usuario();
                    $usuario->email = $email; 
                    
                    $usuarioDAO = new UsuarioDAO();
                    $resultado = $usuarioDAO->buscaSenha($usuario);
                    //echo var_dump($pwd_peppered);
                    //echo var_dump($resultado[0]['senhaAcesso']);
                    //echo var_dump(isValidPassword($pwd_peppered, $resultado));
                    if (count($resultado) == 1 && isValidPassword($pwd_peppered, $resultado)){
                        $usuarioValido = $usuarioDAO->acessar($usuario);
                        session_start();
                        $_SESSION['usuario'] = $usuarioValido[0];
                        $_SESSION['acesso'] = true;
                        header('Location: index.php');
                    } else {
                        header('Location: login.php?acesso=negado');
                    }
    
                } else {
                    if (isset($_GET['acesso'])){
                        if ($_GET['acesso'] == 'negado')
                            echo "<div class='alert alert-danger fade show  alert-dismissible mt-2' role='alert'>
                                Nome de usuário e/ou senha inválidos! 
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                    }
                }
                ?>
            </div>
                </div>
            </div>
        </main>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>