<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Sistema em PHP</title>
  </head>
  <body>
    <?php include("menu.php"); ?>
    <div class="container">
		<h1>Novo Produto</h1>
		  <form method="post" action="">
        <div class="row">
          <div class="col">
            <label for="descricao"> Informe a descrição do produto: </label>
            <input type="text" name="descricao" class="form-control"/>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="id_categorias"> Informe a categoria: </label>
            <select name="id_categorias" class="form-control">
                <?php
                    require_once("classes/config/Conexao.class.php");
                    require_once("classes/model/dao/CategoriaDao.class.php");
                    $dao = new CategoriaDAO();
                    $categorias = $dao->consultar();
                    while($linha = $categorias->fetch(PDO::FETCH_ASSOC)){
                        ?>
                    <option value="<?= $linha['id'] ?>"><?= $linha['descricao'] ?></option>   
                    <?php
                     }
                    ?>    
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" name="btnInserir" class="btn btn-primary">Inserir</button>
          </div>
        </div>
      </form>
      <?php
        if($_POST){
            //var_dump($_POST);
            
            require_once("classes/config/Conexao.class.php");
            require_once("classes/model/dao/ProdutoDao.class.php");
            require_once("classes/model/domain/Produto.class.php");
    
            $produto = new Produto();
            $produto->setDescricao($_POST['descricao']);
            $produto->setIdCategoria($_POST['id_categorias']);
    
            $produtoDAO = new ProdutoDAO();
            if ($produtoDAO->inserir($produto)) 
                echo "Inseriu com sucesso!";
            else
                echo "Erro ao inserir dado!";  
            }

      ?>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>