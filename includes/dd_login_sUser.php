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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar música</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        Escolha como deseja adicionar:
        
        <div class="mt-3 ms-2">
          <div class="nav nav-tabs" id="nav-tab" role="tablist" style="z-index: 0;">

              <button class="nav-link active ps-2" id="song_upload_tab" data-bs-toggle="tab" data-bs-target="#song_upload_content_tab" type="button" role="tab" aria-controls="nav-playlist" aria-selected="true">

                <span class="material-icons">
                  file_upload
                </span>

                Upload
              </button>

              <button class="nav-link" id="nav-song_youtube_tab-tab" data-bs-toggle="tab" data-bs-target="#song_youtube_content_tab" type="button" role="tab" aria-controls="nav-musicas" aria-selected="false">

                <i class="bi bi-youtube"></i>
                Youtube

              </button>

              <button class="nav-link" id="nav-song_spotify_tab-tab" data-bs-toggle="tab" data-bs-target="#song_spotify_content_tab" type="button" role="tab" aria-controls="nav-contrib" aria-selected="false">

                <i class="bi bi-spotify"></i>
                Spotify

              </button>

          </div>
        </div>
        <div class="tab-content border border-1 border-primary rounded" id="nav-tabContent" style="z-index: 1;">
          <div class="tab-pane show active" id="song_upload_content_tab" role="tabpanel" aria-label="nav-playlist-tab">
              

          </div>
          <div class="tab-pane show" id="song_youtube_content_tab" role="tabpanel" aria-label="nav-musicas-tab">
          
            <form action="" method="post" id="form" class="needs-validation p-5" novalidate>
              <label for="youtube_link_upload">
                Digite o link da música:
              </label>
              <input type="link" name="youtube_link_upload" class="form-control"  id="youtube_link_upload" aria-label="youtubeUpload" aria-describedby="user-addon userHelp" required>
            </form>

          </div>
          <div class="tab-pane show" id="song_spotify_content_tab" role="tabpanel" aria-label="nav-contrib-tab">
              <h2 class="text-muted ms-5 my-5">Não há nada aqui :(</h2>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>



<script>$('#add_song_modal').appendTo("body");</script>

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