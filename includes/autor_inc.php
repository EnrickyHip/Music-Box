<!-- include padrão da página de autor do usuário -->

<!-- foto de perfil do usuário -->
<div class="text-center">
    <img src=<?php echo $autor_profile_img ?> alt="Foto de Perfil" id="avIcon" class="rounded-circle border border-5">
</div>

<div class="text-center">

    <span><h3>Nome artístico</h3></span>
    <span><h5><?php echo $username_autor?></h5></span>  

    <!-- caso a página do autor, seja a a página do usuário logado, aparecerá um botão para habilitar a edição da página-->

    <?php
        if(isset($self_username)){
            if ($self_username == $username_autor){
                ?>  
                    <a  class="btn btn-success" href= <?php echo "?p=autor&a=$self_username&e=true";?>>Editar página de Autor</a>
                <?php
            }
        }
    ?>

    

</div>
<div>
    <h2>Sobre o Autor:</h2>
    <article>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, velit deserunt? Similique officia ab numquam. Accusantium facere voluptatem consectetur obcaecati, unde ullam exercitationem fuga recusandae amet dolore aliquid. Hic, cum!
    </article>
</div>