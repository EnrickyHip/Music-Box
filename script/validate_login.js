// Example starter JavaScript for disabling form submissions if there are invalid fields
console.log("aaaaaa")

const user = $("#user").get(0);
const password = $("#pwd").get(0);

function check_user(){

  if(user.value === ""){
    $("#user-message").get(0).innerHTML = "Por favor, digite seu E-mail ou nome de usuário"
    user.classList.add("is-invalid")
  }
  else {
    check_exists_user()
  }
}


function check_exists_user(){
  
  
  var _username = $("#user").val()

  $.ajax({
    url:"../actions/login_validate.php",
    method: "POST",
    data:{user_name:_username},
    success: (function(result){

       if(!result){
        $("#user-message").get(0).innerHTML = "Usuário inexistente"     
        user.classList.add('is-invalid')
       }

       else {
        user.classList.remove('is-invalid')
        user.classList.add('is-valid')
        console.log("nao é possivel", user.checkValidity(), user.classList)
        check_pwd()
       }
    }) 
  })
}

function check_pwd(){
  console.log("hmmm")

  if(password.value === ""){
    password.classList.add('is-invalid')
    $("#password-message").get(0).innerHTML = "Digite sua senha" 
  }
  else {
    check_pwd_correct()
  }
}

function check_pwd_correct(){

  var _password= $("#pwd").val()
  var _username = $("#user").val()

  $.ajax({
    url:"../actions/login_validate_pwd.php",
    method: "POST",
    data:{
      pass_word:_password,
      user_name:_username
    },
    success: (function(result){
       if(!result){
          password.classList.add("is-invalid")
          $("#password-message").get(0).innerHTML = "Senha Incorreta"  
       }  
       else {
        password.classList.remove("is-invalid")
        password.classList.add("is-valid")
       }
    }) 
  })
}

(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {

        form.addEventListener('submit', function (event) {


          check_user()
          console.log(form.checkValidity())
          console.log(user.checkValidity())

          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
        }, false)
      })
  })()