

jQuery(function(){ 

  //recebe as informações
  const edit_user_form = $("#edit_profile_form").get(0)
  const username = $("#username").get(0)
  const art_name = $("#art_name").get(0)
  const website = $("#website").get(0)
  const local = $("#local").get(0)
  const message = $("#edit_user_message").get(0)
  let match = null
  const autor = username.value
  // testa se o username digitado já existe por meio do ajax
  function check_exists_user_(){
    var _username = $("#username").val() 

    $.ajax({
      async: false, //o ajax por padrão executa o server-side ao mesmo tempo que o resto do código JS é executado, porém isto causa um delay das funções ajax, e como posteriormente o script JS depende das definições do ajax, essa propriedade faz com que o a continuação do código JS só seja feita após o término da requisição . Esta propriedade, aparentemente, é depreciada atualmente, porém não achei forma melhor de resolver este problema.  
      url:"../actions/signup_validate_user.php", //envia a requisição para este arquivo
      method: "POST",
      data:{user_name:_username}, //estas são as variáveis enviadas por método POST para o server side
      success: (function(result){ //função que é executada após sucesso da requisição
        result_ = getUsernameExists(result)
      })
    })
    return result_
  }

  // retorna a validação do usuário
  function getUsernameExists(result){

    if(result & $("#username").val() !== autor){ //o caso o usuário existe e NÃO seja igual ao usuário logado, retornará true
      message.innerHTML = "Nome de usuário já existente"
      return true
    }
    else {
      return false
    }
  }

  // checa a validade do username
  function checkUsername(){
    if(!check_empty(username)){
      message.innerHTML = "Por favor, digite um nome de usuário"
      return false
    }

    match = /^[a-zA-Z0-9_]*$/
    if(!checkSpecialChars(username, match)){
      message.innerHTML = "Nome de usuário contém caracteres inválidos"
      return false
    }
    else {
      if(!check_exists_user_()){
        return true
      }
    }
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

    match = /^[a-zA-Z0-9, áàâãéèêíïóôõöúçñ]*$/
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
    edit_user_form.addEventListener('submit', function (event) {

        if(!checkArt_name() || !checkUsername() || !checkWebsite() || !checkLocalization()){
          message.classList.add("d-block") //d-block para a mensagem de erro aparecer
          event.preventDefault()
        }
        else {
          message.classList.remove("d-block")
        }
      })
  })
})
