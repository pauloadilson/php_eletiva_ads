<nav class="menu-area align-items-center">
  <ul class="nav nav-pills mb-3 p-2 d-flex" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link btn active" id="pills-home-tab" href="index.php"  >Início</a>
    </li>
      <?php
        if ($_SESSION['usuario']['TipoDeUsuario_idTipoUsuario'] == 1){
      ?>
    <li class="nav-item">
      <a class="nav-link btn " id="pills-user-tab" href="user.php">Usuários</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn" id="pills-user-tab" href="study.php">Estudos</a>
    </li>
      <?php 
      }
      ?>
    <li class="nav-item">
      <a class="nav-link btn " id="pills-subject-tab" href="subject.php"  >Participantes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn" id="pills-session-tab" href="institution.php" >Instituições de Ensino</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn" id="pills-session-tab" href="session.php" >Sessões</a>
    </li>
    <li class="nav-item ml-auto">
      <a class="nav-link btn btn-outline-primary" id="pills-session-tab" href="hardware.php" >Testar Hardware</a>
    </li>
    <li class="nav-item ml-2">
      <a class="nav-link btn btn-outline-danger" id="pills-session-tab" href="logout.php" >Sair</a>
    </li>
  </ul>
</nav>