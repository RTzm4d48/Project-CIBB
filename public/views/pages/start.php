<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-templates.css">
    <link rel="stylesheet" href="css/responsive/rsp_style-templates.css">
    <title><?php echo PROJECT_NAME;?></title>
</head>
<body>
    <div class="toolbar">
        <div class="toolbar_edgarAggre">
            <p>Edgar</p>
            <img src="svg/edgar-aggre.svg" alt="">
            <p>Aggre</p>
        </div>
            <button class="toolbar_login" onclick="location.href='views/pages/login'">Iniciar Sesion</button>
    </div>
    <div class="container">
        <img src="svg/fondo.svg" class="container_img"alt="">
        <img src="svg/rsp-fondo.svg" class="container_img-rsp" alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="svg/CIBB.svg" alt="">
            </div>
            <div class="container_body_description">
                <p>Comunidad Ispana de Boom Beach</p>
            </div>
            <button class="container_body_register" onclick="location.href='views/pages/register'">Registrarse</button>
            <!-- <a href="index.php?paget=registro">testing</a> -->
        </div>
    </div>

    <?php
   if(isset($_GET["paget"])){
        include "views/pages/register.php";
   }
    ?>
</body>
</html>