jQuery(function(){     
     
    const album_select = document.getElementById('album_edit_select');

    const inputCoverEdit = document.getElementById("inputCover_edit")
    const imgPreview = document.querySelector("#album_cover_edit_preview")

    const cover_edit = document.getElementById("cover_edit")

    change_cover_edit()

    genres.forEach(element => {
        if (genre == element.name ) {
            $("#genre_edit").append("<option selected>"+element.name+"</option>")
            set_subgenres("#subgenre_edit", "#genre_edit", subgenre)
        }
        else    {
            $("#genre_edit").append("<option>"+element.name+"</option>")
        }

    });

    $("#genre_edit").change(function (){
        set_subgenres("#subgenre_edit", "#genre_edit", null)
    })

    album_select.addEventListener('change', function(){
        change_cover_edit()
    })

    function change_cover_edit(){
        val = album_select.value

        if(val == 'solo'){
            cover_edit.hidden = false
        }
        else {

            cover_edit.hidden = true
        }
    }

    image_preview(inputCoverEdit, imgPreview)


        /* VALIDAÇÃO */

        
    const song_title_edit = document.getElementById("song_title_edit")
    const edit_song_form = document.getElementById("edit_song_form")
    const song_edit_message = document.getElementById("song_edit_message")
    const send_song_edit = document.getElementById("send_song_edit")

    $(document).ready(function(){
        send_song_edit.addEventListener('click', function (event) {

            if(!validate_title()){
                song_edit_message.classList.add("d-block") //d-block para a mensagem de erro aparecer
                event.preventDefault()
            }
            else {
                song_edit_message.classList.remove("d-block")
                edit_song_form.submit()
            }
        })
    })
        

    function validate_title(){
        if(song_title_edit.value === ""){
            add_invalid(song_title_edit) // caso esteja vazio, o input será definido como inválido
            $("#song_edit_message").get(0).innerHTML = "Por favor, digite um título para sua música" //define mensagem de erro
            return false
        }
        
        add_valid(song_title_edit)
        return true    
    }

    let tag_list = document.querySelector(".tags"),
    input_tags = document.getElementById("tags_edit"),
    tagNumb = document.querySelector(".details span");

    let maxTags = 1000,
    tags = [];

    countTags(tagNumb, maxTags, tags);
    createTag(tag_list, tags);


    input_tags.addEventListener("keyup", addTag);

    let removeBtn = document.querySelector(".details button");
    removeBtn.addEventListener("click", () =>{
        tags.length = 0;
        tag_list.querySelectorAll("li").forEach(li => li.remove());
        countTags();
    });

    function countTags(){
        tagNumb.innerText = maxTags - tags.length;
    }
    
    function createTag(){
        tag_list.querySelectorAll("li").forEach(li => li.remove());
        tags.slice().reverse().forEach(tag =>{
            let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
            tag_list.insertAdjacentHTML("afterbegin", liTag);
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

})

