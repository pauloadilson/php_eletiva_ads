<?php require_once("controleAcesso.php"); ?>
<?php
    require_once("classes/config/Conexao.class.php");
    require_once("classes/model/dao/ParticipanteDAO.class.php");
     try {
        $Participantes_idParticipante = $_POST['Participantes_idParticipante'];
        $dao = new ParticipanteDAO();
        $participante = $dao->consultarId($Participantes_idParticipante);
        $dataNascimento = $participante['dataNascimento'];
        $date = new DateTime($dataNascimento );
        $idade = $date->diff( new DateTime( date('Y-m-d') ) );
        $idade = $idade->format( '%Y' );
        echo "<label for='idadeParticipante'>Idade:</label>
            <input type='text' class='form-control mb-2' disabled name='idadeParticipante' value=$idade>";
    } catch (Exception $e) {
        echo "Deu tudo errado.";
    }    
?>