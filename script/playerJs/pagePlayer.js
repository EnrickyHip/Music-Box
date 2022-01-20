let pageSong = {//para testes
    name: "Hallowed Be Thy Name",
    artist: "Iron Maiden",
    src: "../songs/hallowed-be-thy-name.mp3",
    cover: "../album_covers/666.jpg"
}

const pagePlay = document.getElementById('page-play');
const pagePause = document.getElementById('page-pause');
const pagePlayer = document.getElementById('page-player');
const pageAdd = document.getElementById('page-add');

pagePlay.addEventListener("click",function(){
    if(!songs.includes(pageSong)){
        addPageSongtoQueueFirst()

    }
    song_play(pagePlay, pagePause)
});

pagePause.addEventListener("click", function(){
    song_pause(pagePause,pagePlay);
})

pageAdd.addEventListener("click", function(){
    if(!songs.includes(pageSong)){
        addPageSongtoQueueFinal();
    }
})







function addPageSongtoQueueFirst(){
    songs.unshift(pageSong);
    load_song()
}

function addPageSongtoQueueFinal(){
    songs.push(pageSong);
    load_song
}