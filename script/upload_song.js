const drop_zone = document.querySelector(".drop-zone")
const upload_message = document.getElementById("upload_message")
const upload_message_text = document.getElementById("upload_message_text") 
const upload_song_input = document.getElementById("upload_song_input") 
const upload_form = document.getElementById("upload_form") 

/* UPLOAD DIRETO */

upload_song_input.addEventListener("change", function(){
    files = upload_song_input.files
    submit(files)
})

drop_zone.addEventListener("dragover", function(event){
    event.preventDefault()
    dash_border_add()
})

drop_zone.addEventListener("drop", function(event){
    event.preventDefault()
    dash_border_remove()
    submit(event.dataTransfer.files)

})

function submit(files){
    console.log(files.length)
    if (files.length > 1){
        text = "Você só pode enviar um arquivo por vez."
        upload_message_show(text)
    }
    else {
        upload_song_input.files = files
        if(!upload_song_input.files[0].type.includes("audio/")){
            text = "Formato de arquivo inválido."
            upload_message_show(text)
        }
        else {
            upload_message_hide()
            text = "Funcionou :D"
            upload_message_show(text)
            upload_form.submit()
        }
    }
}

function dash_border_add(){
    drop_zone.classList.add("drop-zone-border")
}


["dragleave", "dragend"].forEach (type =>{
    drop_zone.addEventListener(type, e => {
        drop_zone.classList.remove("drop-zone-border")
    })
})

function dash_border_remove(){
    drop_zone.classList.remove("drop-zone-border")
}

function upload_message_show(text){
    upload_message_text.textContent = text
    upload_message.classList.remove("invisible")
}

function upload_message_hide(){
    upload_message.classList.add("invisible")
}

