//script de edição da foto de perfil

console.log("edit img user carregado")

jQuery(function(){ //testa se o documento está pronto

        //recebe os elementosy
        const inputFile = document.getElementById("inputFile")
        const imgPreview = document.querySelector("#avIcon")


        inputFile.addEventListener("change", function(){ //isso será ativado quando o usuário enviar algumar foto pelo input
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
    })

    

