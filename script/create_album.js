$(document).ready(function(){

    const album_title_input = document.getElementById("album_title_input")
    const message = $("#create_album_message").get(0)
    const inputFile = document.getElementById("album_cover")
    const imgPreview = document.querySelector("#album_cover_preview")
    const album_form = document.getElementById("create_album_form")

    $('#create_album_modal').on('hidden.bs.modal', function () {
        album_form.reset()
        imgPreview.src = "../album_covers/default-cover-art.png"
    });


    $("#create_album_form").submit(function(event){

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
        return true
    }

    image_preview(inputFile, imgPreview)
})