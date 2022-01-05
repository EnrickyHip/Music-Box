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
    step++
    change_stage()
})

$("#back_button").click(event =>{
    step--
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
    }
    else if (step == 2){
        $("#step1").hide()  
        $("#step2").show()
        $('#back_button').prop('disabled', false);
    }
}