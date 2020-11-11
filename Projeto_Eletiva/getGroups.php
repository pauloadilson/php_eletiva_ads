<?php require_once("controleAcesso.php"); ?>
<?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/GrupoDAO.class.php");
     try {
        $Estudos_idEstudo = $_POST['Estudos_idEstudo'];
        $dao = new GrupoDAO();
        $grupos = $dao->consultarGruposPeloIdEstudo($Estudos_idEstudo);
        foreach ($grupos as $grupo) {
            $nome = $grupo['nome'];
            echo "<option value=".$grupo['idGrupo'].">".$grupo['nome']."</option>";
        }
    } catch (Exception $e) {
        echo "Deu tudo errado.";
    }    
?>