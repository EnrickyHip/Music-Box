//script de edição da foto de perfil

jQuery(function(){ //testa se o documento está pronto

        //recebe os elementos
        const inputFile = document.getElementById("inputFile")
        const imgPreview = document.querySelector(".image-preview")

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
            else {
                //esconde o modal/pop up e define o src do preview como vazio
                imgPreview.setAttribute("src", "")
            }
        })

    

})