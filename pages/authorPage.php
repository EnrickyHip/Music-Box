<?php
        #aqui deveria trazer o nome de usuário e nome artístico mas eu não sei fazer KKKKKKKK

        #eu sei relaxa

        $user = null;
        if(isset($_SESSION['usuario'])){
            $user = $_SESSION['usuario'];
            $username = $user['username'];
            }
    ?>

<div class="text-center">
    <img src="./images/Avatar_PlaceHolder.png" alt="Foto de Perfil" id="avIcon" class="rounded-circle border border-5">
</div>
<div class="text-center">
    <span><h3>Nome artístico</h3></span>
    <span><h5>@nome_de_usuário</h5></span>  
</div>
<div>
    <h2>Sobre o Autor:</h2>
    <article>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, velit deserunt? Similique officia ab numquam. Accusantium facere voluptatem consectetur obcaecati, unde ullam exercitationem fuga recusandae amet dolore aliquid. Hic, cum!
    </article>
</div>