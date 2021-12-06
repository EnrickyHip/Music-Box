  // constantes relativas aos inputs

  const username = $("#username").get(0)
  const email = $("#email").get(0)
  const password = $("#pwd").get(0)
  const c_password = $("#c_pwd").get(0)
  const terms = $("#termCheck").get(0)

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

    if(username.value === ""){
      username.classList.add('is-invalid')
      $("#user-message").get(0).innerHTML = "Digite um nome de usuário" 
    }

    else if(checkSpecialChars()){
      $("#user-message").get(0).innerHTML = "Usuário Inválido"
      username.classList.add('is-invalid')
    }
    else{
      check_exists_user()
    }
  }

    //função para validar email
  

  function check_email(){

    if(email.value === ""){
      email.classList.add('is-invalid')
      $("#email-message").get(0).innerHTML = "Digite um E-mail" 
    }

    else if(!email.checkValidity()){ 
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
        console.log("por que está entrando aqui?")
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

  if (!username.value.match(match)){
    return true
  }
  else {
    return false
  }
}

function check_pwd_match() {
  if(c_password.value === ""){
    password.classList.add('is-invalid')
    c_password.classList.add('is-invalid')
    $("#pwd-message").get(0).innerHTML = "Confirme sua senha" 
  }

  else if(checkPwd()){
    c_password.classList.remove("is-valid")
    password.classList.remove("is-valid")
    c_password.classList.add('is-invalid')
    password.classList.add('is-invalid')
    $("#pwd-message").get(0).innerHTML = "Senhas não coincidem" 
  }
  else {
    password.classList.remove('is-invalid')
    password.classList.add('is-valid')
    c_password.classList.remove('is-invalid')
    c_password.classList.add('is-valid')
  }
}


//função que valida as senhas

function check_password(){

  if(password.value === ""){
    password.classList.add('is-invalid')
    c_password.classList.remove('is-invalid', 'is-valid')
    $("#pwd-message").get(0).innerHTML = "Digite uma senha" 
  }

  else if(password.value.length < 8){
    password.classList.remove("is-valid")
    password.classList.add('is-invalid')
    $("#pwd-message").get(0).innerHTML = "Senha Inválida" 
  }

  else {
    check_pwd_match()
  }
}

// checa os termos

function check_terms(){
  if(!terms.checkValidity()){
    terms.classList.add("is-invalid")
  }
  else {
    terms.classList.remove("is-invalid")
    terms.classList.add("is-valid")
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
          check_terms()
          console.log('c_passwordfinal:', c_password.classList)
          console.log('passwordfinal:', password.classList)
          console.log('user:',username.classList)
          console.log('email:',email.classList)
          console.log('form:',form.classList)
          

          console.log('cpasswordfinal:', c_password.checkValidity())
          console.log('user:',username.checkValidity())
          console.log('email:',email.checkValidity())
          console.log('form:',form.checkValidity())

          if(username.classList.contains("is-invalid") || email.classList.contains("is-invalid") || password.classList.contains("is-invalid")){

            console.log("PELO AMOR DE DEUS")
            event.preventDefault()
          }
          

         /* if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          } */
        }, false)
      })
  })()


