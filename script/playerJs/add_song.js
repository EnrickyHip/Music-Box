jQuery(function(){

    let PlayButtons = null
    let AddButtons = null

    function play_pageSong(){
        if (!songs.some(({code_name}) => code_name === pageSong.code_name)){
            addPageSongtoQueue()
        }
        else {
            list_index = songs.findIndex(song => song.code_name === pageSong.code_name)
            load_song()
            song_play(play, pause)
        }
    }

    function add_pageSong(){
        if(songs.length == 0){
            addPageSongtoQueue()
        }
        else {
            addPageSongtoQueueFinal();
        }
    }

    function addPageSongtoQueue(){
        songs.splice(list_index, 0, pageSong)
        load_song()
        song_play(play, pause)
        update_session()
    }

    function addPageSongtoQueueFinal(){
        songs.push(pageSong);
        if(list_index == songs.length - 2){
            PurpleIcon(next)
        }
        update_session()
    }

    function get_song_info(Button){ 

        let song_code_name = Button.getAttribute("codename")

        return $.ajax({
            url:"../actions/get_song_info.php",
            method: "POST",
            data:{song_code_name:song_code_name},
            success: (function(result){
            set_song(result)
            })
        })
    }

    function set_song(song){
        pageSong = JSON.parse(song)
    }

    PlayButtons = document.querySelectorAll(".page-play");
    AddButtons = document.querySelectorAll(".page-add");

    PlayButtons.forEach(function(playButton){
        playButton.addEventListener("click", function(){
            $.when(get_song_info(playButton)).done(function(){
                play_pageSong()
                player.classList.remove("d-none")
            })
        })
    })
    
    AddButtons.forEach(function(AddButton){
        AddButton.addEventListener("click", function(){
            get_song_info(AddButton)
            add_pageSong()
        })
    })
})
