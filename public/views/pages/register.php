<?php
if(isset($_COOKIE["id_user"]))header('Location: '.'/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style-register-login_.css">
    <link rel="stylesheet" href="/css/responsive/rsp_style-register-login_.css">
    <title>Registrarse</title>
</head>
<body> 
<form action="" method="POST">
    <div class="container">
        <img src="/svg/fondo.svg" class="container_img"alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="/svg/CIBB.svg" alt="" onclick="location.href='/'" >
            </div>
            <div class="container-register-login">
                <img src="/svg/register.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo register-size"><h1>Crear Cuenta</h1></div>
                    <div class="container-register-login_body_space-box">
                        <p>CORREO ELECTRONICO</p>
                        <input type="email"pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"name="gmail" id="txt_gmail" maxlength="50" required>
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>NOMBRE DE USUARIO</p>
                        <input type="text" name='user' maxlength="15"  required>
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>CONTRASEÑA</p>
                        <input type="password" maxlength="20" minlength="8" name='password' required>
                    </div>
                    <p class="container-register-login_body_alert">
                    
                    <?php
                    require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
                    require_once(URL_PROJECT.'/app/controller/ctr_crud_user.php');
                    $ex = new VALIDATIONS_U();
                    if(isset($_POST['registrar_user'])){
                        $ex->val_register_user();
                    }else{}
                    ?>

                    </p>
                    <button type="submit" name="registrar_user" id="btn-continuar" onclick="code();">Continuar</button>
                    <a href="/views/pages/login.php">¿ya tienes una cuenta?</a>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="/public/js/random_caracters_makeid_.js"></script>
                    <script>
                    function code(){
                        var gmail = document.getElementById('txt_gmail').value;
                        var code = makeid(5);
                        var mydata = 'gmail='+gmail+'&code='+code;
                        $.ajax({
                            url: '/public/ajax/codes/ajax_code_verification_accound.php',
                            type: 'POST',
                            data: mydata,
                            dataType: "json",
                            success:function(rpt){
                                /* alert(rpt); */
                            }
                        });
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
<!-- $hash= password_hash($pass, PASSWORD_DEFAULT, ['cost'=> 10]);//encriptar
if(password_verify($pass, $hash))echo'true';//validacion -->