<!-- include de edição de perfil do usuário -->

<!-- foto de perfil do usuário -->

        
<div class="text-center">
    <img src=<?php echo $self_profile_img ?> alt="Foto de Perfil" id="avIcon" class="rounded-circle border border-4 bi bi-person fs-2">
</div>

<div class="text-center mt-2">

    <!-- formulário da foto de perfil -->

    <form action="../actions/profile_img_act.php" method="POST" enctype="multipart/form-data">
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

        <div class="modal fade" id="imgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar Foto de Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="image-preview">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="send_profile_img" class="btn btn-dark bg-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </form>

    <!-- Formulário de edição de informações do usuário -->

    <form id="edit_profile_form" action="../actions/update_user_act.php" method="post" class="needs validation" novalidate autocomplete="off">

        <div>
            <label for="art_name">Nome artístico:</label>
            <h3>
                <input value="<?php echo $self_art_name;?>" type="text" name="art_name" id="art_name" required>
            </h3>
        </div> 

        <div>
            <label for="username">Nome de usuário:</label>
            <h5>
                <input value="<?php echo $self_username; ?>" type="text" name="username" id="username" required>
            </h5>
        <div>

        <div class="text-start mt-5 row">
            <div class="pb-5 border-bottom border-4 border-primary">
                
            <h2>Biografia:</h2>
                <article>
                    <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="Fale sobre você e seu trabalho!"><?php echo $art_bio; ?></textarea>

                    <div class="mt-2">
                        <label for="website">Website (Opcional):</label>
                        <h5>
                            <input class="text-start full-input" value="<?php echo $art_website; ?>" type="url" name="website" id="website">
                        </h5>
                    <div>

                    <div class="mt-2">
                        <label for="local">Localização (Opcional):</label>
                        <h5>
                            <input class="text-start full-input" value="<?php echo $art_local; ?>" type="text" name="local" id="local">
                        </h5>
                    <div>

                </article>

                <div class="mt-5 text-end is-invalid">

                    <a href=<?php echo "?p=autor&a=$self_username" ?> type="button" class="btn btn-danger">Voltar</a>
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

<script src="../script/edit_profile_img.js"></script>
<script src="../script/edit_user.js"></script>