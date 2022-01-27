

<!-- include de edição de perfil do usuário -->
<div class="container pt-5">
    <!-- foto de perfil do usuário -->
            
    <div class="text-center mt-2">
        <!-- Formulário de edição de informações do usuário -->

        <form action="../actions/song_edit_action.php" method="post" id="edit_song_form"  enctype="multipart/form-data" class="needs validation no-ajaxy underline_input" novalidate autocomplete="off">
            <!-- Modal de visualização da foto de perfil -->

            <h1>Editar Música</h1>
            <fieldset class="mb-5">
                
                <h3>Informações Principais</h3>

                <div class="my-5 text-center is-invalid">

                    <button type="button" id="send_song_edit" name="send_song_edit" class="btn btn-dark bg-primary">Salvar alterações</button>
                    <div class="invalid-feedback" id="song_edit_message"></div> <!-- adiciona d-block para aparecer -->

                </div>

                <div class="text-center">
                    <div class="mt-4">
                        <label for="song_title_edit">Título:</label>
                        <h3>
                            <input class="text-center" value="<?=$song->get_title()?>" type="text" name="song_title_edit" id="song_title_edit" required>
                        </h3>
                    </div> 

                    <div class="mt-4 w-25 mx-auto">
                        <label class="form-label" for="album_select">Selecionar Álbum:</label> 
                            
                        <div class="input-group">
                            <select id="album_edit_select" name="album_edit_select" class="form-select text-center">
                                <?php
                                
                                    if($song->get_single()){
                                        echo "<option selected value='solo'>Solo</option>";
                                    }
                                    else{
                                        echo "<option value='solo'>Solo</option>";
                                    }
                                    
                                    foreach ($self_user->get_albuns() as $album){
                                        if($album['id'] == $song->get_album_id()){
                                            echo "<option selected value='".$album['id']."'>".$album['title']."</option>";
                                        }
                                        else{
                                            echo "<option value='".$album['id']."'>".$album['title']."</option>";
                                        }
                                    }
                                ?>
                            </select>              
                        </div> 

                        <div id="cover_edit">
                            <div>   
                                <img id="album_cover_edit_preview" class="mt-4" src=

                                <?php
                                    if($song->get_single()){
                                        echo $song->get_album_cover();
                                    }
                                    else{
                                        echo "../album_covers/default-cover-art.png";
                                    }
                                ?>
                                
                                
                                alt="" style="width: 210px;">
                            </div>

                            <div>  
                                <input type="file" name="inputCover_edit" id="inputCover_edit" accept="image/*">
                                <label
                                for="inputCover_edit" 
                                class="btn text-dark bg-primary rounded-circle mt-3" 
                                aria-expanded="false" >

                                    <span class="material-icons whiteIcon pt-1 pb-1">
                                        add_a_photo
                                    </span>

                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4 fs-5">
                        <label class="form-label">Visibilidade:</label>

                        <div>
                            <input
                            <?php

                                if($song->get_visibility() == 1){
                                    echo "checked";
                                }
                            
                            ?>
                            
                            value="true" class="form-check-input" type="radio" name="visibility_edit" id="public_type_edit">
                            <label class="form-check-label" for="public_type">
                                Público
                            </label>
                        </div>
                        <div>
                            <input

                            <?php

                                if($song->get_visibility() == 0){
                                    echo "checked";
                                }
                            
                            ?>
                            
                            value="false" class="form-check-input" type="radio" name="visibility_edit" id="private_type_edit">
                            <label class="form-check-label" for="private_type">
                                Privado
                            </label>
                        </div>
                    </div>
                </div>


                <div class="text-start mt-5 row">
                    <div class="pb-5 border-bottom border-4 border-primary">

                        <h2>Sobre:</h2>
                        
                        <article>
                            <div class="input-group">
                                <textarea rows="3" class="form-control" maxlength="5000" id="song_desc_edit" name="song_desc_edit" placeholder="Descrição da Música"><?=$song->get_about()?></textarea>
                            </div>
                        </article>
                    </div>
                </div>
            </fieldset>

            <fieldset class="mb-5 pb-5 border-bottom border-4 border-primary">
                <h3>Tags e Identificação</h3>

                <div class="w-50 mx-auto">

                <script>
                    <?php 

                        echo "genre = '".$song->get_genre()."'; ";
                        
                        if($song->get_subgenre()){
                            echo "subgenre = '".$song->get_subgenre()."'; ";
                        }
                        else {
                            echo "subgenre = null"."; ";
                        }

                        echo "console.log('isso vem primeiro');";
                        
                    
                    ?>
                </script>
                    <div class="mb-4 mt-2 w-50 mx-auto">
                        <label class="form-label" for="genre_edit">Gênero/Estilo Musical:</label> 
                        
                        <div class="input-group">
                            <select id="genre_edit" name="genre_edit" class="form-select">
                                <option disabled>Escolher Gênero</option>
                            </select>          
                        </div>    
                    </div>

                    <div class="mb-4 mt-2 w-50 mx-auto">
                        <label class="form-label" for="subgenre_edit">Subgênero (Opcional):</label> 
                        
                        <div class="input-group">
                            <select id="subgenre_edit" name="subgenre_edit" class="form-select">
                                <option disabled selected>Escolher Subgênero</option>
                            </select>              
                        </div>    
                    </div>

                    <div class="mb-4 mt-2 w-100">

                        <label class="form-label title d-flex" for="tags_edit">
                            <i class="bi bi-tags-fill"></i>
                            <h5 class="ms-1">Tags (Opcional):</h5>
                        </label> 

                        <div class="wrapper">
                            <div class="content">
                                <p>Pressione entre ou adicione uma virgúla para adicionar uma tag.</p>
                                <ul class="tags"><input id="tags_edit" name="tags_edit" type="text" spellcheck="false"></ul>
                            </div>
                            <div class="details">
                                <p><span>1000</span>/1000</p>
                                <button type="button">Remover tudo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="mb-5 pb-5 border-bottom border-4 border-primary">
                <h3>Detalhes</h3>

                <div class="w-50 mx-auto">
                    <div class="mb-4 mt-2">
                        <label class="form-label" for="key_select">Tom (Opcional):</label> 
                        
                        <div class="input-group">
                            <select id="key_select" name="key_select" class="form-select">
                                <option value="null" selected>Não definida</option>
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
                    </div>

                    <div class="mt-4 fs-5">
                        <label class="form-label">Tipo:</label>

                        <div class="d-flex">  
                            <input
                            
                            class="form-check-input" type="radio" name="song_type" id="not_defined_type_edit">
                            <label class="form-check-label ms-1" for="not_defined_type">
                                Não definido
                            </label>
                        </div>

                        <div class="d-flex">
                            <input class="form-check-input" type="radio" name="song_type" id="lyric_type_edit">
                            <label class="form-check-label ms-1" for="public_type">
                                Lírico
                            </label>
                        </div>

                        <div class="d-flex">
                            <input class="form-check-input" type="radio" name="song_type" id="intrumental_type_edit">
                            <label class="form-check-label ms-1" for="intrumental_type">
                                Instrumental
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="mb-5 pb-5 border-bottom border-4 border-primary">
                <h3>Links Externos</h3>
                
                <div class="mx-auto w-50">
                    <div class="mb-4 mt-2">

                        <i class="bi bi-youtube purple upload-icon d-block"></i>

                        <label for="youtube_link_upload">
                        Digite o link da música no Youtube:
                        </label>
                        <input class="full-input text-center" type="link" name="youtube_link_upload" id="youtube_link_upload">
                    </div>

                    <div class="mb-4 mt-2">

                        <i class="bi bi-spotify purple upload-icon d-block"></i>

                        <label for="spotify_link_upload">
                        Digite o link da música no spotify:
                        </label>
                        <input class="full-input text-center" type="link" name="spotify_link_upload" id="spotify_link_upload" aria-label="youtubeUpload" aria-describedby="user-addon userHelp" required>

                    </div>
                </div>           

            </fieldset>

            <input type="hidden" name="edit_song_codename" value=<?=$song->get_codename()?>>

        </form>

    </div>
</div>

<script src="../script/edit_song.js"></script>
