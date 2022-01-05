<div class="container-xxl bg-primary border rounded-3 shadow p-3 col-lg-6">
    <h2 class="text-white text-center">Registrar</h2>
    
    <form action="actions/signup_act.php" method="post" id="form" class="needs-validation bg-white border rounded-3 p-5" novalidate>

        <div class="containder row">
            
            <label for="username" class="form-label">Nome de Usuário:</label>
        
            <div class="col-md-12 mb-3">
                <div class="input-group">

                    <span class="input-group-text" id="user-addon">https://musicbox.com/users/@</span>
                    <input type="text" name="username" class="form-control"  id="username" placeholder="nome_de_usuário"aria-label="Username" aria-describedby="user-addon userHelp" required>
                        
                    <div class="invalid-feedback" id="user-message"></div>
                    
                </div> 
                <div id="userHelp" class="form-text">O nome de usuário não pode conter espaços ou caracteres especiais</div>
            </div>
            
            <div class="col-md-12 mb-3">
                <label for="inputEmail" class="form-label">E-mail</label>
                <div class="input-group ">

                    <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@email.com" aria-label="E-mail" required>
                    <div class="invalid-feedback" id="email-message"></div> 

                </div>                            
            </div>                

            <div class="col-md-6 mb-3">
                <label for="inputPdw" class="form-label">Senha</label>
                <div class="input-group ">
                    <input type="password" name="pwd" id="pwd" minlength="8" class="form-control" placeholder="senha" aria-labelledby="PDWHelp" required>
                    <div class="invalid-feedback" id="pwd-message"></div>
                </div>
                <div id="PDWHelp" class="form-text">A senha deve conter no mínimo 8 caracteres</div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="inputCPdw" class="form-label">Confirmar Senha</label>
                <div class="input-group ">
                    <input type="password" name="c_pwd" id="c_pwd" class="form-control" placeholder="senha" required>
                    <div class="invalid-feedback"></div>
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
                <a href="../" class="btn btn-secondary white-button text-white">Voltar</a>
                <button class="btn btn-info text-white" type="submit" name="register">Registrar</button>
            </div>
        </div>    
    </form>
</div>

<script src="./script/validate.js"></script>