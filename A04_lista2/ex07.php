


<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Exercício 7 - Lista 2</title>
    <style>
    </style>
</head>

<body>
    <div class="container p-4">
        <h1>Exercício 7 - Lista 2</h1>
        <div class=" p-4">
            <form method="POST" >
                <div class="form-group">
                    <label for="user_name">Nome de usuário:</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="inputPassword1">Senha</label>
                    <input type="password" class="form-control" name="inputPassword1" id="inputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="inputPassword2">Confirmar senha</label>
                    <input type="password" class="form-control" name="inputPassword2" id="inputPassword2" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" value="Enviar">
            </form>
            <?php
                function validatePassword($pwd_peppered2, $pwd_hashed1) 
                {
                    if (password_verify($pwd_peppered2, $pwd_hashed1))
                        echo "As senhas conferem!";
                    else 
                        echo "As senhas NÃO conferem!";
                }

                if ($_POST) {
                    $pepper = "c1isvFdxMDdmjOlvxpecFw";
                    
                    $pwd = $_POST['inputPassword1'];
                    $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
                    $pwd_hashed1 = password_hash($pwd_peppered, PASSWORD_ARGON2I);
                    
                    $pwd2 = $_POST['inputPassword2'];
                    $pwd_peppered2 = hash_hmac("sha256", $pwd2, $pepper);
               
                    echo "<div class='p-4 m-5 bg-dark text-white text-center'>";
                    $un = $_POST["user_name"];
                    $unUpper = strtoupper($un);

                    echo "O nome de usuário é $unUpper. <br>";
                    validatePassword($pwd_peppered2,$pwd_hashed1);
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div><a href="index.php" class="badge badge-primary text-wrap"> voltar.</a></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>