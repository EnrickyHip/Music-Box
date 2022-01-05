<div class="container-xxl bg-primary border rounded-3 shadow p-3 col-lg-6">
    <h2 class="text-white text-center">Cadastrar música</h2>
    
    <form action="actions/signup_act.php" method="post" id="form" class="needs-validation bg-white border rounded-3 p-5" novalidate>
        
        <div class="containder row">
            <div id="step1">
                <h3 class="mb-4 text-center">Principais Informações</h3>

                <div class="col-md-12 mb-3">

                    <label class="form-label" for="seleted_file">Arquivo Selecionado:</label>  
                    <div class="input-group">
                        <input type="text" class="form-control" id="selected_file" value="<?=$song['name']?>" disabled>
                    </div> 

                </div>

                <div class="col-md-12 mb-3">

                    <label class="form-label" for="song_title">Título:</label>  
                    <div class="input-group">
                        <input type="text" maxlength="100" class="form-control" id="song_title" placeholder="Título da Música" required>
                    </div> 
                    
                </div>

                <div class="col-md-12 mb-3">

                    <label class="form-label" for="song_desc">Descrição (Opcional):</label>  
                    <div class="input-group">
                        <textarea rows="3" class="form-control" maxlength="5000" id="song_desc" placeholder="Descrição da Música"></textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-3 mt-2">

                    <label class="form-label" for="album_select">Selecionar Álbum:</label> 
                    
                    <div class="input-group">
                        <select id="album_select" class="form-select">
                            <option>Solo</option>
                        </select>              
                    </div> 
                    
                </div>

                <div class="col-md-12 mb-3">

                    <label class="form-label" for="playlist_select">Playlists:</label> 
                    
                    <div class="input-group">
                        <select id="playlist_select" class="form-select" disabled>
                            <option>Selecionar Playlists</option>
                        </select>
                    </div> 
                    
                </div>

            </div>
        
        
            <div id="step2">
                <h3 class="mb-4 text-center">Tags e Identificação</h3>

                <div class="col-md-12 mb-3 mt-2">
                    <label class="form-label" for="genre_select">Gênero/Estilo Musical:</label> 
                    
                    <div class="input-group">
                        <select id="genre_select" class="form-select">
                        <option disabled selected>Escolher Gênero</option>
                        </select>              
                    </div>    
                </div>

                <div class="col-md-12 mb-3 mt-2">
                    <label class="form-label" for="subgenre_select">Subgênero (Opcional):</label> 
                    
                    <div class="input-group">
                        <select id="subgenre_select" class="form-select">
                            <option disabled selected>Escolher Subgênero</option>
                        </select>              
                    </div>    
                </div>

            </div>

            <div class="d-flex mt-5">
                <a href="../" class="btn btn-danger me-auto">Cancelar</a>
                <button type="button" class="btn btn-secondary white-button text-white me-2" disabled id="back_button">Voltar</button>
                <button type="button" class="btn btn-info text-white" id="next_button">Próximo</button>
            </div>
        </div>

    </form>
</div>

<script src="../script/song_register_js.js"></script>