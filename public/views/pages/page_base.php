<?php
session_start();
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_crud_user.php');
require_once(URL_PROJECT.'/app/controller/crud.controller.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles-general___.css">
    <link rel="stylesheet" href="/css/responsive/rsp_style-general__.css">
    <link rel="stylesheet" href="/css/style-advert__.css">
    <title>@nameUser</title>
</head>
<body>
<?php if(isset($_POST['warning_unirse']))warning('Unirse','¿Estas seguro de querer unirte a esta fuerza operativa? <br><br> Copia el link por si no se te redirecciona.','sb_unirse',true,true);
if(isset($_POST['warning_unirse_false']))warning('Hubo un error','Tu ya perteneces a una fuerza operativa','--',false,false);
if(isset($_POST['warning_currarSesion']))warning('Salir','¿Estas seguro de que quieres cerrar sesion?','sub_salir',false,true);
?>

    <?php function warning($titulo,$especificacion,$sub_aceptar,$texbox,$btncancel_aceptar){?>
    <div id="id_warning" class="container_advert">
        <div class="advert">
            <h4><?php echo$titulo;?></h4>
            <p><?php echo$especificacion;?></p>
            <?php if($texbox==true)echo"<input class='url' type='text' name='' value='cibb/h?fo=1c5d4c22' id=''>";?>
            <hr>
            <div class="buttons">
                <?php if($btncancel_aceptar==true)echo"<input type='submit'value='Cancelar'onclick='closet();'class='cancel'>
                <form action='' method='POST'>
                <input type='submit' value='Aceptar' name='".$sub_aceptar."' class='acept'>
                </form>";if($btncancel_aceptar==false)echo"<input type='submit'value='Aceptar'onclick='closet();'class='acept'>";?>
                
                
                
            </div>
            <script>
            function closet(){
                $("#id_warning").addClass("no");
            }
            </script>
        </div>
       
    </div>
    <?php }?>
    <div class="container_body">
        <!-- toolbar -->
        <style>
            .no{
                display: none;
            }
        </style>
        <div id="toolbar_right" class="minn_screen">
            <div class="toolbar_in_fullscreen">
            <?php include"pages-page_base/toolbar-right.php";?>
            </div>
        </div>
        <div id="espace" class="container_body-espace min_screen">
            <div id="toolbar_top" class="container_body-espace-toolbar_top min_screen">
                <!--------------------radio--------------------->
                <input type="radio" id="show1" name="group" value="option1" />
                <input type="radio" id="show2" name="group" value="option2" />
                <!--------------------radio--------------------->
                <label class="bar" for="show2">
                <img src="/svg/bars-solid.svg" alt="" onclick="abrir_toolbar();">
                </label>
                <label class="x"for="show1" >
                    <img src="/svg/x-solid.svg" alt="" onclick="cerrar_toolbar();"  >
                </label>
                
                <script>
                 function cerrar_toolbar(){
                            $("#espace").removeClass("min_screen");
                            $("#toolbar_top").removeClass("min_screen");
                            /* $("#toolbar_right").text(respuesta); */
                            $("#toolbar_right").addClass("no");
                            /* console.log(respuesta); */
                            $("#espace").addClass("extend_full");
                            $("#toolbar_top").addClass("extend_full");
                      }
                function abrir_toolbar(){
                            $("#espace").removeClass("min_screen");
                            $("#toolbar_top").removeClass("min_screen");
                            /* $("#toolbar_right").html(respuesta); */
                            $("#toolbar_right").removeClass("no");
                            $("#toolbar_right").removeClass("minn_screen");
                            /* console.log(respuesta); */
                            $("#espace").removeClass("extend_full");
                            $("#toolbar_top").removeClass("extend_full") 
                      }
                    </script>
                <?php if(isset($_COOKIE['id_user'])):?>
                <a href="/?search=set"><img src="/svg/search-solid.svg" alt=""></a>
                <?php endif;if(!isset($_COOKIE['id_user'])):?>
                    <div class="loginRegister">
                        <a class="btn_login" href="/public/views/pages/login.php">Iniciar Sesion</a>
                        <a class="btn_register" href="/public/views/pages/register.php">Registrarse</a>
                    </div>
                <?php endif;?>
            </div>
            <div class="container_body-espace-container">
                <?php
                if(isset($_GET['pagina'])){
                    include "pages-page_base/f_o.php";
                }else if(isset($_GET['new_fo'])){
                    include "pages-page_base/create-fo.php"; 
                }else if(isset($_GET['C'])){
                    include URL_PROJECT."/public/views/fo/home.php";
                }else if(isset($_GET['access'])){
                    include URL_PROJECT."/public/views/fo/access_fo.php";
                }else if(isset($_GET['settings'])){
                    include "pages-page_base/user-start/settings_user/start_settings_user.php";
                }else if(isset($_GET['settings_fo_admin'])){
                    include "pages-page_base/user-start/settings_fo_admin/star_settings_fo.php";
                }else if(isset($_GET['settings_fo'])){
                    include "pages-page_base/user-start/settings_fo/star_settings_fo.php";
                }else if(isset($_GET['search'])){
                    include "pages-page_base/search.php";
                }else{
                    include "pages-page_base/user-start.php"; 
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>