<ul class="nav nav-pills mb-3 p-2 menu-area d-flex" id="pills-tab" role="tablist">

  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" href="index.php"  >Início</a>
  </li>
  <?php
    if ($_SESSION['usuario']['TipoDeUsuario_idTipoUsuario'] == 1){

  ?>
  <li class="nav-item">
    <a class="nav-link " id="pills-user-tab" href="user.php">Usuários</a>
  </li>
  <?php
}
  ?>
  
  <li class="nav-item">
    <a class="nav-link " id="pills-subject-tab" href="subject.php"  >Participantes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-session-tab" href="session.php" >Sessão</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-session-tab" href="institution.php" >Instituições de Ensino</a>
  </li>
  <li class="nav-item ml-auto">
    <a class="nav-link btn btn-outline-danger" id="pills-session-tab" href="logout.php" >Sair</a>
  </li>
</ul>