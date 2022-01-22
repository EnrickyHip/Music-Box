
jQuery(function(){ 

    let pageSong = null

    const pagePlay = document.getElementById('page-play');
    const pageAdd = document.getElementById('page-add');

    get_song_info()
    

    pagePlay.addEventListener("click", function(){
        play_pageSong()
        player.classList.remove("d-none")
    });

    pageAdd.addEventListener("click", function(){
        add_pageSong()
    })

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

    function get_song_info(){ 

        let song_code_name = getGetParam('s')
    
        $.ajax({
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

    function getGetParam(get){ //função para pegar um parametro GET
        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);

        let get_param = urlParams.get(get)
        return get_param
    }
})