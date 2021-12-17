<div class="container-fluid justify-content-center d-flex d-lg-none position-fixed bottom-0 shadow mobNavWrap">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="" class="btn btn-primary btn-lg"><i class="bi bi-file-earmark-music fs-3"></i></a>
        </li>

        <li class="nav-item">
            <a href="" class="btn btn-primary btn-lg"><i class="bi bi-archive fs-3"></i></a>
        </li>

        <li class="nav-item">
            <a href="" class="btn btn-primary btn-lg"><i class="bi bi-people fs-3"></i></a>
        </li>

        <li class="nav-item">
            <!-- caso o usuário esteja logado, aparecerá o botão de autor-->
            <?php
              if(isset($self_user)){  
            ?>
                <a href="<?="?p=autor&a=$self_username";?>" class="btn btn-primary btn-lg"><i class="bi bi-person fs-3"></i></a>
            <?php
              }
            ?>
        </li>

        <li class="nav-item">
            <a href="" class="btn btn-primary btn-lg"><i class="bi bi-wrench fs-3"></i></a>
        </li>
    </ul>
</div>