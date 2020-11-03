

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
        <!-- <?php require_once("main.php"); ?>  -->
        <main class="content" >
            <?php require_once("menu.php"); ?>
            <div class="container-fluid ">
        <div class="p-3 mt-3">
        <a class="btn btn-primary" data-toggle="collapse" href="#inserirUsuario" role="button" aria-expanded="false" aria-controls="inserirUsuario">
            Novo Usuário
        </a>
        <div class="collapse mt-2" id="inserirUsuario">
        <div class="card card-body">
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
                <input type="text" class="form-control mb-2" id="InstituicoesEnsino_idInstituicaoEnsino" name="InstituicoesEnsino_idInstituicaoEnsino">
                <small class="right"><a class="btn btn-sm btn-primary" data-toggle="collapse" href="#inserirInstituicao" role="button" aria-expanded="false" aria-controls="inserirInstituicao">
            Nova Instituição
            </a></small>
                <div class="collapse mt-1" id="inserirInstituicao">
                    <div class="card card-body">
                        <div class="row ">
                            <div class="col">
                                <label for="nomeInstituicao" class="col-form-label col-form-label-sm">Nome:</label>
                                <input type="text" class="form-control mb-2 form-control-sm" id="nomeInstituicao" name="nomeInstituicao">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="cidadeInstituicao" class="col-form-label col-form-label-sm">Cidade:</label>
                                <input type="text" class="form-control mb-2 form-control-sm" id="cidadeInstituicao" name="cidadeInstituicao">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="paisInstituicao" class="ccol-form-label col-form-label-sm">País:</label>
                                <input type="text" class="form-control mb-2 form-control-sm" id="paisInstituicao" name="paisInstituicao">
                            </div>
                        </div>
                    </div>
                </div>
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
                <label for="tipoUsuario">Tipo de Usuário:</label>
                <input type="text" class="form-control mb-2" id="tipoUsuario" name="tipoUsuario">
            </div>
                                
    
    
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