  // constantes relativas aos inputs
  
  const username = $("#username").get(0);
  const email = $("#email").get(0);
  const password = $("#pwd").get(0);
  const c_password = $("#c_pwd").get(0);

  //realiza o teste em tempo real

  $(document).ready(function(){
    $("#username").blur(function(){
      check_username()
    })
  })

  $(document).ready(function(){
    $("#email").blur(function(){
      check_email()
    })
  })

  //função para validar username

  function check_username(){

    if(checkSpecialChars()){
      username.classList.add('is-invalid')
      $("#user-message").innerHTML = "Usuário Inválido"
    }
    else{
      check_exists_user()
    }
  }

    //função para validar email
  

  function check_email(){

    if(!email.checkValidity()){ 
      $("#email-message").get(0).innerHTML = "Email Inválido"
      email.classList.add('is-invalid')
    }
    else {
      check_exists_email()
    }
  }

  //checa se o usuário existe por meio do ajax e php


function check_exists_user(){
  
  var _username = $("#username").val()

  $.ajax({
    url:"../actions/signup_validate_user.php",
    method: "POST",
    data:{user_name:_username},
    success: (function(result){

       if(result){
        $("#user-message").get(0).innerHTML = "Nome de usuário já existente"     
        username.classList.add('is-invalid')
       }

       else {
        username.classList.remove('is-invalid')
        username.classList.add('is-valid')
       }
      }) 
    })
}

  //checa se o email existe por meio do ajax e php

function check_exists_email(){

  var email_ = $("#email").val()
  
  $.ajax({
    url:"../actions/signup_validate_email.php",
    method: "POST",
    data:{email_: email_},
    success: (function(result){


       if(result){   
        email.classList.add('is-invalid')
        $("#email-message").get(0).innerHTML = "Email já cadastrado"
       }

       else {
        email.classList.remove('is-invalid')
        email.classList.add('is-valid')
        console.log(email.checkValidity())
       }
      }) 
    })
}

//testa se as senhas são iguais

function checkPwd(){ 

  if (c_password.value !== password.value){
    return true
  }
  else {
    return false
 }
}

//filtragem por caracteres especiais


function checkSpecialChars(){
  var match = /^[a-zA-Z0-9_]*$/

  if (!username.value.match(match) || username.value === ""){
    return true
  }
  else {
    return false
  }
}

//função que valida as senhas

function check_password(){

    if(checkPwd()){
      c_password.setCustomValidity('senha invalida')
      //c_password.classList.remove('is-valid')
      //c_password.classList.add('is-invalid')
    }
    else {
      //c_password.classList.remove('is-invalid')
      //c_password.classList.add('is-valid')
      c_password.setCustomValidity('')
    }
}

// função de submit

(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {

        form.addEventListener('submit', function(event) {

          check_username()
          check_email()
          check_password()

          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()


