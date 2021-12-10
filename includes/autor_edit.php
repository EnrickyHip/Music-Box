<!-- include de edição de perfil do usuário -->

<!-- foto de perfil do usuário -->
<div class="text-center">
    <img src=<?php echo $self_profile_img ?> alt="Foto de Perfil" id="avIcon" class="rounded-circle border border-5 bi bi-person fs-2">
</div>

<!-- Modal de visualização da foto de perfil -->

<div class="text-center mt-2">

    <form action="../actions/profile_img_act.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="inputFile" id="inputFile" accept="image/*">
        <label
        for="inputFile" 
        class="btn text-dark bg-primary rounded-circle" 
        aria-expanded="false" >

            <span class="material-icons whiteIcon pt-1">
                add_a_photo
            </span>

        </label>

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

    <span><h3><?php echo $self_art_name?></h3></span>
    <span><h5><?php echo $self_username?></h5></span>  

</div>
<div>

    <h2>Edição de autor:</h2>
    <article class="pb-5 border-bottom border-4 border-primary">
        <textarea class="form-control" name="autor_text" id="" rows="3" placeholder="Fale sobre você e seu trabalho!"></textarea>
    </article>

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