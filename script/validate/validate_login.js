// script de validação de login

//recebe os elementos
const user = $("#user").get(0);
const password = $("#pwd").get(0);
const form_submit = $("#formLog").get(0);

//checa a validade do input de usuário
function check_user(){
  console.log("entrou")
  if(user.value === ""){ // caso esteja vazio, o input será definido como inválido
    $("#user-message").get(0).innerHTML = "Por favor, digite seu E-mail ou nome de usuário" //define mensagem de erro
    add_invalid(user) // invalida o input, porém é apenas ESTÉTICOa
  }
  else {
    return check_exists_user() //checa se o usuário existe no banco de dados
  }
}

//checa se o usuário existe no banco de dados utilizando AJAX, uma forma de fazer requisições ao server-side e alterar a página sem recarregá-la


function check_exists_user(){ 

  var _username = $("#user").val()

  return $.ajax({ //o ajax por padrão executa o server-side ao mesmo tempo que o resto do código JS é executado, porém isto causa um delay das funções ajax, e como posteriormente o script JS depende das definições do ajax, essa propriedade faz com que o a continuação do código JS só seja feita após o término da requisição . Esta propriedade, aparentemente, é depreciada atualmente, porém não achei forma melhor de resolver este problema.  
    url:"../actions/login_validate.php", //envia a requisição para este arquivo
    method: "POST", 
    data:{user_name:_username}, //estas são as variáveis enviadas por método POST para o server side
    success: (function(result){ //função que é executada após sucesso da requisição
       if(!result){
        $("#user-message").get(0).innerHTML = "Usuário inexistente"
        remove_valid_invalid(password)
        add_invalid(user) //invalida o input
       }

       else {
        add_valid(user)//valida o input
        check_pwd() // testa a senha
       }
    }) 
  })
}

function check_pwd(){

  if(password.value === ""){ 
    add_invalid(password)
    $("#password-message").get(0).innerHTML = "Digite sua senha" 
  }
  else {
    check_pwd_correct() //checa se a senha que o usuário digitou coincide com a senha do banco de dados
  }
}

//checa se a senha que o usuário digitou coincide com a senha do banco de dados utilizando requisição AJAX
function check_pwd_correct(){

  var _password = $("#pwd").val()
  var _username = $("#user").val()

  return $.ajax({
    async: false,
    url:"../actions/login_validate_pwd.php",
    method: "POST",
    data:{
      pass_word:_password,
      user_name:_username
    },
    success: (function(result){
       if(!result){
        add_invalid(password)
        $("#password-message").get(0).innerHTML = "Senha Incorreta"
       }  
       else {
        add_valid(password)
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

          //check_user() //executa a função para checar o usuário

          event.preventDefault()
      
          $.when(check_user()).done(function(){
            console.log(user.classList.contains("is-invalid"))
            if(!(user.classList.contains("is-invalid") || password.classList.contains("is-invalid"))){ 
              form.submit() 
            }
          })

        }, false)
      })
  })()

  // estas são as funções que alteram a validação dos inputs, é apenas estético, por isso o implemento de classes do BOOTSTRAP 
