<!-- Dropdown para usuário não logados -->

<!--Botão-->
<a href="#" data-toggle="dropdown" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" class="btn btn-primary dropdown login-btn" data-bs-auto-close="false" aria-expanded="false"><i class="bi bi-person-circle fs-4 purpleIcon"></i></a>

<!--DropDown-->
<div class="dropdown-menu dropdown-menu-end action-form" aria-labelledby="dropdownMenuLink">
    <div class="dropdown-item mx-auto">
        <a href="#" class="btn btn-secondary google-btn">Entre com o Google <i class="bi bi-google"></i></a>
    </div>

    <div class="dropdown-divider"></div>

    <!--Formuláro de login-->

    <form action="../actions/login_act.php" method="post" class="px-4 py-3 needs-validation" novalidate>
        <div class="form-group">

            <label for="emailInput">Endereço de E-mail ou Nome de Usuário</label>
            <input type="text" class="form-control" name="user" id="user" placeholder="email@exemplo.com" required>

            <div class="invalid-feedback" id="user-message">Usuário inválido</div>
        </div>

        <div class="form-group">
            <label for="passwdInput">Senha</label>
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>

            <div class="invalid-feedback" id="password-message">Senha Incorreta</div>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck">
            <label class="form-check-label" for="dropdownCheck">
                Lembrar desta conta
            </label>
        </div>

        <button type="submit" id="formLog" name="login" class="btn btn-success">Login</button>
    </form>
    <div class="dropdown-divider"></div>

    <a class="dropdown-item" href="?t=logoOnly&p=register">Novo por aqui? Inscreva-se!</a>
    <a class="dropdown-item" href="#">Esqueçeu a senha?</a>
</div>