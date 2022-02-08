function get_song_info(codenames){

    return $.ajax({
        url:"../actions/get_song_info.php",
        method: "POST",
        data:{song_code_name:codenames},
        success: (function(songs){
            Songs = JSON.parse(songs)
            Song = Songs[0]
        })
    })
}


function play_Song(){

    if (!songs.some(({code_name}) => code_name === Song.code_name)){
        addSongtoQueue()
    }
    else {
        list_index = songs.findIndex(song => song.code_name === Song.code_name)
        load_song()
        song_play(play, pause)
    }
    if(player_stage == 2){
        update_stage()
    }
}

function addSongtoQueue(){
    songs.splice(list_index, 0, Song)
    load_song()
    song_play(play, pause)
    update_session()
}

function addSongtoQueueFinal(){
    songs.push(Song);
    if(list_index == songs.length - 2){
        PurpleIcon(next)
    }
    update_session()
}


jQuery(function(){

    let PlayButtons = null
    let AddButtons = null


    PlayButtons = document.querySelectorAll(".page-play");
    AddButtons = document.querySelectorAll(".page-add");

    PlayButtons.forEach(function(playButton){
        playButton.addEventListener("click", function(){
            let codename = playButton.getAttribute("codename")
            $.when(get_song_info([codename])).done(function(){
                play_Song()
                if(player_stage == "closed"){
                    player_stage = 0
                    open_player()
                }
            })
        })
    })
    
    AddButtons.forEach(function(AddButton){
        AddButton.addEventListener("click", function(){
            let codename = AddButton.getAttribute("codename")
            $.when(get_song_info([codename])).done(function(){
                addSongtoQueueFinal()
            })
        })
    })
})
