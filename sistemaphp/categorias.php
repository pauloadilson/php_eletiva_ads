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
		<h1>Categorias</h1>
		
		<a href="add_categoria.php">Nova Categoria</a>
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Id</th>
			  <th scope="col">Descrição</th>
			  <th scope="col">Ações</th>
			</tr>
		  </thead>
		  <tbody>
      <?php
        require_once("classes/config/Conexao.class.php");
        require_once("classes/model/dao/CategoriaDao.class.php");
        $dao = new CategoriaDAO();
        $categorias = $dao->consultar();
        while($linha = $categorias->fetch(PDO::FETCH_ASSOC)){
          //var_dump($linha);
            ?>
            <tr>
              <td><?= $linha['id'] ?></td>
              <td><?= $linha['descricao'] ?></td>
              <td>
                <a href="alt_categoria.php?id=<?= $linha['id'] ?>">Alterar</a>|
                <a href="del_categoria.php?id=<?= $linha['id'] ?>">Excluir</a>|
                <a href="">Visualizar</a>
              </td>
            </tr>
            <?php
          }
          ?>  
          </tbody>
		</table>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>