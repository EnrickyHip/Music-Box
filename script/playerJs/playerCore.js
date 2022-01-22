let songs = [//Lista de músicas

    /*{
      title: "Sign of the Cross",
        artist: "Avantasia",
        src: "../songs/sign-of-the-cross.mp3",
        cover: "../album_covers/The_Metal_Opera.jpg",
        code_name: '1'
    },

    {
        title: "Darts",
        artist: "System of a Down",
        src: "../songs/darts.mp3",
        cover: "../album_covers/System_of_a_down.jpg",
        code_name: '2'
    },

    {
        title: "M.I.A",
        artist: "Avenged Sevenfold",
        src: "../songs/MIA.mp3",
        cover: "../album_covers/City_of_Evil_album_cover.jpg",
        code_name: '3'
    },

    {
        title: "Lost in the Static",
        artist: "After the Burial",
        src: "../songs/lost-in-the-static.mp3",
        cover: "../album_covers/ab67616d0000b273ee1ce5c92d708957395abdeb.jpg",
        code_name: '4'
    },

    {
        title: "Hallowed Be Thy Name",
        artist: "Iron Maiden",
        src: "../songs/hallowed-be-thy-name.mp3",
        cover: "../album_covers/666.jpg",
        code_name: '5'
    },

    {
        title: "Sickening",
        artist: "Meshuggah",
        src: "../songs/sickening.mp3",
        cover: "../album_covers/R-1673713-1236027023.jpeg.jpg",
        code_name: '6'
    },

    {
        title: "The Looking Glass",
        artist: "Avantasia",
        src: "../songs/the-looking-glass.mp3",
        cover: "../album_covers/AvantasiaTheMetalOpera1304_f.jpg",
        code_name: '7'
    }*/
]

get_session()

const song = document.getElementById("song")

let list_index = 0 //index da lista
let holding = false //este holding refere-se a barra de progresso do player, se o usuário está segurando o clique em algum ponto dela ela, vai estar true
let player_stage = 0 // estágio do player, 0 para inteiro, 1 para remover a capa, e 2 para o player mínimo
let playing = false

function load_song(){ //carrega a música
    if (list_index == 0){
        grayIcon(prev)
    }
    else {
        PurpleIcon(prev)
    }

    if (list_index >= songs.length-1){
        grayIcon(next)
    }
    else {
        PurpleIcon(next)
    }

    update_index()

    song.setAttribute("src", songs[list_index].src)

    song.addEventListener("loadeddata", function(){
        load_data()
    })
}

function load_data(){ // carrega as informações da música
    song_cover.setAttribute("src", songs[list_index].cover)
    song_name.textContent = songs[list_index].title
    song_artist.textContent = songs[list_index].artist
    end_time.textContent = secForMinute(Math.floor(song.duration))
}

function get_session(){
    check = true

    $.ajax({
        url:"../actions/get_player_session.php",
        method: "POST",
        data:{check:check},
        success: (function(result){
            set_session(result)
        })
      })
}

function set_session(list){
    songs = JSON.parse(list)['songs']
    list_index = JSON.parse(list)['index']
    player_stage = JSON.parse(list)['stage']
}

function update_session(){
    song_json = JSON.stringify(songs)

    $.ajax({
        url:"../actions/set_player_session.php",
        method: "POST",
        data:{songs:song_json},
        success: (function(result){
        })
      }) 
}

function update_index(){

    $.ajax({
        url:"../actions/set_player_index.php",
        method: "POST",
        data:{index:list_index},
        success: (function(result){
        })
      }) 
}

function update_stage_session(){
    $.ajax({
        url:"../actions/set_player_stage.php",
        method: "POST",
        data:{stage:player_stage},
        success: (function(result){
        })
      }) 
}

function expand_less(){
    player_stage++
    update_stage()
    
}

function expand_more(){
    player_stage--
    update_stage()
}

function update_stage(){

    if(player_stage == 2){

        player_title.textContent = songs[list_index].title
        expand_less_button.classList.add("d-none")
        expand_more_button.classList.remove("d-none")
        modal_body.classList.add("d-none")
        if (playing){
            litle_pause_button.classList.remove("d-none")
        }
        else {
            litle_play_button.classList.remove("d-none")
        }
    }

    else if(player_stage == 1){
        player_title.textContent = "Music-box"
        modal_body.classList.remove("d-none")
        song_cover.classList.add("d-none")
        expand_more_button.classList.remove("d-none")
        expand_less_button.classList.remove("d-none")
        litle_play_button.classList.add("d-none")
        litle_pause_button.classList.add("d-none")
    }

    else {
        song_cover.classList.remove("d-none")
        expand_more_button.classList.add("d-none")
    }
    update_stage_session()
}

function close_player(){
    player.classList.add("d-none")
    song.pause
    song.src = null
}

function song_play(play, pause){ //toca a música
    playing = true
    song.play()
    changePlayPauseButton(play, pause)
}

function song_pause(pause, play){ //pausa a música
    playing = false
    song.pause()
    changePlayPauseButton(pause, play)
}

function next_song(play, pause){ //troca para a próxima música
    if (list_index < songs.length-1){ //caso seja a última música da playlist, nada acontecerá
        list_index++
        load_song()
        song_play(play, pause)
    }
} 

function prev_song(play, pause){ //troca para a música anterior
    if (list_index > 0){ //caso seja a primeira música da playlist, nada acontecerá
        list_index--
        load_song()
        song_play(play, pause)
    }
}

function volume_show(vBar){
    vBar.classList.remove("d-none")
}

function volume_hide(vBar){
    vBar.classList.add("d-none")
}

function changeVolume(vBar, vIcons){
    song.volume = vBar.value/100
    if (song.volume == 0){
        vIcons[2].classList.add("d-none")
        vIcons[0].classList.add("d-none")
        vIcons[1].classList.remove("d-none")
    }
    else if(song.volume > 0.5){
        vIcons[0].classList.remove("d-none")
        vIcons[2].classList.add("d-none")
        vIcons[1].classList.add("d-none")
    }
    else {
        vIcons[1].classList.add("d-none")
        vIcons[0].classList.add("d-none")
        vIcons[2].classList.remove("d-none")
    }

}

function timeUpdate(pBar, mtime){ //função que atualiza o tempo da música
    if(!isNaN(song.duration) & !holding){ //só sera executado quando a duração da música ser carregada, e se o usuário não estiver segurando a barra de progresso.
        pBar.value = song.currentTime * (1000 / song.duration)
        time.textContent = secForMinute(Math.floor(song.currentTime))
        progressUpdate(pBar, mtime)
    }
}

function changeDuration(pBar){ //esta função altera a duração da música caso o usuário faça imediatamente.
    song.currentTime = song.duration * (pBar.value/1000)
}

function progressUpdate(input, mtime){ //atualiza a progress bar
    if(holding){
        mtime.textContent = secForMinute(Math.floor(input.value / (input.max / song.duration))) //atualiza o tempo da música caso o usuário esteja segurando a progress bar
    }
    input.style.background = 'linear-gradient(90deg, #1718b0 '+input.value/(input.max/100)+'%, #bdc3c7 0)'
}

function changePlayPauseButton(rem,add){//altera os icones do botão de play/pause, o primeiro argumento é o icone que some e o segundo é o que aparece
    rem.classList.add("d-none");
    add.classList.remove("d-none")
}

function grayIcon(icon){ //transforma o icone em cinza
    icon.classList.remove("purpleIcon")
    icon.classList.add("grayIcon")
    icon.style.cursor = "auto" //altera o cursor
}

function PurpleIcon(icon){//transforma o icone em roxo
    icon.classList.add("purpleIcon")
    icon.classList.remove("grayIcon")
    icon.style.cursor = "pointer"
}

function secForMinute(secs){ //função que tranforma segunds brutos em minutos e segundos
    let minutes_field = Math.floor(secs / 60)
    let seconds_field = secs % 60
    if (seconds_field < 10){
        seconds_field = "0" + seconds_field
    }

    return minutes_field+':'+seconds_field
}
