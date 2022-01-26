
<!-- dropdown de criação-->
<div class="btn-group">
  <button type="button" class="btn px-2 me-3 purple add_button gray_hover" id="add_song" data-bs-toggle="dropdown" aria-expanded="false">
    <div class="d-flex align-items-center">
        <h5 class="mb-0 pb-1">
            Criar
        </h5>
        <span class="material-icons" id="create_icon">
            add
        </span>
    </div>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#add_song_modal" href="#">Enviar música</a></li>
    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#create_album_modal" href="#">Criar Album</a></li>
    <li><a class="dropdown-item" href="#">Criar Playlist</a></li>
  </ul>
</div>

<!-- Modal para adicionar música -->
<div class="modal fade" id="add_song_modal" tabindex="-1" aria-labelledby="add_song_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_song_modal">Adicionar música</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        Escolha como deseja adicionar:
        
        <div class="mt-3 ms-2">
          <div class="nav nav-tabs" id="nav-tab" role="tablist" style="z-index: 0;">

              <button class="nav-link active ps-2" id="song_upload_tab" data-bs-toggle="tab" data-bs-target="#song_upload_content_tab" type="button" role="tab" aria-controls="song_upload_content_tab" aria-selected="true">

                <span class="material-icons">
                  file_upload
                </span>

                Upload
              </button>

              <button class="nav-link" id="nav_song_youtube_tab" data-bs-toggle="tab" data-bs-target="#song_youtube_content_tab" type="button" role="tab" aria-controls="nav_song_youtube_tab" aria-selected="false">

                <i class="bi bi-youtube"></i>
                Youtube

              </button>

              <button class="nav-link" id="nav_song_spotify_tab" data-bs-toggle="tab" data-bs-target="#song_spotify_content_tab" type="button" role="tab" aria-controls="song_spotify_content_tab" aria-selected="false">

                <i class="bi bi-spotify"></i>
                Spotify

              </button>

          </div>
        </div>
        <div class="tab-content border border-1 border-primary rounded text-center" id="upload_content" style="z-index: 1;">

        <!-- UPLOAD INPUT-->

          <div class="tab-pane show active" id="song_upload_content_tab" role="tabpanel" aria-label="song_upload_content_tab">

            <form action="..?t=logoOnly&p=song_register" method="POST" class="needs-validation no-ajaxy" enctype="multipart/form-data" id="upload_form">

              <div class="m-1 drop-zone">
                <div class="p-5 m-4">

                    <span class="material-icons purple" id="upload_song_icon">
                        file_upload
                    </span>

                    <input type="file" name="upload_song_input" id="upload_song_input" accept="audio/*">

                    <p>Arraste e solte a música que deseja carregar.</p>  

                    <label for="upload_song_input" aria-expanded="false" name="send_song_upload" class="btn btn-dark bg-primary">
                        Selecionar Arquivo
                    </label>
            

                    <div class="d-flex justify-content-center mt-2 invisible" id="upload_message">
                        <span class="material-icons text-danger">
                            warning
                        </span>
                        <p id="upload_message_text">Formato de arquivo inválido.</p>
                    </div>
                         
                </div>
              </div>

            </form>
          </div>
          <!-- YOUTUBE INPUT-->

          <div class="tab-pane show" id="song_youtube_content_tab" role="tabpanel" aria-label="nav-musicas-tab">

                <i class="bi bi-youtube purple upload-icon"></i>
          
            <form name="ytdlform" action="" method="post" id="" class="needs-validation p-5 pt-0 underline_input" novalidate>
                <label for="youtube_link_upload">
                    Digite o link da música no youtube:
                </label>
                <input class="full-input text-center" type="link" name="youtube_link_upload" id="youtube_link_upload" aria-label="youtubeUpload" aria-describedby="user-addon userHelp" required>
            </form>

          </div>
          <!-- SPOTIFY INPUT-->
          <div class="tab-pane show" id="song_spotify_content_tab" role="tabpanel" aria-label="nav-contrib-tab">

            <i class="bi bi-spotify purple upload-icon"></i>

            <form action="" method="post" id="" class="needs-validation p-5 pt-0 underline_input" novalidate>
              <label for="spotify_link_upload">
                Digite o link da música no spotify:
              </label>
              <input class="full-input text-center" type="link" name="spotify_link_upload" id="spotify_link_upload" aria-label="youtubeUpload" aria-describedby="user-addon userHelp" required>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- MODAL DE CRIAÇÃO DE ÁLBUNS -->

<div class="modal fade" id="create_album_modal" tabindex="-1" aria-labelledby="create_album_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="create_album_modal">Criar Álbum</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="../actions/create_album_act.php" id="create_album_form" method="POST" enctype="multipart/form-data" class="p-5 pt-0 underline_input no-ajaxy" novalidate>
        <div class="modal-body text-center">

          <label class="mt-3" for="album_title">
            <h3>Título do álbum:</h3>
          </label>
          <input type="text" id="album_title_input" name="album_title_input" class="full-input text-center fs-5" required>


        <div class="dropdown">
          <button type="button" class="btn px-2 my-3 purple add_button gray_hover" data-bs-auto-close="false" id="add_album_songs"  data-bs-toggle="dropdown" aria-expanded="false">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 pb-1">
                    Adicionar Músicas
                </h5>
                <span class="material-icons" id="add_song_icon">
                    add
                </span>
            </div>
          </button>

          <div style="max-height: 300px;" class="dropdown-menu ps-2 pe-2 dropdown-menu-center overflow-auto" id="album_songs_dropdown" aria-labelledby="dropdownMenuLink">

            <?php
              $song_ctrl = new \classes\controler\SongControler($self_user->get_id());
              $songs = $song_ctrl->get_all_solo_songs();
              $i = -1;

              if(!$songs){
                echo "<span class='m-2'>Você não possui músicas Solo.</span>";
              }

              else{
                foreach ($songs as $song){
                  $i++;
            ?>

                  <div class='form-check ps-0'>
                    <label class='form-check-label clickable gray_hover text-break w-100 py-1 pe-1' for="<?=$i?>">
                      
                      <input class='form-check-input mx-2 clickable float-start' id="<?=$i?>" type='checkbox' name='album_songs[]' value="<?=$song['code_name']?>">

                      <span class="d-block overflow-auto"><?=$song['title'];?></span>

                    </label>
                  </div>
            <?php
                }
              }
            ?>
          </div>
        </div>

          <h6 class="mb-3">Descrição (Opcional):</h6>
          <textarea class="form-control" name="album_desc" id="album_desc" rows="3" placeholder="Fale sobre seu álbum!"></textarea>


          <div class="mt-4">
            <h6 class="mb-3">Capa do Álbum:</h6>
            <div>
              <img id="album_cover_preview" src="../album_covers/default-cover-art.png" alt="" width="35%">
            </div>
            
            <label for="album_cover" class="btn btn-success mt-3">Selecionar Capa para o Álbum</label>
            <input type="file" name="album_cover" id="album_cover" accept="image/*">
          </div>

        </div>

        <div class="modal-footer">
          <div class="text-danger" id="create_album_message"></div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" name="create_album_submit" class="btn btn-success">Criar Álbum</button>
        </div>

      </form>    

    </div>
  </div>
</div>



<script>
  $('#add_song_modal').appendTo("body");
  $('#create_album_modal').appendTo("body")
</script>