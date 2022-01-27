function image_preview(input, imgPreview){
    input.addEventListener("change", function(){ //isso será ativado quando o usuário enviar algumar foto pelo input
        const file = this.files[0] //recebe o arquivo enviado
    
        if (file){
    
            /*isto serve mostrar a foto de perfil ao usuário antes que ele envie a foto para o server-side
            ps: não sei o que cada coisa faz
            */
            const reader = new FileReader()
            reader.addEventListener("load", function(){
    
                imgPreview.src = this.result
            })
            reader.readAsDataURL(file)   
                
        }
    })   
}

function add_invalid(input){
    input.classList.remove('is-valid')
    input.classList.add('is-invalid')
}

function add_valid(input){
    input.classList.remove('is-invalid')
    input.classList.add('is-valid')
}

function remove_valid_invalid(input){
    input.classList.remove('is-invalid')
    input.classList.remove('is-valid')
}

function set_subgenres(subgenre_select, genre, subgenre){
    $(`${subgenre_select} option:not(:first)`).remove();
    $(`${subgenre_select}`).append("<option>Nenhum</option>")
    var name = $(genre).val();

    genres.forEach(genre_element => {
        if(genre_element.name == name){
            genre_element.subgenres.forEach(subgenre_element => {
                if (subgenre !== null & subgenre == subgenre_element) {
                    $(`${subgenre_select}`).append("<option selected>"+subgenre_element+"</option>")
                }
                else {
                    $(`${subgenre_select}`).append("<option>"+subgenre_element+"</option>")
                }
            });
        }
    });
}
