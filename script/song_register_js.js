let step = 1

const genres = [
    {
        name: "Metal",
        subgenres: ["Heavy Metal", "Prog Metal", "Power Metal", "Djent", "Black Metal", "Death Metal", "Folk Metal",  "Thrash Metal", "Metalcore"]
    },
    {
        name: "Rap",
        subgenres: ["Trap"]
    },
    {
        name: "Rock and Roll",
        subgenres: ["Grunge", "Hard Rock", "Prog Rock", "Rock Psicodélico", "Pop Rock"]
    },
    {
        name: "Música Clássica",
        subgenres: ["Barroco", "Romântico"]
    },
]

$("#step2").hide()

genres.forEach(element => {
    $("#genre_select").append("<option>"+element.name+"</option>")
});

$("#next_button").click(event =>{
    let validate
    console.log(step)
    if(step == 1){
        validate = validate_title()
    }
    else if(step == 2) {
        validate = validate_genre()
    }

    if(validate){
        step++
        console.log(step)
        change_stage()
    }
})

$("#back_button").click(event =>{
    step--
    console.log(step)
    change_stage()
})

$("#genre_select").change(function (){
    $('#subgenre_select option:not(:first)').remove();
    $("#subgenre_select").append("<option>Nenhum</option>")
    var name = $(this).val();

    genres.forEach(element => {
        if(element.name == name){
            element.subgenres.forEach(e => {
                $("#subgenre_select").append("<option>"+e+"</option>")
            });
        }
    });
})

function change_stage(){
    if (step == 1){
        $("#step1").show()  
        $("#step2").hide()
        $('#back_button').prop('disabled', true);
        $('#next_button').html("próximo")
    }
    else if (step == 2){
        $("#step1").hide()  
        $("#step2").show()
        $('#back_button').prop('disabled', false);
        $('#next_button').html("Finalizar")
    }
    else if (step == 3){
        $("#form-song").submit()
    }
}

/* validation */

const title_input = document.getElementById("song_title")

function validate_title(){
    if(title_input.value === ""){
        add_invalid(title_input) // caso esteja vazio, o input será definido como inválido
        $("#title-message").get(0).innerHTML = "Por favor, digite um título para sua música" //define mensagem de erro
        return false
      }
    else {
        add_valid(title_input)
        return true
    }     
}

function validate_genre(){
    if($("#genre_select").find(':selected').prop('disabled')){
        add_invalid($("#genre_select").get(0)) // caso esteja vazio, o input será definido como inválido
        $("#genre-message").get(0).innerHTML = "Por favor, defina um gênero para sua música" //define mensagem de erro
        return false
      }
    else {
        add_valid($("#genre_select").get(0))
        return true
    }     
}

function add_invalid(input){
    input.classList.remove('is-valid')
    input.classList.add('is-invalid')
}

function add_valid(input){
    input.classList.remove('is-invalid')
    input.classList.add('is-valid')
}

/* sistema de tags IMPORTADO*/

const ul = document.querySelector("ul"),
input_tags = document.getElementById("input-tags"),
tagNumb = document.querySelector(".details span");

let maxTags = 1000,
tags = [];

countTags();
createTag();

function countTags(){
    input_tags.focus();
    tagNumb.innerText = maxTags - tags.length;
}

function createTag(){
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
    countTags();
}

function remove(element, tag){
    let index  = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTags();
}

function addTag(e){
    if(e.key == "Enter"){
        console.log("deu certo uai")
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags.includes(tag)){
            if(tags.length < maxTags){
                tag.split(',').forEach(tag => {
                    tags.push(tag);
                    createTag();
                });
            }
        }
        e.target.value = "";
    }
}

input_tags.addEventListener("keyup", addTag);

const removeBtn = document.querySelector(".details button");
removeBtn.addEventListener("click", () =>{
    tags.length = 0;
    ul.querySelectorAll("li").forEach(li => li.remove());
    countTags();
});
