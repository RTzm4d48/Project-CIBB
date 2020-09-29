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
                        <input type="text">
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>CONTRASEÑA</p>
                        <input type="password">
                        <a href="">¿Has olvidado tu contraseña?</a>
                    </div>
                    <p class="container-register-login_body_alert">La contraseña es incorrecta</p>
                    <button id="btn-continuar">Continuar</button>
                    <p class="container-register-login_body_question">¿Necesitas una cuenta? <a href="/views/pages/register">Registrarse</a></p>
                </div>
            </div>
        </div>

            
    </div>
</body>
</html>