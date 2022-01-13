<!-- Dropdown para usuário logados -->

<!--Botão-->
<a href="#" data-toggle="dropdown" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" class="pe-2" data-bs-auto-close="false" aria-expanded="false">
    <img src=<?=$self_profile_img ?> alt="" class="rounded-circle" style="width: 37px;">
</a>

<!--DropDown-->
<div class="dropdown-menu dropdown-menu-end action-form" aria-labelledby="dropdownMenuLink">
    <div class="d-flex mx-3 mb-3">

        <img src=<?=$self_profile_img ?> alt="" class="rounded-circle" style="width: 56px;">

        <div class="ms-3">
            <h6 class="mb-0"><?=$self_username ?></h6>
            <p class="mb-0"><?=$self_username ?></p>
        </div>
    </div>

    <div class="d-flex mx-3">

        <a href="actions/logout.php" class="btn btn-danger no-ajaxy">
            Sair
        </a>
        <a class="btn btn-primary text-dark" href= <?="?p=autor&a=$self_username";?>>
            Página de Autor
        </a> 
            
    </div>
</div>

<script src="../script/upload_song.js"></script>
<script src="../script/create_album.js"></script>