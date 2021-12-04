// Example starter JavaScript for disabling form submissions if there are invalid fields
const user = $("#user").get(0);
const password = $("#pwd").get(0);

function check_user(){

  if(user.value === ""){
    $("#user-message").get(0).innerHTML = "Por favor, digite seu E-mail ou nome de usuário"
    user.classList.add("is-invalid")
  }
}


function check_exists_user(){
  
  var _username = $("#user").val()

  $.ajax({
    url:"../actions/login_validate.php",
    method: "POST",
    data:{user_name:_username},
    success: (function(result){
      console.log(result)

       if(!result){
        $("#user-message").get(0).innerHTML = "Usuário inexistente"     
        username.classList.add('is-invalid')
       }

       else {
        username.classList.remove('is-invalid')
        username.classList.add('is-valid')
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
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()