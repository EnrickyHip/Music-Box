<div class="container-xxl bg-primary border rounded-3 shadow p-3 col-lg-6">
    <h2 class="text-white text-center">Cadastrar música</h2>
    
    <form action="../actions/song_upload_act.php" method="post" id="form-song" class="bg-white border rounded-3 p-5" enctype="multipart/form-data">
        
        <div class="containder row">
            <div id="step1">
                <h3 class="mb-4 text-center">Principais Informações</h3>

                <div class="col-md-12 mb-4">

                    <label class="form-label" for="selected_song_file">Arquivo Selecionado:</label>  
                    <div class="input-group">
                        <input type="text" class="form-control" id="selected_song_file" name="selected_song_file" value="<?=$song['name']?>" disabled>
                    </div> 

                </div>

                <div class="col-md-12 mb-4">

                    <label class="form-label" for="song_title">Título:</label>  
                    <div class="input-group">
                        <input type="text" maxlength="100" class="form-control" id="song_title" name="song_title" placeholder="Título da Música" required>
                        <div class="invalid-feedback" id="title-message"></div>
                        <input type="hidden" value="<?=$song?>" name="song_file">
                    </div> 
                    
                </div>

                <div class="col-md-12 mb-4">

                    <label class="form-label" for="song_desc">Descrição (Opcional):</label>  
                    <div class="input-group">
                        <textarea rows="3" class="form-control" maxlength="5000" id="song_desc" name="song_desc" placeholder="Descrição da Música"></textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-4 mt-2">
                    <label class="form-label">Visibilidade:</label>

                    <div class="form-check">
                        <input value="true" class="form-check-input" type="radio" name="visibility" id="public_type" checked>
                        <label class="form-check-label" for="public_type">
                            Público
                        </label>
                    </div>
                    <div class="form-check">
                        <input value="false" class="form-check-input" type="radio" name="visibility" id="private_type">
                        <label class="form-check-label" for="private_type">
                            Privado
                        </label>
                    </div>
                </div>

                <div class="col-md-12 mb-4 mt-2">

                    <label class="form-label" for="album_select">Selecionar Álbum:</label> 
                    
                    <div class="input-group">
                        <select id="album_select" name="album_select" class="form-select">
                            <option>Nenhum</option>
                            <?php
                                
                                $album_ctrl = new \classes\controler\AlbumControler($self_id);
                                $albuns = $album_ctrl->get_all_user_albuns($self_id);
                                
                                foreach ($albuns as $album){
                                    echo "<option value='".$album['id']."'>".$album['title']."</option>";
                                }
                            ?>
                        </select>              
                    </div> 
                    
                </div>

                <div class="col-md-12 mb-4">

                    <label class="form-label" for="playlist_select">Playlists:</label> 
                    
                    <div class="input-group">
                        <select id="playlist_select" name="playlist_select" class="form-select" disabled>
                            <option>Selecionar Playlists</option>
                        </select>
                    </div> 
                    
                </div>

            </div>
        
        
            <div id="step2">
                <h3 class="mb-4 text-center">Tags e Identificação</h3>

                <div class="col-md-12 mb-4 mt-2">
                    <label class="form-label" for="genre_select">Gênero/Estilo Musical:</label> 
                    
                    <div class="input-group">
                        <select id="genre_select" name="genre_select" class="form-select">
                        <option disabled selected>Escolher Gênero</option>
                        </select>
                        <div class="invalid-feedback" id="genre-message"></div>              
                    </div>    
                </div>

                <div class="col-md-12 mb-4 mt-2">
                    <label class="form-label" for="subgenre_select">Subgênero (Opcional):</label> 
                    
                    <div class="input-group">
                        <select id="subgenre_select" name="subgenre_select" class="form-select">
                            <option disabled selected>Escolher Subgênero</option>
                        </select>              
                    </div>    
                </div>

                <!--<div class="col-md-12 mb-4 mt-2">
                    <label class="form-label" for="key_select">Tom (Opcional):</label> 
                    
                    <div class="input-group">
                        <select id="key_select" name="key_select" class="form-select">
                            <option disabled selected>Escolher Tonalidade</option>
                            <option>A</option>
                            <option>Am</option>
                            <option>A#/Bb</option>
                            <option>A#m/Bbm</option>
                            <option>B</option>
                            <option>Bm</option>
                            <option>C</option>
                            <option>Cm</option>
                            <option>C#/Db</option>
                            <option>C#m/Dbm</option>
                            <option>D</option>
                            <option>Dm</option>
                            <option>D#/Eb</option>
                            <option>D#m/Ebm</option>
                            <option>E</option>
                            <option>Em</option>
                            <option>F</option>
                            <option>Fm</option>
                            <option>F#/Gb</option>
                            <option>F#m/Gbm</option>
                            <option>G</option>
                            <option>Gm</option>
                            <option>G#/Ab</option>
                            <option>G#m/Abm</option>
                        </select>              
                    </div>    
                </div>-->
                
                <div class="col-md-12 mb-4 mt-2">

                    <label class="form-label title d-flex" for="input-tags">
                        <i class="bi bi-tags-fill"></i>
                        <h5 class="ms-1">Tags (Opcional):</h5>
                    </label> 

                    <div class="wrapper">
                        <div class="content">
                            <p>Pressione entre ou adicione uma virgúla para adicionar uma tag.</p>
                            <ul><input id="input-tags" name="input-tags" type="text" spellcheck="false"></ul>
                        </div>
                        <div class="details">
                            <p><span>1000</span>/1000</p>
                            <button type="button">Remover tudo</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex mt-5">
                <a href="../actions/delete_actual_song_session.php?s=<?=$code_name?>" class="btn btn-danger me-auto">Cancelar</a>
                <button type="button" class="btn btn-secondary white-button text-white me-2" disabled id="back_button">Voltar</button>
                <button type="button" class="btn btn-info text-white" id="next_button">Próximo</button>
            </div>
        </div>

        <input type="hidden" name="song_code_name" value="<?=$code_name?>">
        
    </form>
</div>

<script src="../script/song_register_js.js"></script>