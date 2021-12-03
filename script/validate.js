  $(document).ready(function(){
    $("#inputUser").blur(function(){
      check_username()
    })
  })

  $(document).ready(function(){
    $("#inputEmail").blur(function(){
      check_email()
    })
  })


  function check_username(){

    if(checkSpecialChars()){
      $("#inputUser").get(0).classList.add('is-invalid')
      $("#user-message").get(0).innerHTML = "Usuário Inválido"
    }
    else{
      check_exists_user()
    }
  }
  

  function check_email(){

    if(!$("#inputEmail").get(0).checkValidity()){ 
      $("#email-message").get(0).innerHTML = "Email Inválido"
      $("#inputEmail").get(0).classList.add('is-invalid')
    }
    else {
      check_exists_email()
    }
  }


function check_exists_user(){
  
  var username = $("#inputUser").val()

  $.ajax({
    url:"../actions/signup_validate_user.php",
    method: "POST",
    data:{user_name:username},
    success: (function(result){

      var input = $("#inputUser").get(0)

       if(result){
        $("#user-message").get(0).innerHTML = "Nome de usuário já existente"     
        input.classList.add('is-invalid')
       }

       else {
        input.classList.remove('is-invalid')
        input.classList.add('is-valid')
       }
      }) 
    })
}

function check_exists_email(){

  var email = $("#inputEmail").val()
  
  $.ajax({
    url:"../actions/signup_validate_email.php",
    method: "POST",
    data:{email_: email},
    success: (function(result){

      var input = $("#inputEmail").get(0)

       if(result){   
        input.classList.add('is-invalid')
        $("#email-message").get(0).innerHTML = "Email já cadastrado"
       }

       else {
        input.classList.remove('is-invalid')
        input.classList.add('is-valid')
       }
      }) 
    })
}


    


function checkPwd(){ 
  let password = $("#inputPdw").get(0)
  let c_password = $("#inputCPdw").get(0)


  if (c_password.value !== password.value){
    return true
  }
  else {
    return false
 }
}


function checkSpecialChars(){
  let validName = $("#inputUser").get(0)
  var match = /^[a-zA-Z0-9_]*$/

  if (!validName.value.match(match) || validName.value === ""){
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


