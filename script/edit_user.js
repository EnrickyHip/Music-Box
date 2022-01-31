

jQuery(function(){ 

  //recebe as informações
  const edit_user_form = $("#edit_profile_form").get(0)
  const username = $("#username").get(0)
  const art_name = $("#art_name").get(0)
  const website = $("#website").get(0)
  const local = $("#local").get(0)
  const message = $("#edit_user_message").get(0)
  let match = null
  const send_profile_info = $("#send_profile_info").get(0)
  const autor = username.value
  // testa se o username digitado já existe por meio do ajax


  // checa a validade do username
  function checkUsername(){
    match = /^[a-zA-Z0-9_]*$/
    if(!check_empty(username)){
      message.innerHTML = "Por favor, digite um nome de usuário"
      return false
    }
    else if(!checkSpecialChars(username, match)){
      message.innerHTML = "Nome de usuário contém caracteres inválidos"
      return false
    }
    else{
      return true
    }
  }

  function check_exists_user_(){
    var _username = $("#username").val() 

    return $.ajax({
      url:"../actions/signup_validate_user.php", //envia a requisição para este arquivo
      method: "POST",
      data:{user_name:_username}, //estas são as variáveis enviadas por método POST para o server side
      success: (function(result){
         //função que é executada após sucesso da requisição
      })
    })
  }


  function check_empty(name){
    if(name.value === ""){
      return false
    }
    else{
      return true
    }
  }

  // teste de caractéres especiais

  function checkSpecialChars(name, match){
      if (name.value.match(match)){
        return true
      }
      else {
        return false
      }
    }

    //checa a validade do nome artístico

  function checkArt_name(){

    if(!check_empty(art_name)){
      message.innerHTML = "Por favor, digite um nome artístio"
      return false
    }

    match = /^[a-zA-Z0-9_, áàâãéèêíïóôõöúçñ]*$/
    if(!checkSpecialChars(art_name, match)){
      message.innerHTML = "Nome artístico contém caracteres inválidos"
      return false
    }
    else {
      return true
    }
  }

  //checa a validade do website
  function checkWebsite(){
    if(!website.checkValidity()){
      message.innerHTML = "Link de website inválido"
      return false
    }
    else {
      return true
    }
  }

  //checa a validade da localização
  function checkLocalization(){
    match = /^[a-zA-Z0-9, áàâãéèêíïóôõöúçñ]*$/
    if(!checkSpecialChars(local)){
      message.innerHTML = "Localização contém caractéres inválidos"
      return false
    }
    else {
      return true
    }
  }


  // função de submit
  $(document).ready(function(){
    send_profile_info.addEventListener('click', function (event) {
      
      $.when(check_exists_user_()).done(function(result){

        if(!result){
          result = true
        }

        else if($("#username").val() !== autor){ //o caso o usuário existe e NÃO seja igual ao usuário logado,
          result = false
          message.innerHTML = "Nome de usuário já existente"
        }

        if(!checkArt_name() || !checkUsername() || !result || !checkWebsite() || !checkLocalization()){
          message.classList.add("d-block") //d-block para a mensagem de erro aparecer
          console.log("nao enviou")
        }
        else {
          message.classList.remove("d-block")
          console.log("enviou")
         edit_user_form.submit()
        }
      })
    })
  })
})
