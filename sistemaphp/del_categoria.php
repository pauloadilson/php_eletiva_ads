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
        <h1>Excluir Categoria </h1>
        <?php
            require_once("classes/config/Conexao.class.php");
            require_once("classes/model/dao/CategoriaDao.class.php");
            require_once("classes/model/domain/Categoria.class.php");
            session_start();

            if (!isset($_POST['btnExcluir'])) {
                $id = $_GET['id'];

                $dao = new CategoriaDAO();
                $resultado = $dao->consultarId($id);

                if ($resultado != 0){
                    $_SESSION['id_categoria'] = $id;
        ?>
                    <form method="post" action="">
                    <div class="row">
                    <div class="col">
                        <label for="descricao"> Informe a descrição da categoria: </label>
                        <input type="text" name="descricao" class="form-control" value="<?= $resultado['descricao'] ?>" disabled/>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <input type="submit" name="btnExcluir" class="btn btn-primary mt-1" value="Excluir"/>
                    </div>
                    </div>
                </form>
                <?php
                }
            } else {
              $categoria = new Categoria();
              $categoria->setId($_SESSION['id_categoria']);
              //$categoria->setDescricao($_POST['descricao']);
              $dao = new CategoriaDAO();
              if ($dao->excluir($categoria)) 
                echo "Registro excluído com sucesso!";
              else
                echo "Erro ao excluir dado!";  
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