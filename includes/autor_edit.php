<!-- include de edição de perfil do usuário -->
<div class="container pt-5">
    <!-- foto de perfil do usuário -->
            
    <div class="text-center">
        <img src='<?=$self_profile_img?>' alt="Foto de Perfil" id="avIcon" class="image-preview rounded-circle border border-4 bi bi-person fs-2">
    </div>



    <div class="text-center mt-2">
        <!-- Formulário de edição de informações do usuário -->

        <form action="../actions/update_user_act.php" method="post" id="edit_profile_form"  enctype="multipart/form-data" class="needs validation no-ajaxy underline_input" novalidate autocomplete="off">

        <input type="file" name="inputFile" id="inputFile" accept="image/*">
            <label
            for="inputFile" 
            class="btn text-dark bg-primary rounded-circle" 
            aria-expanded="false" >

                <span class="material-icons whiteIcon pt-1 pb-1">
                    add_a_photo
                </span>

            </label>

            <!-- Modal de visualização da foto de perfil -->

            <div>
                <label for="art_name">Nome artístico:</label>
                <h3>
                    <input class="text-center" value="<?=$self_art_name;?>" type="text" name="art_name" id="art_name" required>
                </h3>
            </div> 

            <div>
                <label for="username">Nome de usuário:</label>
                <h5>
                    <input class="text-center" value="<?=$self_username; ?>" type="text" name="username" id="username" required>
                </h5>
            <div>

            <div class="text-start mt-5 row">
                <div class="pb-5 border-bottom border-4 border-primary">
                    
                <h2>Biografia:</h2>
                    <article>
                        <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="Fale sobre você e seu trabalho!"><?=$art_bio; ?></textarea>

                        <div class="mt-2">
                            <label for="website">Website (Opcional):</label>
                            <h5>
                                <input class="full-input" value="<?=$art_website; ?>" type="url" name="website" id="website">
                            </h5>
                        <div>

                        <div class="mt-2">
                            <label for="local">Localização (Opcional):</label>
                            <h5>
                                <input class="full-input" value="<?=$art_local; ?>" type="text" name="local" id="local">
                            </h5>
                        <div>

                    </article>

                    <div class="mt-5 text-end is-invalid">

                        <a href=<?="?p=autor&a=$self_username" ?> type="button" class="btn btn-danger">Voltar</a>
                        <button type="submit" name="send_profile_info" class="btn btn-dark bg-primary">Salvar alterações</button>
                        <div class="invalid-feedback" id="edit_user_message"></div> <!-- adiciona d-block para aparecer -->
                    </div>

                </div>
            </div>
        </form>



    </div>
    <div>

        <h3 class="mt-5">Material Postado:</h3>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Artigo/Musica</td>
                    <td class="text-end">Categoria</td>
                    <td class="text-end">DD/MM/AAAA</td>
                </tr>
                <tr>
                    <td>Artigo/Musica</td>
                    <td class="text-end">Categoria</td>
                    <td class="text-end">DD/MM/AAAA</td>
                </tr>
                <tr>
                    <td>Artigo/Musica</td>
                    <td class="text-end">Categoria</td>
                    <td class="text-end">DD/MM/AAAA</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script src="../script/edit_profile_img.js"></script>
<script src="../script/edit_user.js"></script>