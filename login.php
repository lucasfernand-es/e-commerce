<?php
    session_start();
    if(isset($_SESSION['userSession']))
    {
        header("Location: index.php");
    }

    $title = "Login";
    $login = true;
    include "include/header.php";
?>



    <div class="container">
        <div class="row">

            <div class="row col-md-4 col-sm-4 col-xs-8 login-container">
                <form id="formLogin" class="formLogin">
                    <div class="col-md-12">
                        <h4>E-Commerce :: Login</h4>
                    </div>

                    <div class="col-md-12">
                        <div id="alert" class="hide">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <span id="alert-content"></span>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" name="email" type="text" class="form-control" name="email" placeholder="Email"
                                   data-error="Informe um e-mail válido." required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Senha" required>
                        </div>

                    </div>
                </form>

                <div class="col-md-12 login-button">
                    <button id="login" type="submit" class="btn btn-primary" value="">Entrar <span class="glyphicon glyphicon-log-in"></button>
                </div>
            </div>
        </div>
    </div>




<?php include "include/footer.php"; ?>

