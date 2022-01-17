<?php

?>
<div class="container mt-5">
    <div class="d-flex">
        <img src="../profile_img/Avatar_PlaceHolder.png" alt="" class="rounded-circle float-start" style="width: 48px; height: 48px;">

        <div class="float-end ms-3">
            <h6 class="mb-0">Postado por:</h6>
            <span>Nome do autor da musica</span>
        </div>
    </div>
    <div class="p-1 my-3 mx-auto" style="max-width: 80%;"> 
        <div class="row g-0">
            <div class="col-10">
                <div class="py-1">
                    <div class="text-center">
                        <h5 class="mb-0">Nome Da musica</h5>
                        <small>Album</small>
                    </div>
                    <div class="d-flex">
                        <div class="d-flex w-25 ms-3 me-auto" id="page-volume">
                            <span class="material-icons purple fs-5 clickable" id="page-volume-up">volume_up</span>
                            <span class="material-icons purple d-none fs-5 clickable" id="page-volume-down">volume_down</span>
                            <span class="material-icons purple d-none fs-5 clickable" id="page-volume-off">volume_off</span>
                            <input type="range" min="0" max="100" class="ms-2 mt-2 clickable w-100" value="100" id="page-volume-bar">
                        </div>
                        <div id="like-controler" class="float-right">
                            <span id="like-false" class="material-icons purple clickable">favorite_border</span>
                            <span id="like-true" class="material-icons purple clickable d-none">favorite</span>
                        </div>
                    </div>
                    
                    <div class="d-flex" id="page-player">                
                        <div id="controlador-page" class="py-1 d-flex">
                            <div>
                                <span id="page-add" class="material-icons play purple clickable">add_circle</span>
                            </div>
                            <div>
                                <span id="page-play" class="material-icons play purple clickable">play_circle</span>
                                <span id="page-pause" class="material-icons d-none play purple clickable">pause_circle</span>
                            </div>  
                            
                        </div>
                        <div class="w-100">
                            <div id="page-progress" class="py-1 ms-2">
                                <input type="range" min="0" max="1000" class="clickable mt-3" value="0" id="page-progress-bar">
                            </div>
                            <div id="page-time" class="d-flex justify-content-between text-secondary mt-1 mx-2">
                                <p id="begin-page-time" class="mb-1">0:00</p>
                                <p id="end-page-time" class="mb-1">0:00</p>
                            </div>
                        </div>
                          
                    </div>
                </div>
            </div>
            <div class="col-2">
                <img src="../album_covers/666.jpg" alt="" style="width: 128px;" class="float-end">
            </div>
        </div>
    </div>
    <div>
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
</div>
<script src="../script/playerJs/pagePlayer.js"></script>