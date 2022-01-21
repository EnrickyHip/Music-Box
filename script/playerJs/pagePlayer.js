
jQuery(function(){ 

    let pageSong = null

    const pagePlay = document.getElementById('page-play');
    const pageAdd = document.getElementById('page-add');

    get_song_info()
    

    pagePlay.addEventListener("click", function(){
        if (!songs.some(({code_name}) => code_name === pageSong.code_name)){
            addPageSongtoQueue()
            update_session()
        }
        else {
            songs.map

            list_index = songs.findIndex(song => song.code_name === pageSong.code_name)
            load_song()
            song_play(play, pause)
        }
    });

    pageAdd.addEventListener("click", function(){
        addPageSongtoQueueFinal();
        update_session()
    })

    function addPageSongtoQueue(){
        songs.splice(list_index, 0, pageSong)
        load_song()
        song_play(play, pause)
    }

    function addPageSongtoQueueFinal(){
        songs.push(pageSong);
        if(list_index == songs.length - 2){
            PurpleIcon(next)
        }
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