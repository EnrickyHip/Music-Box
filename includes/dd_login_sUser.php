<!-- Dropdown para usuário logados -->

<!--Botão-->
    <button type="button" data-toggle="dropdown" id="dropdownMenuLink" data-bs-toggle="dropdown" class="btn pe-2" aria-expanded="false">
        <img src=<?=$self_user->get_profile_img() ?> alt="" class="rounded-circle" style="width: 37px;">
    </button>

<!--DropDown-->
<div class="dropdown-menu dropdown-menu-end action-form" aria-labelledby="dropdownMenuLink">
    <div class="d-flex mx-3 mb-3">

        <img src=<?=$self_user->get_profile_img()?> alt="" class="rounded-circle" style="width: 56px;">

        <div class="ms-3">
            <h6 class="mb-0"><?=$self_user->get_username()  ?></h6>
            <p class="mb-0"><?=$self_user->get_username()  ?></p>
        </div>
    </div>

    <div class="d-flex mx-3">

        <a href="actions/logout.php" class="btn btn-danger no-ajaxy me-2">
            Sair
        </a>
        <a class="btn btn-primary" href=<?="?p=autor&a=".$self_user->get_username();?>>
            Página de Autor
        </a> 
            
    </div>
</div>

<script src="../script/upload_song.js"></script>
<script src="../script/create_album.js"></script>