<?php
  session_start();
  $user = null;

  if(isset($_SESSION['usuario'])){
    $user = $_SESSION['usuario'];
    $username = $user['username'];
  }
?>

<div class="flex-column d-none d-lg-flex position-fixed shadow bg-gradient" id="wrapper">
    <ul class="nav flex-column text-center mb-auto">
        <li class="nav-item my-1">
            <a href="" class="btn btn-primary w-100 px-0"><i class="bi bi-file-earmark-music fs-2"></i><br>Musicas</a>
        </li>

        <li class="nav-item my-1">
            <a href="" class="btn btn-primary w-100 px-0"><i class="bi bi-archive fs-2"></i><br>Artigos</a>
        </li>

        <li class="nav-item my-1">
            <a href="" class="btn btn-primary w-100 px-0"><i class="bi bi-people fs-2"></i><br>Comunidade</a>
        </li>

        <li class="nav-item my-1">       
          <?php  
            if($user){
              echo '<a href="autor/'.$user['username'].'" class="btn btn-primary w-100 px-0"><i class="bi bi-person fs-2"></i><br>Sua Página de Autor </a>'; 
            }  
          ?>
        </li>
    </ul>

    <div class="nav-item dropend" id="tools">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-wrench fs-3"></i><br>Ferramentas
        </button>
        <ul class="dropdown-menu toolMenu">
          <li>
            <a href="" class="btn btn-secondary">Metrônomo</a>
          </li>
          <li>
            <a href="" class="btn btn-secondary">Gerador de Escalas</a>
          </li>
        </ul>
      </div>
</div>