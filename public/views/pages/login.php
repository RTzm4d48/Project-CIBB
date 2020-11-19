<?php
$x = false;
if(isset($_COOKIE["id_user"])) $x = true;
if($x == true) header('Location: '.'/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style-register-login.css">
    <link rel="stylesheet" href="/css/responsive/rsp_style-register-login.css">
    <title>Registrarse</title>
</head>
<body> 
<form action="" method="POST">
    <div class="container">
        <img src="/svg/fondo.svg" class="container_img"alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="/svg/CIBB.svg" onclick="location.href='/'" alt="">
            </div>
            <div class="container-register-login">
                <img src="/svg/login.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo"><h1>¡Hola, bienvenido!</h1></div>
                    <div class="container-register-login_body_space-box">
                        <p>NOMBRE DE USUARIO</p>
                        <input type="text" name="user">
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>CONTRASEÑA</p>
                        <input type="password" maxlength="20" name="password">
                        <a href="">¿Has olvidado tu contraseña?</a>
                    </div>
                    <p class="container-register-login_body_alert">

                    <?php
                    require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
                    require_once(URL_PROJECT.'/app/controller/ctr_crud_user.php');
                    if(isset($_POST['login_user'])){
                        $ex = VALIDATIONS_U::val_login_user();
                    }else{}
                    ?>
                    </p>
                    <button type="submit" name="login_user" id="btn-continuar">Continuar</button>
                    
                    <p class="container-register-login_body_question">¿Necesitas una cuenta? <a href="/views/pages/register">Registrarse</a></p>
                </div>
            </div>
        </div>

            
    </div>
    </form>
</body>
</html>