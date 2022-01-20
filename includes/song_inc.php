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
    <div class="p-1 my-3 mx-auto" style="max-width: 80%;">
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
                            <span id="page-add" class="material-icons play purple clickable" style="font-size: 60px;">add_circle</span>
                        </div>
                        <div>
                            <span id="page-play" class="material-icons play purple clickable" style="font-size: 60px;">play_circle</span>
                            <span id="page-pause" class="material-icons d-none play purple clickable" style="font-size: 60px;">pause_circle</span>
                        </div>

                    </div>

                </div>


                <div class="text-center">
                    <div id="like-controler" class="float-right">
                        <span id="like-false" class="material-icons purple clickable" style="font-size: 35px;">favorite_border</span>
                        <span id="like-true" class="material-icons purple clickable d-none" style="font-size: 35px;">favorite</span>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
<div class="container">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum accusantium pariatur tenetur, esse voluptatibus veniam expedita ab earum voluptatum vitae aperiam quidem ut eligendi, dolores cupiditate et. Ipsam, temporibus nulla!
    Repudiandae molestiae, ea enim accusamus ipsam consectetur inventore optio quae mollitia ab iure odit atque nesciunt tempora suscipit. Magnam, tenetur laborum esse iste cupiditate debitis at minus corrupti reprehenderit? Dicta.
    Placeat nam animi similique esse perspiciatis consequatur eaque fuga perferendis autem. Ad aliquid illum temporibus aut. Delectus quaerat molestiae optio, tempora sint minus ipsam debitis, eaque, sunt molestias cupiditate asperiores?
    Consectetur impedit vitae dicta quae maiores ullam maxime modi iure quos rerum nostrum, adipisci dolorem libero, iusto beatae eveniet? Praesentium et voluptate vero culpa architecto dignissimos rerum deserunt sunt alias.
    Ipsa obcaecati explicabo error dolor sint consequatur mollitia expedita nulla fuga, pariatur ab repudiandae voluptas eum odio corrupti perferendis praesentium unde quia laborum asperiores, illo tenetur minima consectetur repellendus! Error?
    Nihil cumque error quasi nobis expedita accusamus veritatis facere explicabo quos est praesentium optio suscipit qui aliquam hic assumenda, adipisci eligendi quo inventore. Placeat culpa ad porro assumenda, fugit tenetur.
    Similique ut libero reiciendis, excepturi, culpa dolorum ipsum velit est quo veniam voluptatum nostrum accusantium animi magnam aliquam ad ex eum debitis? Sunt tenetur, quod vero asperiores exercitationem officiis eligendi!
    Alias, sit dignissimos expedita itaque ipsum quae voluptatum facilis, quaerat id accusamus impedit ullam necessitatibus neque perspiciatis sint deserunt laudantium ex ducimus inventore hic tempora magnam, enim ea architecto! Aspernatur?
    Suscipit quam fugiat earum eaque in, sit officiis corrupti laboriosam doloremque dolore quod, nobis repellendus, magnam eius? Nihil ea aliquid laboriosam amet sunt iusto quasi, ratione nam voluptatem temporibus esse!
    Iste suscipit animi delectus, saepe velit ad deleniti, ipsum, eius odio sit qui voluptas omnis eos quos reprehenderit. Cupiditate culpa quidem molestias vero accusamus animi ipsa mollitia magnam eligendi atque.
</div>
<script src="../script/playerJs/pagePlayer.js"></script>