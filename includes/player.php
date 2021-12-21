<!-- PLAYER DE ÁUDIO - APENAS PARA TESTES -->
<div class="fixed-bottom" id="player">
    <div class="position-absolute bottom-0 end-0 me-3">

        <div class="modal-content shadow-lg">

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Music-box Player</h6>
                <button type="button" id="btn_close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <img class="rounded mx-auto d-block p-0" id="player-song-cover">

                <div id="descrição">
                    <h5 class="mt-2 mb-0" id="player-song-name">Sign of the Cross</h5>
                    <p class="text-secondary fst-italic mb-0" id="player-song-artist">Avantasia</p>
                </div>

            </div>
                    
            <div id="progress" class="py-1 mx-4" >
                <input type="range" min="0" max="1000" class="w-100" value="0" id="progress-bar">
            </input>
            </div>
            

            <div id="time" class="d-flex justify-content-between text-secondary mt-1 px-4">
                <p id="begin-time" class="mb-1">
                    0:00
                </p>
                <p id="end-time" class="mb-1">
                    0:00
                </p>
            </div>

            <div id="controler" class="d-flex justify-content-around align-items-center px-4 mb-3">
                <span class="material-icons skip purple" id="prev">
                    skip_previous
                </span>

                <span id="play" class="material-icons play purple">
                    play_circle
                </span>

                <span id="pause" class="material-icons d-none play purple">
                    pause_circle
                </span>

                <span class="material-icons skip purple" id="next">
                    skip_next
                </span>
            </div>

            <audio id="song"></audio>
        </div>

    </div>
</div>

<script src="../script/player.js"></script>
