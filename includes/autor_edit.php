<div class="text-center">
    <img src="./images/Avatar_PlaceHolder.png" alt="Foto de Perfil" id="avIcon" class="rounded-circle border border-5 bi bi-person fs-2">
</div>

<!-- Modal -->


<div class="text-center mt-2">

    <form action="../actions/profile_img_act.php" method="POST">
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
                <button type="submit" class="btn btn-dark bg-primary">Save changes</button>
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
    <article>
        Página de edição de autor. Aqui você poderá editar seu perfil.
    </article>
</div>


<script src="../script/edit_profile_img.js"></script>