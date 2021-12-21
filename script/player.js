let songs = [ //Lista de músicas

    {
        name: "Sign of the Cross",
        artist: "Avantasia",
        src: "../songs/sign-of-the-cross.mp3",
        cover: "../album_covers/The_Metal_Opera.jpg"
    },

    {
        name: "Darts",
        artist: "System of a Down",
        src: "../songs/darts.mp3",
        cover: "../album_covers/System_of_a_down.jpg"
    },

    {
        name: "M.I.A",
        artist: "Avenged Sevenfold",
        src: "../songs/MIA.mp3",
        cover: "../album_covers/City_of_Evil_album_cover.jpg"
    },

    {
        name: "Lost in the Static",
        artist: "After the Burial",
        src: "../songs/lost-in-the-static.mp3",
        cover: "../album_covers/ab67616d0000b273ee1ce5c92d708957395abdeb.jpg"
    },

    {
        name: "Hallowed Be Thy Name",
        artist: "Iron Maiden",
        src: "../songs/hallowed-be-thy-name.mp3",
        cover: "../album_covers/666.jpg"
    },

    {
        name: "Sickening",
        artist: "Meshuggah",
        src: "../songs/sickening.mp3",
        cover: "../album_covers/R-1673713-1236027023.jpeg.jpg"
    },

    {
        name: "The Looking Glass",
        artist: "Avantasia",
        src: "../songs/the-looking-glass.mp3",
        cover: "../album_covers/AvantasiaTheMetalOpera1304_f.jpg"
    }
]

//declaração de variáveis
const play = document.getElementById("play")
const pause = document.getElementById("pause")
const prev = document.getElementById("prev")
const next = document.getElementById("next")
const progress_bar = document.getElementById("progress-bar")
const progress = document.querySelector("#progress")
const song = document.querySelector("audio")
const time = document.getElementById("begin-time")
const end_time = document.getElementById("end-time")
const song_cover = document.getElementById("player-song-cover")
const song_name = document.getElementById("player-song-name")
const song_artist = document.getElementById("player-song-artist")

let list_index = 0 //index da lista
let holding = false; //este holding refere-se a barra de progresso do player, se o usuário está segurando o clique em algum ponto dela ela, vai estar true

load_song() //carrega a música quando a página é iniciada

/*EVENTOS*/
play.addEventListener("click", function(){ //botão para tocar a música
    song_play()
})

pause.addEventListener("click", function(){ //botão para pausar a música
    song_pause()
})

prev.addEventListener("click", function(){ //botão para para a música anterior
    prev_song()
}) 

next.addEventListener("click", function(){ //botão para para a música seguinte
    next_song()
})

song.addEventListener("timeupdate", function(){ //esse evento identifica o progresso da música para alterar o barra de progresso
    timeUpdate()
})

song.addEventListener("ended", function(){ //identifica se a música terminou
    next_song()()
})

progress_bar.addEventListener('input', function (){ //identifica se o usuário clicou na barra de progresso
    holding_true()
});

progress_bar.addEventListener('mouseup', function (){ //identifica se usuário soltou o botão do mouse 
    holding_false()
});

progress_bar.oninput = function(){ //identifica se o usuário está alterando a barra de progresso manualmente
    console.log(progress_bar.value)
    progressBarUpdate()
}

progress_bar.addEventListener("change", function(){ //identifica se a barra de progresso está sendo alterada, seja manualmente ou não.
    changeDuration()
})

/*FUNÇÕES*/

function load_song(){ //carrega a música
    if (list_index == 0){
        grayIcon(prev)
    }

    if (list_index >= songs.length-1){
        grayIcon(next)
    }

    song.setAttribute("src", songs[list_index].src)

    song.addEventListener("loadeddata", function(){
        load_data()
    })
}

function load_data(){ // carrega as informações da música
    song_cover.setAttribute("src", songs[list_index].cover)
    song_name.textContent = songs[list_index].name
    song_artist.textContent = songs[list_index].artist
    end_time.textContent = secForMinute(Math.floor(song.duration))
}

function song_play(){ //toca a música
    song.play()
    pause_button_show()
}

function song_pause(){ //pausa a música
    song.pause()
    play_button_show()
}


function next_song(){ //troca para a próxima música
    if (list_index < songs.length-1){ //caso seja a última música da playlist, nada acontecerá
        list_index++
        load_song()
        song_play()
        PurpleIcon(prev)
    }
} 

function prev_song(){ //troca para a música anterior
    if (list_index > 0){ //caso seja a primeira música da playlist, nada acontecerá
        list_index--
        load_song()
        song_play()
        PurpleIcon(next)
    }
}

function timeUpdate(){ //função que atualiza o tempo da música
    if(!isNaN(song.duration) & !holding){ //só sera executado quando a duração da música ser carregada, e se o usuário não estiver segurando a barra de progresso.
        progress_bar.value = song.currentTime * (1000 / song.duration)
        time.textContent = secForMinute(Math.floor(song.currentTime))
        progressBarUpdate()
    }
}

function changeDuration(){ //esta função altera a duração da música caso o usuário faça imediatamente.
    song.currentTime = song.duration * (progress_bar.value/1000)
}

function progressBarUpdate(){ //atualiza a progress bar
    if(holding){
        time.textContent = secForMinute(Math.floor(progress_bar.value / (1000 / song.duration))) //atualiza o tempo da música caso o usuário esteja segurando a progress bar
    }
    progress_bar.style.background = 'linear-gradient(90deg, #1718b0 '+progress_bar.value/10+'%, #bdc3c7 0)'
}

/*FUNÇÕES AUXILIARES*/

function secForMinute(secs){ //função que tranforma segunds brutos em minutos e segundos
    let minutes_field = Math.floor(secs / 60)
    let seconds_field = secs % 60
    if (seconds_field < 10){
        seconds_field = "0" + seconds_field
    }

    return minutes_field+':'+seconds_field
}

function holding_true(){ //eu não preciso explicar né?
    holding = true;
}

function holding_false(){//...
    holding = false;
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

function pause_button_show(){ //mostra o botão de pausar e esconde o botão de tocar
    play.classList.add("d-none");
    pause.classList.remove("d-none");
}

function play_button_show(){ //faz o contrário do anterior
    pause.classList.add("d-none");
    play.classList.remove("d-none");
}


