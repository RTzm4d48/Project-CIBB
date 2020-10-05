<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_crud_user.php');
$ex = new VALIDATIONS();
$ex->val_select_data_user();
$username = 'name';
?>
<link rel="stylesheet" href="/css/style-user-start____.css">
<link rel="stylesheet" href="/css/Responsive/rsp_style-user-start_.css">
<div class="container">
    <div class="container-perfil font_containers">
        <img src="<?php echo "/public/tmp/users/directori_". $_COOKIE['id_user'] ."/img_perfil.jpg" ?>" alt="">
        <div class="container-perfil-data">
            <h3>NOMBRE DE USUARIO</h3>
            <p><?php echo $username; ?></p>
            <br>
            <h3>ESTADO</h3>
            <p>Creo en que con dedicasion perseverancia y trabajo todos los sueños son posibles</p>
        </div>
    </div>

    <div class="container-date font_containers">
        <div class="area">
            <p>Rango:</p>
            <p class="p_dinamic">Oficial</p>
        </div>
        <div class="area">
            <p>Puntos:</p>
            <p class="p_dinamic">25</p>
        </div>
        <div class="area">
            <p>Participaciones:</p>
            <p class="p_dinamic">5</p>
        </div>
        <div class="area">
            <p>Puesto:</p>
            <p class="p_dinamic">10</p>
        </div>
    </div>
    <div class="container-subcontainer">
        <!-- box -->
        <?php include "user-start/event.php" ?>
        <?php include "user-start/ranking.php" ?>
        <?php include "user-start/fo.php" ?>
        <?php include "user-start/setingsUsers.php" ?>
    </div>
</div>