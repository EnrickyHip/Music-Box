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



<script>$('#add_song_modal').appendTo("body");</script>