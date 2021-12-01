  $(document).ready(function(){
    $("#inputUser").blur(function(){
      check_username()
    })
  })

  $(document).ready(function(){
    $("#inputEmail").blur(function(){
      check_exists_email()
    })
  })

  function check_username(){
    
    if(checkSpecialChars()){
      $("#inputUser").get(0).setCustomValidity('usuário inválido') 
      $("#user-message").get(0).innerHTML = "Usuário Inválido"
    }
    else{
      check_exists_user()
    }
  }

  function check_email(){
    if($("#inputEmail").get(0).checkValidity()){
      $("#email-message").get(0).innerHTML = "Email Inválido"
    }
      check_exists_user()
  }


function check_exists_user(){
  var username = $("#inputUser").val()

  $.ajax({
    url:"../actions/signup_validate_user.php",
    method: "POST",
    data:{user_name:username},
    success: (function(result){
       if(result){
        $("#inputUser").get(0).setCustomValidity('Usuário já existe') 
        $("#user-message").get(0).innerHTML = "Nome de usuário já existente"
       }
       else {
        $("#inputUser").get(0).setCustomValidity('')  
       }
      }) 
    })
}

function check_exists_email(){
  var email = $("#inputEmail").val()
  console.log("checando...")
  $.ajax({
    url:"../actions/signup_validate_email.php",
    method: "POST",
    data:{email_: email},
    success: (function(result){
      console.log(result)
       if(result){
        $("#inputEmail").get(0).setCustomValidity('Email já existe') 
        $("#email-message").get(0).innerHTML = "Email já cadastrado"
       }
       else {
        $("#inputEmail").get(0).setCustomValidity('')  
       }
      }) 
    })
}


    


function checkPwd(){ 
  let password = document.getElementById("inputPdw")
  let c_password = document.getElementById("inputCPdw")


  if (c_password.value !== password.value){
    return true
    //c_password.setCustomValidity('Senhas não coincidem') // não funcion, atem que ver depois.
  }
  else {
    return false
    //c_password.setCustomValidity('')
 }
}


function checkSpecialChars(){
  let validName = document.getElementById("inputUser")
  var match = /^[a-zA-Z0-9_]*$/


  if (!validName.value.match(match)){
    return true
  }
  else {
    return false
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

          let validName = document.getElementById("inputUser")
          let c_password = document.getElementById("inputCPdw")

          check_username()
          check_email()


          if(checkPwd()){
            c_password.setCustomValidity('Senhas não coincidem')
          }
          else {
            c_password.setCustomValidity('')
          }



          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()


