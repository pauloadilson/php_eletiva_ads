

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- jmask validação front end no JS -->
    <title>Exercício 1 - Lista 3</title>
    <style>
    </style>
</head>

<body>
    <div id="root">
        <div class="app">
        <?php require_once("header.php"); ?>
        <?php require_once("menu.php"); ?>
        <!-- <?php require_once("main.php"); ?>  -->
        <main class="content container-fluid">
        <div class="p-3 mt-3">
        <a class="btn btn-primary" data-toggle="collapse" href="#inserirUsuario" role="button" aria-expanded="false" aria-controls="inserirUsuario">
            Novo Usuário
        </a>
        <div class="collapse" id="inserirUsuario">
        <div class="card card-body">
            <div class="row">
                <?php
                        $campos = array( 'descricao' => array('Nome', 'Telefone','País','Instituição de Ensino','Tipo de Documento', 'Número do Documento','E-mail','Senha','Tipo de Usuário'),
                        "value" => array('nome','telefone','pais', 'InstituicoesEnsino_idInstituicaoEnsino','tipoDoc','numeroDoc','email','senhaAcesso','tipoUsuario'),
                          "type" => array('text','tel','text','text','text','text','email','password','text' ) );
                        
                        for ($i=0; $i<count($campos['descricao']); $i++){
                            ?>
                            <div class='form-group col-md-4'>
                                <label for=<?= $campos['value'][$i] ?>><?= $campos['descricao'][$i] ?>:</label>
                                <input type=<?= $campos['type'][$i] ?> class='form-control mb-2' id=<?= $campos['value'][$i] ?> name=<?= $campos['value'][$i] ?>>
                                </div>
                            <?php
                        } 
                 ?>
    
    
    
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
                
            </div>
        </div>

            <hr>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <tr key={user.id}>
                    <td>user.id</td>
                    <td>user.name</td>
                    <td>user.email</td>
                    <td>
                        <button class="btn btn-warning">
                            <i class="icon-pencil"></i>
                        </button>
                        <button class="btn btn-danger ml-2">
                            <i class="icon-trash"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </main>
        <?php require_once("footer.php"); ?>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>