<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css">

    <title>Registrar</title>
</head>
<body>
    <header class="container">
        <img src="./images/logo.png" alt="logo" class="mx-auto d-block fs-6" style="height: 192px;">
    </header>

    <main>
        <div class="container-xxl bg-primary border rounded-3 shadow p-3 col-lg-6">
            <h2 class="text-white text-center">Registrar</h2>
            
            <form action="actions/signup_act.php" method="post" class="needs-validation bg-white border rounded-3 p-5" novalidate>
    
                <div class="containder row">
                
                    <div class="col-md-12">
                        <div class="input-group mb-3">

                            <span class="input-group-text" id="user-addon">https://musicbox.com/users/@</span>
                            <input type="text" name="username" class="form-control"  id="inputUser"placeholder="nome_de_usuário"aria-label="Username" aria-describedby="user-addon userHelp" required>
                                
                            <div id="userHelp" class="form-text">O nome de usuário não pode conter espaços ou caracteres especiais</div>
                            <div class="invalid-feedback" id="user-message">Usuário inválido</div>
                            
                        </div> 
                    </div>
                    
                    <div class="col-md-12">
                        <label for="inputEmail" class="form-label">E-mail</label>
                        <div class="input-group mb-3">

                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="exemplo@email.com" aria-label="E-mail" required>
                            <div class="invalid-feedback">E-mail inválido</div> 

                        </div>                            
                    </div>                
    
                    <div class="col-md-6">
                        <label for="inputPdw" class="form-label">Senha</label>
                        <div class="input-group mb3">
                            <input type="password" name="pwd" id="inputPdw" minlength="8" class="form-control" placeholder="senha" aria-labelledby="PDWHelp" required>
                            <div id="PDWHelp" class="form-text">A senha deve conter no mínimo 8 caracteres</div>
                            <div class="invalid-feedback">Senha Inválida</div>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <label for="inputCPdw" class="form-label">Confirmar Senha</label>
                        <div class="input-group mb3">
                            <input type="password" name="c_pwd" id="inputCPdw" class="form-control" placeholder="senha" required>
                            <div class="invalid-feedback">Senhas Diferentes</div>
                        </div>
                    </div>
    
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" name="termCheck" id="termCheck" required>
                            <label for="termCheck" class="form-check-label">Concordo com as condições e termos de uso.</label>
                            <div class="invalid-feedback">
                                Concorde com os termos.
                            </div>
                        </div>
                    </div>
    
                    <div class="col-12 mt-5">
                        <button class="btn btn-info text-white" type="submit" name="register">Registrar</button>
                    </div>
                </div>    
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./script/validate.js"></script>
</body>
</html>