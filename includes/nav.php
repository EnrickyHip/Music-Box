<nav class="navbar navbar-expand-sm navbar-light shadow bg-light fixed-top py-0">
    <div class="row container-fluid pe-0" id="navwrap">

        <!--Pesquisa mobile-->
        <div class="nav-item col text-elf d-block d-sm-none py-3">

            <!--Botão-->
            <button class="btn btn-primary purpleIcon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                aria-controls="offcanvasTop"><i class="bi bi-search"></i></button>

            <!--Janela offCanvas-->
            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <form action="#" method="get" class="d-flex input-group">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            aria-describedby="buttonSearchMobile">
                        <button class="btn btn-outline-success" type="submit" id="buttonSearchMobile"><i
                                class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <!--Logo-->
        <a href="../" class="navbar-brand col-lg-4 col-sm-2 col text-md-start text-center m-0">
            <img src="./images/logo.png" alt="logo" id="logo">
        </a>

        <!--Pesquisa tablet/Desktop-->
        <form action="#" method="get" class="nav-item col d-none d-sm-flex py-3 input-group">
            <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search"
                aria-describedby="buttonSearch">
            <button class="btn btn-outline-success" type="submit" id="buttonSearch"><i
                    class="bi bi-search"></i></button>
        </form>

        <!--Botão de Login-->
        <div class="nav-item dropdown col-lg-4 col-sm-2 col ms-auto pe-md-3 py-2 text-end">
            <!-- aparecerá dropdowns diferentes para usuários logados e não logados  -->
            <?php
            if(isset($self_user)){
                include_once "./includes/dd_login_sUser.php";
            }
            else {
                include_once "./includes/dd_login_nUser.php";
            }
  
            ?>
        </div>
    </div>
</nav>
