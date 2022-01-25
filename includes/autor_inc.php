<!-- include padrão da página de autor do usuário -->
<div class="container pt-5">
    <!-- foto de perfil do usuário -->
    <div class="text-center">

        <img src=<?= $autor->get_profile_img() ?> alt="Foto de Perfil" id="avIcon" class="rounded-circle border border-4">
    </div>

    <div class="text-center">

        <span><h2><?= $autor->get_art_name()?></h2></span>
        <span><h5><?= $autor->get_username()?></h5></span>  

        <!-- caso a página do autor, seja a a página do usuário logado, aparecerá um botão para habilitar a edição da página-->

        <?php
            if(isset($self_user)){
                if ($self_user->get_username()  == $autor->get_username()){
    
                    ?>  
                        <a  class="btn btn-success" href= <?= "?p=autor&a=".$self_user->get_username() ."&e=true";?>>Editar página de Autor</a>
                    <?php
                }
            }
        ?>

    </div>
    <div>

        <?php   
            if ($autor->get_bio() !== null){
        ?>

            <h2>Sobre o Autor:</h2>

            <article class="pb-5 border-bottom border-4 border-primary">

            <?=$autor->get_bio()?>
            <br>

            <?php
                if ($autor->get_local() !== null){
            ?>

                <br> 
                <span class="material-icons">
                    place
                </span>
                <?=$autor->get_local()?>

            <?php
                }
            ?>

            <?php
                if ($autor->get_website() !== null){
            ?>

                <br>
                <span class="material-icons">
                    link
                </span>

                <a class="classic-links" href="<?=$autor->get_website()?>"> 
                    <?=$autor->get_website()?> 
                </a>

            <?php
                }
            ?>
        
            </article>
            
        <?php
            }
        ?>


        <nav class="mt-5 ms-2">
            <div class="nav nav-tabs" id="nav-tab" role="tablist" style="z-index: 0;">

                <button class="nav-link active" id="nav-album-tab" data-bs-toggle="tab" data-bs-target="#nav-album" type="button" role="tab" aria-controls="nav-album" aria-selected="true">Albuns</button>

                <button class="nav-link" id="nav-musicas-tab" data-bs-toggle="tab" data-bs-target="#nav-musicas" type="button" role="tab" aria-controls="nav-musicas" aria-selected="false">Musicas</button>

                <button class="nav-link" id="nav-playlist-tab" data-bs-toggle="tab" data-bs-target="#nav-playlist" type="button" role="tab" aria-controls="nav-playlist" 
                aria-selected="true">Playlists</button>

                <button class="nav-link" id="nav-contrib-tab" data-bs-toggle="tab" data-bs-target="#nav-contrib" type="button" role="tab" aria-controls="nav-contrib" aria-selected="false">Contribuições</button>
            </div>
        </nav>

        <div class="tab-content border border-5 border-primary rounded shadow" id="nav-tabContent" style="z-index: 1;">

            <div class="tab-pane show active" id="nav-album" role="tabpanel" aria-label="nav-album-tab">
            <?php
                if($albuns == false){
                    echo '<h2 class="text-muted ms-5 my-5">Não há nada aqui :(</h2>';
                } else{
                    echo '<div class="d-flex flex-wrap">';
                    foreach($albuns as $album){
                        
                        $albunCardModel = 
                    "<div class='card m-1'>
                        <img src='$album[cover_dir]' class='card-img rounded coverAPage'>
                        <div class='card-img-overlay d-flex flex-column album-overlay'>
                            <h5 class='text-white'>$album[title]</h5>
                            <div class='text-end mt-auto'>
                                <span id='page-add' class='material-icons play text-white clickable' style='font-size: 60px;'>add</span>
                                <span id='author-play' class='material-icons play text-white clickable' style='font-size: 60px;'>play_arrow</span>
                            </div>
                        </div>
                    </div>"; 
                    echo $albunCardModel;
                    }
                    echo '</div>';
                }
            
            ?>

                <!-- <h2 class="text-muted ms-5 my-5">Não há nada aqui :(</h2> 
                <div class="d-flex flex-wrap">
                    <div class="card m-1">
                        <img src="../album_covers/666.jpg" class="card-img rounded coverAPage">
                        <div class="card-img-overlay d-flex flex-column album-overlay">
                            <h5 class="text-white">Nome do Album</h5>
                            <div class="text-end mt-auto">
                                <span id="page-add" class="material-icons play text-white clickable" style="font-size: 60px;">add</span>
                                <span id="author-play" class="material-icons play text-white clickable" style="font-size: 60px;">play_arrow</span>
                            </div>
                        </div>
                    </div>
                    <div class="card m-1">
                        <img src="../album_covers/666.jpg" class="card-img rounded coverAPage">
                        <div class="card-img-overlay d-flex flex-column album-overlay">
                            <h5 class="text-white">Nome do Album</h5>
                            <div class="text-end mt-auto">
                                <span id="page-add" class="material-icons play text-white clickable" style="font-size: 60px;">add</span>
                                <span id="author-play" class="material-icons play text-white clickable" style="font-size: 60px;">play_arrow</span>
                            </div>
                        </div>
                    </div><div class="card m-1">
                        <img src="../album_covers/666.jpg" class="card-img rounded coverAPage">
                        <div class="card-img-overlay d-flex flex-column album-overlay">
                            <h5 class="text-white">Nome do Album</h5>
                            <div class="text-end mt-auto">
                                <span id="page-add" class="material-icons play text-white clickable" style="font-size: 60px;">add</span>
                                <span id="author-play" class="material-icons play text-white clickable" style="font-size: 60px;">play_arrow</span>
                            </div>
                        </div>
                    </div>
                </div>
        -->
            </div>
            
            <div class="tab-pane show" id="nav-playlist" role="tabpanel" aria-label="nav-playlist-tab">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">título</th>
                            <th scope="col" class="text-end">atualizado</th>
                            <th scope="col" class="text-end">duração</th>
                        </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <th>Nome</th>
                            <th class="text-end">DD/MM/AAAA</th>
                            <th class="text-end">Mn:Sg</th>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <th>Nome</th>
                            <th class="text-end">DD/MM/AAAA</th>
                            <th class="text-end">Mn:Sg</th>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <th>Nome</th>
                            <th class="text-end">DD/MM/AAAA</th>
                            <th class="text-end">Mn:Sg</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show" id="nav-musicas" role="tabpanel" aria-label="nav-musicas-tab">
                <?php
                if($songs == false){
                    echo '<h2 class="text-muted ms-5 my-5">Não há nada aqui :(</h2>';
                }else{
                    echo 
                    '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">título</th>
                            <th scope="col" class="text-end">duração</th>
                        </tr>  
                    </thead>
                    <tbody>';

                    foreach($songs as $song){
                        echo"<tr>
                        <th scope='row'>1</th>
                        <th>$song[title]</th>
                        <th class='text-end'>Mn:Sg</th>
                    </tr>";
                    }

                    echo '</tbody>
                    </table>';
                }
                
                ?>
                <!--
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">título</th>
                            <th scope="col" class="text-end">duração</th>
                        </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <th>Nome</th>
                            <th class="text-end">Mn:Sg</th>
                        </tr>
                        
                        <tr>
                            <th scope="row">2</th>
                            <th>Nome</th>
                            <th class="text-end">Mn:Sg</th>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <th>Nome</th>
                            <th class="text-end">Mn:Sg</th>
                        </tr>
                    </tbody>
                </table>
            -->
            </div>
            <div class="tab-pane show" id="nav-contrib" role="tabpanel" aria-label="nav-contrib-tab">
                <h2 class="text-muted ms-5 my-5">Não há nada aqui :(</h2>
            </div>
        </div>
    </div>
</div>
