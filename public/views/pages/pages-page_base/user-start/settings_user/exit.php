<link rel="stylesheet"href="/public/css/style-settings_user_____.css">
<link rel="stylesheet"href="/public/css/Responsive/rsp_style-settings_user_.css">
<div class="container_user_settings">
<form action=""method="POST">
<div class="img_name Salir">
<h1>SALIR</h1>
<p>Todo listo para cerrar sesion, esperamos volver a verte por aqui.</p>
<input type="submit"name="warning_currarSesion"value="Cerrar Sesion">
</div>
<?php
function rmDir_rf($carpeta){
    foreach(glob($carpeta."/*")as$archivos_carpeta){
        if(is_dir($archivos_carpeta)){
            rmDir_rf($archivos_carpeta);
        }else{
            unlink($archivos_carpeta);
        }
    }
}
if(isset($_POST['sub_salir'])){
rmDir_rf(URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']);
/* setcookie("id_user","0",time()-10);
setcookie("user_id_fo","0",time()-10); */
echo"<script>
var expiry = new Date();
expiry.setTime(expiry.getTime()-3600);
document.cookie='id_user'+'=; expires='+expiry.toGMTString()+'; path=/';
document.cookie='user_id_fo'+'=; expires='+expiry.toGMTString()+'; path=/';
</script>";
/* header('Location: /'); */
echo "<script> location.href='/'; </script>";
}?>
</form>
</div>
