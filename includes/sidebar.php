<div class="flex-column d-none d-lg-flex position-fixed shadow bg-gradient position-absolute" id="wrapper">
    <ul class="nav flex-column text-center mb-auto">
        <li class="nav-item my-1">
            <a href="" class="btn btn-primary transparent w-100 px-0">
              <i class="bi bi-file-earmark-music fs-2"></i>
              <br>
              Musicas</a>
        </li>

        <li class="nav-item my-1">
            <a href="?p=teoria_musical" class="btn btn-primary transparent w-100 px-0"><i class="bi bi-archive fs-2"></i><br>Teoria Musical</a>
        </li>

        <li class="nav-item my-1">
            <a href="" class="btn btn-primary transparent w-100 px-0"><i class="bi bi-people fs-2"></i><br>Comunidade</a>
        </li>

        <li class="nav-item my-1">    
          <!-- caso o usuário esteja logado, aparecerá o botão de págino de autor-->   
          <?php
            if(isset($self_user)){
          ?>
              <a href= <?="?p=autor&a=".$self_user->get_username()?> class="btn btn-primary transparent w-100 px-0">
                  <i class="bi bi-person fs-2"></i>
                    <br>
                      Sua Página de Autor
              </a>
          <?php 
            }  
          ?>

        </li>
    </ul>

    <div class="nav-item dropend" id="tools">
        <button type="button" class="btn btn-primary transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-wrench fs-3"></i><br>Ferramentas
        </button>
        <ul class="dropdown-menu toolMenu">
          <li>
            <a href="" class="btn btn-secondary transparent">Metrônomo</a>
          </li>
          <li>
            <a href="" class="btn btn-secondary transparent">Gerador de Escalas</a>
          </li>
        </ul>
      </div>
</div>

<?php


?>