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
    <article class="pb-5 border-bottom border-4 border-primary">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, velit deserunt? Similique officia ab numquam. Accusantium facere voluptatem consectetur obcaecati, unde ullam exercitationem fuga recusandae amet dolore aliquid. Hic, cum!
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi ex quo et eveniet ipsum quos dolor voluptates corrupti ab quibusdam omnis hic ad nihil odio, necessitatibus, neque accusantium quidem cum!
        Ipsam, vero? Aliquam veritatis ab hic repellat quaerat quis amet eveniet dolor. Provident, optio suscipit similique earum aspernatur iusto vitae fugiat incidunt? Dolores ex nesciunt illo error, doloribus aspernatur consequatur?
        At, aliquid nulla error, ex eum labore soluta commodi perspiciatis officia exercitationem consequatur incidunt. Molestias accusantium, eum pariatur nisi, consequuntur quo distinctio quas in labore cum porro, deserunt iusto deleniti!
        Autem ratione ullam architecto porro temporibus ipsum maxime voluptas voluptates dolorem enim hic dolorum dicta distinctio tempore corporis itaque nam delectus saepe et unde, veritatis eveniet fugit? Sequi, asperiores itaque!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, neque, omnis optio non fuga possimus dolor nemo ducimus mollitia magni est eligendi amet nulla autem et commodi magnam sapiente consectetur.
        Illo pariatur eaque commodi beatae dignissimos iure? Quidem iste soluta aspernatur omnis, quas esse adipisci reprehenderit voluptas ipsum illo, molestias ducimus consequatur modi qui? Voluptatibus error hic incidunt aperiam quam?
        Beatae nesciunt laborum ad omnis possimus quaerat blanditiis nemo odio iste voluptates praesentium dolores, quasi autem eligendi! Repudiandae voluptatem repellendus labore voluptatum ratione esse corporis, architecto porro, omnis optio ea.
        Temporibus, commodi in? Nobis explicabo quos corporis dolor similique quo dicta alias qui, nostrum dignissimos modi facilis fugiat doloribus accusamus quasi aliquid iste ipsam tempora saepe voluptates corrupti unde officia!
        Laboriosam ducimus maiores minus quod obcaecati itaque laborum cupiditate, consequuntur, officiis consectetur vero, id reiciendis nesciunt nostrum quaerat assumenda quisquam incidunt expedita corrupti ullam provident esse architecto? Vero, ipsum? Praesentium.
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