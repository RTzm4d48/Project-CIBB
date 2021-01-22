<?php

$id=(isset($_GET['i']))?$_GET['i']:'null';
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_code_validations.php');
$ex=CTR_QUERYS_CODE_VALIDATIONS::ctr_valid_code_pass($id);
if($ex==false) header('Location: '.'/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style-register-login_.css">
    <link rel="stylesheet" href="/css/responsive/rsp_style-register-login_.css">
    <title>Chanel pass</title>
</head>
<body> 
<!-- <form action="" method="POST"> -->
    <div class="container">
        <img src="/svg/fondo.svg" class="container_img"alt="">
        <div class="container_body">
            <div class="container_body_logoCIBB">
                <img src="/svg/CIBB.svg" onclick="location.href='/'" alt="">
            </div>
            <div class="container-register-login">
                <img src="/svg/login.svg" alt="">
                <div class="container-register-login_body">
                    <div class="container-register-login_body_titulo"><h1>Cambiar de contraseña</h1></div>
                    <div class="container-register-login_body_space-box">
                        <p>NUEVO PASSWORD</p>
                        <input type="password" maxlength="20" minlength="8"  name="password1" value="12345678" id="password1" required>
                    </div>
                    <div class="container-register-login_body_space-box">
                        <p>REPITE EL NUEVO PASSWORD_</p>
                        <input type="password" maxlength="20" minlength="8"  name="password2" value="12345678" id="password2" required>
                    </div>
                    <p id="m_alert" class="container-register-login_body_alert">

                    <?php
                    require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
                    require_once(URL_PROJECT.'/app/controller/ctr_crud_user.php');
                    if(isset($_POST['login_user'])){
                        
                    }else{}

                    ?>
                    </p>
                    <button onclick="chanel_pass();" type="submit" name="login_user" id="btn-continuar">Confirmar</button>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="/public/js/random_caracters_makeid_.js"></script>
                    <script>
                    function chanel_pass(){
                        var pass1 = document.getElementById('password1').value;
                        var pass2 = document.getElementById('password2').value;
                        var id="<?php echo$id;?>";
                        var id_user=<?php echo$id;?>;
                        var num_word = document.getElementById('password1').value.length;
                        if( pass1=='' || pass2==''){$('#m_alert').html('Hubo un problema, faltan rellenar algunos campos');}
                        else if(num_word < 8){$('#m_alert').html('la contraseña tiene que tener mas de 8 digitos');}
                        else if(pass1 != pass2 ){$('#m_alert').html('las contraseñas no coinsiden');}
                        else if(id=='null'){
                            $('#m_alert').html('Usuario no reconocido');
                        }else{
                            //precedimiento de cambio de password
                            $('#m_alert').html('todo correcto');
                                var mydata="id="+id_user+"&pass="+pass1;
                                $.ajax({
                                    url: '/public/ajax/codes/ajax_code_chanel_password.php',
                                    type: 'POST',
                                    data: mydata,
                                    dataType: 'json',
                                    success:function(rpt){
                                        if(rpt==true){
                                            alert('lol es true');
                                        }else{
                                            alert('lol es false');
                                        }
                                    }
                            });
                        }
                    }
                    //En editar el perfil tengo que fijarme en que se valide el gmail para que s¿no se repita
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
</body>
</html>