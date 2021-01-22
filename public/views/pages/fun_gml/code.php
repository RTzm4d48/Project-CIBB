<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/public/js/random_caracters_makeid_.js"></script>
<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_crud_user.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_code_validations.php');
$ex = VALIDATIONS_U::val_select_data_user();
/* echo"<pre>";
print_r($ex);
echo"</pre>"; */
if(!isset($_COOKIE["id_user"]))header('Location: '.'/');
?>
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
<form action="" method="POST">
    <div class="container">
        <img src="/svg/fondo.svg" class="container_img"alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="/svg/CIBB.svg" alt="" onclick="location.href='/'">
            </div>
            <div class="container-register-login">
                <img src="/svg/register.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo register-size"><h1>Valida tu codigo</h1></div>
                    <div style="height:auto;" class="container-register-login_body_space-box">
                        <p>Se envio un codigo de verificacion a tu gmail: <?php echo$ex['gmail']?></p><input onclick="resend_code();" class="btn_v_a_code" type="button" value="Volver a enviar el codigo">
                    </div>
                    <div style="height:auto" class="container-register-login_body_space-box">
                        <input type="text" name='code' style="height:30px;width:100%" value="" required>
                    </div>
                    <p class="container-register-login_body_alert">
                    <?php
                    if(isset($_POST['valid_code'])){
                        $rpt=CTR_QUERYS_CODE_VALIDATIONS::ctr_code_comparison($ex['gmail']);
                        if($rpt)echo"<script>location.href='/';</script>";
                        else echo"EL codigo ingresado es incorrecto";
                    }else{}
                    ?>
                    </p>
                    <button type="submit" name="valid_code"  id="btn-continuar">Continuar</button>
                    <input onclick="salir();" class="btn_v_a_code" style="width:80%;display:flex; margin:5px auto" type="button" value="Salir">
                    <script>
                    function salir(){
                        var expiry = new Date();
                        expiry.setTime(expiry.getTime()-3600);
                        document.cookie='id_user'+'=; expires='+expiry.toGMTString()+'; path=/';
                        document.cookie='user_id_fo'+'=; expires='+expiry.toGMTString()+'; path=/';
                        location.href='/';
                    }
                    function resend_code(){
                        code("<?php echo$ex['gmail']?>");
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