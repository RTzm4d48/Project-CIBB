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
                <img src="/svg/CIBB.svg" alt="" onclick="location.href='/'" >
            </div>
            <div class="container-register-login">
                <img src="/svg/register.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo register-size"><h1>Crear Cuenta</h1></div>
                    <div class="container-register-login_body_space-box">
                        <p>CORREO ELECTRONICO</p>
                        <input type="text" placeholder="Name@gmail.com">
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>NOMBRE DE USUARIO</p>
                        <input type="text">
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>CONTRASEÑA</p>
                        <input type="password">
                    </div>
                    <p class="container-register-login_body_alert">La contraseña es incorrecta</p>
                    <button id="btn-continuar">Continuar</button>
                    <a href="/views/pages/login.php">¿ya tienes una cuenta?</a>
                </div>
            </div>
        </div>

            
    </div>
</body>
</html>
