
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/public/js/random_caracters_makeid_.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style-register-login_.css">
    <link rel="stylesheet" href="/css/responsive/rsp_style-register-login_.css">
    <title>Valida tu codigo</title>
</head>
<style>
    .btn_v_a_code{
        background:none;border:none;cursor:pointer;color:#44A0E3;font-size:12px;
    }
    .btn_v_a_code:hover{
        text-decoration: underline #44A0E3;
    }
</style>
<body> 
    <div class="container">
        <img src="/svg/fondo.svg" class="container_img"alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="/svg/CIBB.svg" alt="" onclick="location.href='/'">
            </div>
            <div class="container-register-login">
                <img src="/svg/register.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo register-size"><h1>Exito</h1></div>
                    <div style="height:auto;" class="container-register-login_body_space-box">
                        <p>Se envio un enlace a tu gmail en donde podras cambiar tu contrasena de una forma segura.</p>
                    </div>
                    
                    <p id="txt_alert" class="container-register-login_body_alert" style="width: 80%; text-align:center;">
                    </p>
                    <button onclick="go_login();" type="submit" name="valid_code"  id="btn-continuar">Ir a login</button>
                    <script>
                    function go_login(){
                        location.href='/views/pages/login';
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>