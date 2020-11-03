<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jmask validação front end no JS -->
    <title>Inserir Item Colecionável</title>
    </style>
    <?php 
        session_start();

        if (isset($_POST['inputTipoItem'])) {
                $_SESSION['inputTipoItem'] = $_POST['inputTipoItem'];
        }
        include('Item_Colecionavel.class.php');
        include("Livro.class.php");
        include("CD.class.php");
        include("DVD.class.php");
        include("Revista.class.php");

        function exibeFormLivro(){
            $descricao = array('Código do item','Nome','Data da aquisição','Lista de autores','Nome da editora','Ano de publicação');
            $name = array('id_item','nome','data_aquisicao','autores', 'nome_editora','ano_publicacao');
            $tipo = array('text','text','date','text','text','text');
            
            for ($i=0; $i<count($tipo); $i++){
                echo "<div class='form-group col-md-6'>
                        <label for=$name[$i] >$descricao[$i]:</label>
                        <input type=$tipo[$i] class='form-control mb-2' id=$name[$i] name=$name[$i]>
                    </div>
                ";
            } 
        }
        function exibeFormCD(){
            $descricao = array('Código do item','Nome','Data da aquisição','Lista de compositores','Gênero musical','IDs das faixas de áudio');
            $name = array('id_item','nome','data_aquisicao','autores', 'genero_musical','id_faixa_audio');
            $tipo = array('text','text','date','text','text','text');
            
            for ($i=0; $i<count($tipo); $i++){
                echo "<div class='form-group col-md-6'>
                        <label for=$name[$i] >$descricao[$i]:</label>
                        <input type=$tipo[$i] class='form-control mb-2' id=$name[$i] name=$name[$i]>
                    </div>
                ";
            } 
        }
        function exibeFormDVD(){
            $descricao = array('Código do item','Nome','Data da aquisição','Lista de autores','Tipo de conteúdo','Descrição geral sobre o item');
            $name = array('id_item','nome','data_aquisicao','autores', 'tipo_conteudo','descricao');
            $tipo = array('text','text','date','text','text','text');
            
            for ($i=0; $i<count($tipo); $i++){
                echo "<div class='form-group col-md-6'>
                        <label for=$name[$i] >$descricao[$i]:</label>
                        <input type=$tipo[$i] class='form-control mb-2' id=$name[$i] name=$name[$i]>
                    </div>
                ";
            } 
        }
        function exibeFormRevista(){
            $descricao = array('Código do item','Nome','Data da aquisição','Lista de autores','Ano de Publicação','Volume','Editora','Principais assuntos');
            $name = array('id_item','nome','data_aquisicao','autores', 'ano_publicacao','volume','editora','principais_assuntos');
            $tipo = array('text','text','date','text','text','text','text','text');
            
            for ($i=0; $i<count($tipo); $i++){
                echo "<div class='form-group col-md-6'>
                        <label for=$name[$i] >$descricao[$i]:</label>
                        <input type=$tipo[$i] class='form-control mb-2' id=$name[$i] name=$name[$i]>
                    </div>
                ";
            } 
        }
     ?>
</head>


<body>
    <div class="container p-4">
        <h1>Inserir <?= $_SESSION['inputTipoItem'] ?> à coleção</h1>
        <div class=" p-4">
            <form class="form" id="form1" method="post">
            <div class="form-row">
            <?php 
                switch  ($_SESSION['inputTipoItem']) {
                    case "Livro":
                        exibeFormLivro();
                        break;
                    case "CD":
                        exibeFormCD();
                        break;
                    case "DVD":
                        exibeFormDVD();
                        break;
                    case "Revista":
                        exibeFormRevista();
                        break;
                }
                ?>
                    
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" name="bt_ex" value='Inserir'>
                    </div>
                </div>
            </div>
            </form>
            <?php
            if (!isset($_POST['inputTipoItem'])) {

                function incluirLivro(){
                    $livro = new Livro();
                    $livro->id_item = $_POST['id_item'];
                    $livro->nome = $_POST['nome'];
                    $livro->data_aquisicao = $_POST['data_aquisicao'];
                    $livro->lista_autores = $_POST['autores'];
                    $livro->nome_editora = $_POST['nome_editora'];
                    $livro->ano_publicacao = $_POST['ano_publicacao'];
                    //var_dump($livro);
                    return $livro;
                }
                function incluirCD(){
                    $cd = new CD();
                    $cd->id_item = $_POST['id_item'];
                    $cd->nome = $_POST['nome'];
                    $cd->data_aquisicao = $_POST['data_aquisicao'];
                    $cd->lista_autores = $_POST['autores'];
                    $cd->genero_musical = $_POST['genero_musical'];
                    $cd->id_faixa_audio = $_POST['id_faixa_audio'];
                    //var_dump($cd);
                    return $cd;
                }
                function incluirDVD(){
                    $dvd = new DVD();
                    $dvd->id_item = $_POST['id_item'];
                    $dvd->nome = $_POST['nome'];
                    $dvd->data_aquisicao = $_POST['data_aquisicao'];
                    $dvd->lista_autores = $_POST['autores'];
                    $dvd->tipo_conteudo = $_POST['tipo_conteudo'];
                    $dvd->data_aquisicao  = $_POST['data_aquisicao'];
                    //var_dump($dvd);
                    return $dvd;
                }
                function incluirRevista(){
                    $revista = new Revista();
                    $revista->id_item = $_POST['id_item'];
                    $revista->nome = $_POST['nome'];
                    $revista->data_aquisicao = $_POST['data_aquisicao'];
                    $revista->lista_autores = $_POST['autores'];
                    $revista->nome_editora = $_POST['nome_editora'];
                    $revista->ano_publicacao = $_POST['ano_publicacao'];
                    $revista->ano_publicacao = $_POST['ano_publicacao'];
                    $revista->ano_publicacao = $_POST['ano_publicacao'];
                    //var_dump($revista);
                    return $revista;
                }

                function inserir_colecionavel($tipoItem) {
                    switch  ($tipoItem) {
                        case "Livro":
                            return incluirLivro();
                        case "CD":
                            return incluirCD();
                        case "DVD":
                            return incluirDVD();
                        case "Revista":
                            return incluirRevista();
                    }
                }
                function imprimirMensagem($colecionavel) {
                    echo "<div class='p-4 m-5 bg-dark text-white text-center'>";
                    $colecionavel->iterarAtributos();
                    echo "</div>";
                }

                //var_dump($_POST);
                $tipoItem = $_SESSION['inputTipoItem'];
                $colecionavel =  inserir_colecionavel($tipoItem);
                imprimirMensagem($colecionavel); 

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