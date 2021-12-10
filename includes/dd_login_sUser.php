<!-- Dropdown para usuário logados -->

<!--Botão-->
<a href="#" data-toggle="dropdown" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" class="btn btn-primary dropdown login-btn" data-bs-auto-close="false" aria-expanded="false"><img src=<?php echo $self_profile_img ?> alt="" class="rounded-circle" style="width: 30px;"></a>

<!--DropDown-->
<div class="dropdown-menu dropdown-menu-end action-form" aria-labelledby="dropdownMenuLink">
    <div class="d-flex mx-3 mb-3">

        <img src=<?php echo $self_profile_img ?> alt="" class="rounded-circle" style="width: 56px;">

        <div>
            <h6 class="mb-0"><?php echo $self_username ?></h6>
            <p class="mb-0"><?php echo $self_username ?></p>
        </div>
    </div>

    <div class="d-flex mx-3">

        <a href="actions/logout.php" class="btn btn-danger">
            Sair
        </a>
        <a class="btn btn-primary text-dark" href= <?php echo "?p=autor&a=$self_username";?>>
            Página de Autor
        </a> 
            
    </div>
</div>