// Example starter JavaScript for disabling form submissions if there are invalid fields
function checkPwd(){ 
  let password = document.getElementById("inputPdw")
  let c_password = document.getElementById("inputCPdw")


  if (c_password.value !== password.value){
    c_password.setCustomValidity('senhas não encaixam') // não funcion, atem que ver depois.
  }
  else {
    c_password.setCustomValidity('')
 }
}

function checkUsername(){
  let validName = document.getElementById("inputUser")
          var match = /^[a-zA-Z0-9_]*$/


          if (!validName.value.match(match)){
            validName.setCustomValidity('Caracteres inválidos') // isso não funciona.
          }
          else {
            validName.setCustomValidity('')
          }
}


(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {

        form.addEventListener('submit', function(event) {

          checkPwd()
          checkUsername()

          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()


