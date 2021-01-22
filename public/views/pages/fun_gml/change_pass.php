<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_code_validations.php');
?>
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
<!-- <form action="" method="POST"> -->
    <div class="container">
        <img src="/svg/fondo.svg" class="container_img"alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="/svg/CIBB.svg" alt="" onclick="location.href='/'">
            </div>
            <div class="container-register-login">
                <img src="/svg/register.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo register-size"><h1>Ingrese su gmail</h1></div>
                    <div style="height:auto;" class="container-register-login_body_space-box">
                        <p>Ingrese el gmail afiliado a tu cuenta para poder cambiar la contraseña</p>
                    </div>
                    <div style="height:auto;" class="container-register-login_body_space-box">
                        <input type="text" name='code' id="text_code" style="height:30px;width:100%" value="">
                    </div>
                    <p id="txt_alert" class="container-register-login_body_alert" style="width: 80%; text-align:center;">
                    <?php
                    /* echo $ex = CTR_QUERYS_CODE_VALIDATIONS::ctr_compare_gmail('laurai@gmail.com'); */
                    ?>
                    </p>
                    <button onclick="code_chanel_pass();" type="submit" name="valid_code"  id="btn-continuar">Cosntinuar</button>
                    <script>
                    function salir(){
                        var expiry = new Date();
                        expiry.setTime(expiry.getTime()-3600);
                        document.cookie='id_user'+'=; expires='+expiry.toGMTString()+'; path=/';
                        document.cookie='user_id_fo'+'=; expires='+expiry.toGMTString()+'; path=/';
                    }
                    function code_chanel_pass(){
                        var gmail = document.getElementById('text_code').value;
                        var code = 'Ch_'+makeid(5);
                        var mydata = 'gmail='+gmail+'&code='+code;
                        $.ajax({
                            url: '/public/ajax/codes/ajax_code_chanel_pass.php',
                            type: 'POST',
                            data: mydata,
                            dataType: 'json',
                            success:function(rpt){
                                if(rpt==true){
                                    location.href='/views/pages/fun_gml/change_pass_wait';
                                }else{
                                    $('#txt_alert').html(rpt);
                                }
                            }
                        });
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
</body>
</html>