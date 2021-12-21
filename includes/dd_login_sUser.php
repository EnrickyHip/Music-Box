<!-- Dropdown para usuário logados -->

<!-- Button trigger modal -->
<button type="button" class="btn px-2 me-3 purple"  id="add_song" data-bs-toggle="modal" data-bs-target="#add_song_modal">

    <div class="d-flex align-items-center">
        <h5 class="mb-0 pb-1">
            Criar
        </h5>
        <span class="material-icons" id="add_song_icon">
            add
        </span>
    </div>
</button>

<!-- Modal -->
<div class="modal fade" id="add_song_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>$('#add_song_modal').appendTo("body") </script>

<!--Botão-->
<a href="#" data-toggle="dropdown" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" class="pe-2" data-bs-auto-close="false" aria-expanded="false">
    <img src=<?=$self_profile_img ?> alt="" class="rounded-circle" style="width: 40px;">
</a>

<!--DropDown-->
<div class="dropdown-menu dropdown-menu-end action-form" aria-labelledby="dropdownMenuLink">
    <div class="d-flex mx-3 mb-3">

        <img src=<?=$self_profile_img ?> alt="" class="rounded-circle" style="width: 56px;">

        <div>
            <h6 class="mb-0"><?=$self_username ?></h6>
            <p class="mb-0"><?=$self_username ?></p>
        </div>
    </div>

    <div class="d-flex mx-3">

        <a href="actions/logout.php" class="btn btn-danger no-ajaxy">
            Sair
        </a>
        <a class="btn btn-primary text-dark" href= <?php echo "?p=autor&a=$self_username";?>>
            Página de Autor
        </a> 
            
    </div>
</div>