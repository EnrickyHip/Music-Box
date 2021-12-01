

$(document).ready(function(){
  $("#inputUser").blur(function(){

    var username = $(this).val()

    $.ajax({
      
      url:"../actions/signup_validate.php",
      method: "POST",
      data:{user_name:username},
    }).done(function(result){
        console.log(result)

        if(result){
          console.log("aadputamerdfsdfsdfsdfa eindaaDFGDFGa")
          $("#inputUser").get(0).setCustomValidity('Usuário já existe')
        }
        else {
          console.log("ESSA PORRA NÃO FAZ SENTIDO CARA WTF")
          $("#inputUser").get(0).setCustomValidity('')
        }
    })
  })
})


function checkPwd(){ 
  let password = document.getElementById("inputPdw")
  let c_password = document.getElementById("inputCPdw")


  if (c_password.value !== password.value){
    c_password.setCustomValidity('Senhas não coincidem') // não funcion, atem que ver depois.
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
    let user_message = document.getElementById('user-message')
    //console.log(user_message)
    //user_message.innerHTML = 'Caracteres inválidos'
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


