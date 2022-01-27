  // constantes relativas aos inputs

  const username = $("#username").get(0)
  const email = $("#email").get(0)
  const password = $("#pwd").get(0)
  const c_password = $("#c_pwd").get(0)
  const terms = $("#termCheck").get(0)

  $(document).ready(function(){ 
    $("#username").blur(function(){ //testa toda vez que voce altera algo no input e clica fora dele
      check_username() 
    })
  })

  $(document).ready(function(){
    $("#email").blur(function(){
      check_email()
    })
  })

  //função para validar username

  function check_username(){ // função de validação do username

    if(username.value === ""){
      add_invalid(username) // caso esteja vazio, o input será definido como inválido
      $("#user-message").get(0).innerHTML = "Digite um nome de usuário" //define mensagem de erro
    }

    else if(checkSpecialChars()){
      $("#user-message").get(0).innerHTML = "Usuário Inválido"
      add_invalid(username)
    }
    else{
      return check_exists_user() //checa se o username digitado ja existe no banco de dados
    }
  }


    //função para validar email
  function check_email(){

    if(email.value === ""){
      add_invalid(email)
      $("#email-message").get(0).innerHTML = "Digite um E-mail" 
    }

    else if(!email.checkValidity()){ 
      $("#email-message").get(0).innerHTML = "Email Inválido"
      add_invalid(email)
    }
    else {
      return check_exists_email()
    }
  }


//checa se o usuário existe no banco de dados utilizando AJAX, uma forma de fazer requisições ao server-side e alterar a página sem recarregá-la

function check_exists_user(){
  
  var _username = $("#username").val() 

  return $.ajax({
    url:"../actions/signup_validate_user.php", //envia a requisição para este arquivo
    method: "POST",
    data:{user_name:_username}, //estas são as variáveis enviadas por método POST para o server side
    success: (function(result){ //função que é executada após sucesso da requisição

       if(result){
        $("#user-message").get(0).innerHTML = "Nome de usuário já existente"
        add_invalid(username)//invalida o input
       }
       else {
        add_valid(username)//valida o input
       }
    }) 
  })
}

  //checa se o email existe por meio do ajax

function check_exists_email(){

  var email_ = $("#email").val()
  
  return $.ajax({
    url:"../actions/signup_validate_email.php",
    method: "POST",
    data:{email_: email_},
    success: (function(result){
       if(result){  

        add_invalid(email)
        $("#email-message").get(0).innerHTML = "Email já cadastrado"
       }

       else {
        add_valid(email)
       }
    }) 
  })
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

//função para validar a senha digitada

function check_password(){

  if(password.value === ""){
    add_invalid(password)
    c_password.classList.remove('is-invalid', 'is-valid')
    $("#pwd-message").get(0).innerHTML = "Digite uma senha" 
  }

  else if(password.value.length < 8){ //invalida senhas com menos de 8 caracteres
    add_invalid(password)
    $("#pwd-message").get(0).innerHTML = "Senha Inválida" 
  }

  else {
    check_pwd_match() //testar se as senhas coincidem
  }
}

//função para validar a senha de confirmação
function check_pwd_match() {
  if(c_password.value === ""){
    add_invalid(c_password)
    add_invalid(password)
    $("#pwd-message").get(0).innerHTML = "Confirme sua senha" 
  }

  else if(checkPwd()){
    add_invalid(c_password)
    add_invalid(password)
    $("#pwd-message").get(0).innerHTML = "Senhas não coincidem" 
  }
  else {
    add_valid(password)
    add_valid(c_password)
  }
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

// checa os termos

function check_terms(){
  if(!terms.checkValidity()){
    add_invalid(terms)
  }
  else {
    add_valid(terms)
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
          event.preventDefault()
          
          check_username()
          check_email()
          check_password()
          check_terms()

          $.when(check_username(), check_email()).done(function(){
            if(!(username.classList.contains("is-invalid") || email.classList.contains("is-invalid") || password.classList.contains("is-invalid") || terms.classList.contains("is-invalid"))){
              console.log("enviou")
              form.submit()
            }
            else {
              console.log("nao enviou")
            }
          })

        }, false)
      })
  })()
  
  // estas são as funções que alteram a validação dos inputs, é apenas estético, por isso o implemento de classes do BOOTSTRAP 



