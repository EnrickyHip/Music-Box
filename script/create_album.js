$(document).ready(function(){
    const album_title_input = document.getElementById("album_title_input")
    const message = $("#create_album_message").get(0)
    const inputFile = document.getElementById("album_cover")
    const imgPreview = document.querySelector(".image-preview")


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

    //recebe os elementos
    inputFile.addEventListener("change", function(){ //isso será ativado quando o usuário enviar algumar foto pelo input
        const file = this.files[0] //recebe o arquivo enviado

        if (file){

            /*isto serve mostrar a foto de perfil ao usuário antes que ele envie a foto para o server-side
            ps: não sei o que cada coisa faz
            */
            const reader = new FileReader()
            reader.addEventListener("load", function(){
                imgPreview.setAttribute("src", this.result)
            })
            reader.readAsDataURL(file)               
        }
    })
})