<!-- PLAYER DE ÁUDIO - APENAS PARA TESTES -->
<div class="fixed-bottom" id="player">
    <div class="position-absolute bottom-0 end-0 me-3">

        <div class="modal-content shadow-lg">

            <div class="modal-header py-2 pe-2">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="material-icons play purple clickable me-1 d-none" id="litle_play_button">
                        play_circle
                    </span>
                    <span class="material-icons play purple clickable me-1 d-none" id="litle_stop_button">
                        pause_circle
                    </span>

                    <h6 class="modal-title" id="player-title">Music-box Player</h6>
                </div>

                <div class="d-flex justify-content-end">
                    <span class="material-icons text-secondary fs-2 clickable black-hover" id="player-expand-less"> <!-- aqui está expand less, mas é isto mesmo. é ao contrário. -->
                        expand_more 
                    </span>
                    <span class="material-icons text-secondary fs-2 clickable d-none black-hover" id="player-expand-more">
                        expand_less
                    </span>
                    
                    <button type="button" id="player_btn_close" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <div class="modal-body pb-0" id="modal-body-player">

                <img class="rounded mx-auto d-block p-0 mb-2" id="player-song-cover">

                <div id="descrição">
                    <h5 class="mb-0" id="player-song-name">Sign of the Cross</h5>
                    <p class="text-secondary fst-italic mb-0" id="player-song-artist">Avantasia</p>

                    <div class="d-flex align-item-center mt-1 mb-3 w-50" id="player_volume">
                        <span class="material-icons purple fs-5 clickable" id="volume_up">
                            volume_up
                        </span>
                        <span class="material-icons purple d-none fs-5 clickable" id="volume_down">
                            volume_down
                        </span>
                        <span class="material-icons purple d-none fs-5 clickable" id="volume_off">
                            volume_off
                        </span>
                        <input type="range" min="0" max="100" class="ms-2 mt-2 clickable d-none w-100" value="100" id="volume-bar">
                    </div>
                </div>

                    
                <div id="progress" class="py-1 mx-2" >
                    <input type="range" min="0" max="1000" class="w-100 clickable" value="0" id="progress-bar"></input>
                </div>
                
                <div id="time" class="d-flex justify-content-between text-secondary mt-1 mx-2">
                    <p id="begin-time" class="mb-1">
                        0:00
                    </p>
                    <p id="end-time" class="mb-1">
                        0:00
                    </p>
                </div>

                <div id="controler" class="d-flex justify-content-around align-items-center mb-3">
                    <span class="material-icons skip purple" id="prev">
                        skip_previous
                    </span>

                    <span id="play" class="material-icons play purple clickable">
                        play_circle
                    </span>

                    <span id="pause" class="material-icons d-none play purple clickable">
                        pause_circle
                    </span>

                    <span class="material-icons skip purple clickable" id="next">
                        skip_next
                    </span>
                </div>
            </div>
        </div>  
    </div>
</div>

<audio id="song"></audio>

<script src="../script/player.js"></script>
