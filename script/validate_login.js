// Example starter JavaScript for disabling form submissions if there are invalid fields

const user = $("#user").get(0);
const password = $("#pwd").get(0);
const form_submit = $("#formLog").get(0);

function check_user(){
  if(user.value === ""){
    $("#user-message").get(0).innerHTML = "Por favor, digite seu E-mail ou nome de usuário"
    password.classList.remove("is-valid")
    user_add_invalid()
  }
  else {
    check_exists_user()
  }
}


function check_exists_user(){

  var _username = $("#user").val()

  $.ajax({
    async: false,
    url:"../actions/login_validate.php",
    method: "POST",
    data:{user_name:_username},
    success: (function(result){
       if(!result){

        $("#user-message").get(0).innerHTML = "Usuário inexistente"
        user_add_invalid()
       }

       else {
        user_add_valid()
        check_pwd()
       }
    }) 
  })
}

function check_pwd(){

  if(password.value === ""){
    password_add_invalid()
    $("#password-message").get(0).innerHTML = "Digite sua senha" 
  }
  else {
    check_pwd_correct()
  }
}

function check_pwd_correct(){

  var _password = $("#pwd").val()
  var _username = $("#user").val()

  $.ajax({
    async: false,
    url:"../actions/login_validate_pwd.php",
    method: "POST",
    data:{
      pass_word:_password,
      user_name:_username
    },
    success: (function(result){
       if(!result){
        password_add_invalid()
        $("#password-message").get(0).innerHTML = "Senha Incorreta"
       }  
       else {
        password_add_valid()
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
      
          if(user.classList.contains("is-invalid") || password.classList.contains("is-invalid")){
            event.preventDefault()
          }

        }, false)
      })
  })()


  function password_add_invalid(){
    password.classList.remove("is-valid")
    password.classList.add('is-invalid')
  }

  function password_add_valid(){
    password.classList.remove('is-invalid')
    password.classList.add('is-valid')
  }

  function user_add_invalid(){
    user.classList.remove('is-valid')
    user.classList.add('is-invalid')
  }

  function user_add_valid(){
    user.classList.remove('is-invalid')
    user.classList.add('is-valid')
  }