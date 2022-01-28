//declaração de variáveis


const play = document.getElementById("play")
const pause = document.getElementById("pause")
const prev = document.getElementById("prev")
const next = document.getElementById("next")
const player = document.getElementById("player")
const progress_bar = document.getElementById("progress-bar")
const volume_bar = document.getElementById("volume-bar")
const progress = document.querySelector("#progress")
const time = document.getElementById("begin-time")
const end_time = document.getElementById("end-time")
const song_cover = document.getElementById("player-song-cover")
const song_name = document.getElementById("player-song-name")
const song_artist = document.getElementById("player-song-artist")
const expand_less_button = document.getElementById("player-expand-less")
const expand_more_button = document.getElementById("player-expand-more")
const volume_up = document.getElementById("volume_up")
const volume_off = document.getElementById("volume_off")
const volume_down = document.getElementById("volume_down")
const player_volume = document.getElementById("player_volume")
const close_btn = document.getElementById("player_btn_close")
const modal_body = document.getElementById("modal-body-player")
const litle_pause_button = document.getElementById("litle_stop_button")
const litle_play_button = document.getElementById("litle_play_button")
const player_title = document.getElementById("player-title")

volume_icons = [volume_up, volume_off, volume_down]

/*EVENTOS*/

play.addEventListener("click", function(){
    song_play()
})

litle_play_button.addEventListener("click", function(){
    song_play()
})


pause.addEventListener("click", function(){
    song_pause()
})

litle_pause_button.addEventListener("click", function(){
    song_pause()
})

prev.addEventListener("click", function(){ //botão para para a música anterior
    prev_song(play, pause)
}) 

next.addEventListener("click", function(){ //botão para para a música seguinte
    next_song(play, pause)
})

close_btn.addEventListener("click", function(){
    close_player()
})

song.addEventListener("timeupdate", function(){ //esse evento identifica o progresso da música para alterar o barra de progresso
    timeUpdate(progress_bar, end_time)
})

song.addEventListener("ended", function(){ //identifica se a música terminou
    next_song()
})

progress_bar.addEventListener('input', function (){ //identifica se o usuário clicou na barra de progresso
    holding = true;
});

progress_bar.addEventListener('mouseup', function (){ //identifica se usuário soltou o botão do mouse 
    holding = false;
});

progress_bar.oninput = function(){ //identifica se o usuário está alterando a barra de progresso manualmente
    progressUpdate(progress_bar, time)
}

volume_bar.oninput = function(){ //identifica se o usuário está alterando a barra de volume manualmente
    progressUpdate(volume_bar)
    changeVolume(volume_bar, volume_icons)
}

progress_bar.addEventListener("change", function(){ //identifica se a barra de progresso está sendo alterada, seja manualmente ou não.
    changeDuration(progress_bar)
})

expand_less_button.addEventListener("click", function(){
    expand_less()
})

expand_more_button.addEventListener("click", function(){
    expand_more()
})

volume_icons.forEach(element =>{
    element.addEventListener('mouseover', e =>{
        volume_show(volume_bar)
       })
})

player_volume.addEventListener('mouseleave', e =>{
    volume_hide(volume_bar)
    })