let pageSong = {//para testes
    name: "Hallowed Be Thy Name",
    artist: "Iron Maiden",
    src: "../songs/hallowed-be-thy-name.mp3",
    cover: "../album_covers/666.jpg"
}

const pagePlay = document.getElementById('page-play');
const pagePause = document.getElementById('page-pause');
const pagePlayer = document.getElementById('page-player');
const pageProgressBar = document.getElementById('page-progress-bar');
const pageProgress = document.getElementById('page-progress');
const pagetime = document.getElementById('begin-page-time');
const pageEndtime = document.getElementById('end-page-time');

pagePlay.addEventListener("click",function(){
    if(!songs.includes(pageSong)){
        addPageSongtoQueue()

    }
    song_play(pagePlay, pagePause)
});

pagePause.addEventListener("click", function(){
    song_pause(pagePause,pagePlay);
})









function addPageSongtoQueue(){
    songs.unshift(pageSong)
    load_song()
}
