const drop_zone = document.querySelector(".drop-zone")

/* UPLOAD DIRETO */

drop_zone.addEventListener("dragover", function(event){
    event.preventDefault()
    dash_border()
})

drop_zone.addEventListener("drop", function(event){
    event.preventDefault()
    console.log(event)
})

function dash_border(){
    drop_zone.classList.add("drop-zone-border")
}

["dragleave", "dragend"].forEach (type =>{
    drop_zone.addEventListener(type, e => {
        drop_zone.classList.remove("drop-zone-border")
    })
})

