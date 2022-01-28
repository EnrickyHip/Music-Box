<div class="container mt-5">
    <div class="d-flex">
        <a href=<?= "?p=autor&a=".$song->get_autor_username() ?> class="text-decoration-none link-dark">
            <img src=<?= $song->get_autor_profile_img() ?> alt="" class="rounded-circle float-start" style="width: 55px;">

            <div class="float-end ms-3">
                <h5 class="mb-0">Postado por:</h5>
                <span><?= $song->get_autor_name() ?></span>
            </div>
        </a>
    </div>
    <div class="p-1 my-4 mx-auto" style="max-width: 80%;">
        <div class="g-0">

            <div class="py-1">

                <div class="text-center mb-2">
                    <h4 class="mb-1"><?= $song->get_title() ?></h4>
                    <span><?= $song->get_album_title() ?></span>
                </div>
                
                <div>
                    <div class="text-center">
                        <img src=<?= $song->get_album_cover() ?>  alt="" style="width: 240px;">
                    </div>
                </div>
                


                <div class="text-center">
                    <div id="controlador-page" class="py-1 d-inline-flex">
                        <div>
                            <span codename=<?=$song->get_codename()?> class="material-icons play purple clickable page-add" style="font-size: 60px;">add_circle</span>
                        </div>
                        <div>
                            <span codename=<?=$song->get_codename()?> class="material-icons play purple clickable page-play" style="font-size: 60px;">play_circle</span>
                
                        </div>

                    </div>

                </div>


                <div class="text-center">
                    <div id="like-controler" class="float-right">
                        <span id="like-false" class="material-icons purple clickable" style="font-size: 35px;">favorite_border</span>
                        <span id="like-true" class="material-icons purple clickable d-none" style="font-size: 35px;">favorite</span>
                    </div>
                </div>

                <div class="text-center mt-2">
                    <?php
                        if(isset($self_user)){
                            if ($self_user->get_username()  == $song->get_autor_username()){
                
                                ?>  
                                    <a  class="btn btn-success" href= <?= "?p=song&s=".$song->get_codename()."&e=true";?>>Editar Música</a>
                                <?php
                            }
                        }
                    ?>
                </div>




            </div>
        </div>
    </div>

    <div class="my-5">
        <?php
            if($song->get_about()){
        ?>

        <div class="mb-5 container text-center w-75 mx-auto">
            <p>
                <?=$song->get_about()?>
            </p>
        </div>

        <?php
            }
        ?>  
        
        <span class="fs-5">
            <strong>Gênero/Estilo:</strong>
            <?=$song->get_genre()?>
        </span>
        <br>
        <span class="fs-5">
            <strong>Subgênero:</strong>
            <?php
                if(!$song->get_subgenre()){
                    echo "Não definido";
                }
                else {
                    echo $song->get_subgenre();
                }
            ?>
        </span>
        <br>
        <span class="fs-5">
            <strong>Tipo:</strong>
            <?php
                if(!$song->get_type()){
                    echo "Não definido";
                }
                else {
                    echo $song->get_type();
                }
            ?>
        </span>
        <br>
        <span class="fs-5">
            <strong>Tonalidade:</strong>
            <?php
                if(!$song->get_key()){
                    echo "Não definido";
                }
                else {
                    echo $song->get_key();
                }
            ?>
        </span>

    </div>
</div>