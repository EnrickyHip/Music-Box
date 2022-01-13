$(document).ready(function(){
    const album_title_input = document.getElementById("album_title_input")
    const message = $("#create_album_message").get(0)


    $("#create_album_form").submit(function(event){
        console.log(checkAlbumTitle())
        if(!checkAlbumTitle()){
            message.classList.add("d-block") //d-block para a mensagem de erro aparecer
            event.preventDefault()
          }
          else {
            message.classList.remove("d-block")
          }

    })

    function checkAlbumTitle(){
        if(album_title_input.value == ""){
            message.innerHTML = "Por favor, digite um título para o álbum"
            return false
        }
        else {
            return true
        }
    }
})