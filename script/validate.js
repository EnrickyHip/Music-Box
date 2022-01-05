  // constantes relativas aos inputs
  console.log("loaded")

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
      username_add_invalid() // caso esteja vazio, o input será definido como inválido
      $("#user-message").get(0).innerHTML = "Digite um nome de usuário" //define mensagem de erro
    }

    else if(checkSpecialChars()){
      $("#user-message").get(0).innerHTML = "Usuário Inválido"
      username_add_invalid()
    }
    else{
      check_exists_user() //checa se o username digitado ja existe no banco de dados
    }
  }


    //função para validar email
  function check_email(){

    if(email.value === ""){
      email_add_invalid()
      $("#email-message").get(0).innerHTML = "Digite um E-mail" 
    }

    else if(!email.checkValidity()){ 
      $("#email-message").get(0).innerHTML = "Email Inválido"
      email_add_invalid()
    }
    else {
      check_exists_email()
    }
  }


//checa se o usuário existe no banco de dados utilizando AJAX, uma forma de fazer requisições ao server-side e alterar a página sem recarregá-la

function check_exists_user(){
  
  var _username = $("#username").val() 

  $.ajax({
    async: false, //o ajax por padrão executa o server-side ao mesmo tempo que o resto do código JS é executado, porém isto causa um delay das funções ajax, e como posteriormente o script JS depende das definições do ajax, essa propriedade faz com que o a continuação do código JS só seja feita após o término da requisição . Esta propriedade, aparentemente, é depreciada atualmente, porém não achei forma melhor de resolver este problema.  
    url:"../actions/signup_validate_user.php", //envia a requisição para este arquivo
    method: "POST",
    data:{user_name:_username}, //estas são as variáveis enviadas por método POST para o server side
    success: (function(result){ //função que é executada após sucesso da requisição

       if(result){
        $("#user-message").get(0).innerHTML = "Nome de usuário já existente"
        username_add_invalid()//invalida o input
       }

       
       else {
        username_add_valid()//valida o input
       }
    }) 
  })
}

  //checa se o email existe por meio do ajax

function check_exists_email(){

  var email_ = $("#email").val()
  
  $.ajax({
    async: false,
    url:"../actions/signup_validate_email.php",
    method: "POST",
    data:{email_: email_},
    success: (function(result){


       if(result){  
          
        email_add_invalid()
        $("#email-message").get(0).innerHTML = "Email já cadastrado"
       }

       else {
        email_add_valid()
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
    password_add_invalid()
    c_password.classList.remove('is-invalid', 'is-valid')
    $("#pwd-message").get(0).innerHTML = "Digite uma senha" 
  }

  else if(password.value.length < 8){ //invalida senhas com menos de 8 caracteres
    password_add_invalid()
    $("#pwd-message").get(0).innerHTML = "Senha Inválida" 
  }

  else {
    check_pwd_match() //testar se as senhas coincidem
  }
}

//função para validar a senha de confirmação
function check_pwd_match() {
  if(c_password.value === ""){
    c_password_add_invalid()
    password_add_invalid()
    $("#pwd-message").get(0).innerHTML = "Confirme sua senha" 
  }

  else if(checkPwd()){
    c_password_add_invalid()
    password_add_invalid()
    $("#pwd-message").get(0).innerHTML = "Senhas não coincidem" 
  }
  else {
    password_add_valid()
    c_password_add_valid()
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
    terms.classList.remove("is-valid")
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

          //testa se os inputs contém a classe inválida, se sim, o evento(submit) é cancelado
          if(username.classList.contains("is-invalid") || email.classList.contains("is-invalid") || password.classList.contains("is-invalid") || terms.classList.contains("is-invalid")){
            event.preventDefault()
          }

        }, false)
      })
  })()
  
  // estas são as funções que alteram a validação dos inputs, é apenas estético, por isso o implemento de classes do BOOTSTRAP 


  function username_add_invalid(){
    username.classList.remove('is-valid')
    username.classList.add('is-invalid')
  }

  function username_add_valid(){
    username.classList.remove('is-invalid')
    username.classList.add('is-valid')
  }

  function email_add_invalid(){
    email.classList.remove('is-valid')
    email.classList.add('is-invalid')
  }

  function email_add_valid(){
    email.classList.remove('is-invalid')
    email.classList.add('is-valid')
  }

  function password_add_invalid(){
    password.classList.remove("is-valid")
    password.classList.add('is-invalid')
  }

  function password_add_valid(){
    password.classList.remove('is-invalid')
    password.classList.add('is-valid')
  }

  function c_password_add_valid(){
    c_password.classList.remove('is-invalid')
    c_password.classList.add('is-valid')
  }

  function c_password_add_invalid(){
    c_password.classList.remove("is-valid")
    c_password.classList.add('is-invalid')
  }


