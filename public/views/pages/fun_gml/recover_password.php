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
    <link rel="stylesheet" href="/css/style-register-login_.css">
    <link rel="stylesheet" href="/css/responsive/rsp_style-register-login_.css">
    <title>Chanel pass</title>
</head>
<body> 
<!-- <form action="" method="POST"> -->
    <div class="container">
        <img src="/svg/fondo.svg" class="container_img"alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="/svg/CIBB.svg" onclick="location.href='/'" alt="">
            </div>
            <div class="container-register-login">
                <img src="/svg/login.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo"><h1>Cambiar de contraseña</h1></div>
                    <div class="container-register-login_body_space-box">
                        <p>NUEVO PASSWORD</p>
                        <input type="password" maxlength="20" name="password1" id="password1">
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>REPITE EL NUEVO PASSWORD</p>
                        <input type="password" maxlength="20" name="password2" id="password2">
                    </div>
                    <p id="m_alert" class="container-register-login_body_alert">

                    <?php
                    require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
                    require_once(URL_PROJECT.'/app/controller/ctr_crud_user.php');
                    if(isset($_POST['login_user'])){
                        
                    }else{}
                    ?>
                    </p>
                    <button onclick="chanel_pass();" type="submit" name="login_user" id="btn-continuar">Confirmar</button>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="/public/js/random_caracters_makeid_.js"></script>
                    <script>
                    function chanel_pass(){
                        var pass1 = document.getElementById('password1').value;
                        var pass2 = document.getElementById('password2').value;
                        if(pass1 != pass2)$('#m_alert').html('las contraseñas no coinsiden');
                        else $('#m_alert').html('todo correcto');
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
</body>
</html>