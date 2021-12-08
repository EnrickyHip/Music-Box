$(document).ready(function(){

        const inputFile = document.getElementById("inputFile")
        const imgPreview = document.querySelector(".image-preview")
        const imgModal = document.getElementById("imgModal")

        inputFile.addEventListener("change", function(){
            imgModal.classList.remove("d-none")
            const file = this.files[0]
            console.log(file)

            if (file){
                $("#imgModal").modal('show')
                const reader = new FileReader()

                reader.addEventListener("load", function(){
                    imgPreview.setAttribute("src", this.result)
                })

                reader.readAsDataURL(file)    
            }
            else {
                imgPreview.setAttribute("src", "")
            }
        })

        $('#imgModal').on('hidden.bs.modal', function () {
            inputFile.value = null
            console.log("Modal closed", inputFile.value);
        });
    

})