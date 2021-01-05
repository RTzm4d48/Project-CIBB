<?php
require_once(URL_PROJECT.'/app/controller/ctr_message.php');
$data=CTR_MESSAGE::ctr_select_message();
$Row = VALIDATIONS::val_select_datos_fo();
if(isset($_COOKIE['id_user'])){
$my_message=CTR_MESSAGE::ctr_select_my_message();
}
$text=(isset($my_message))?$my_message:null;
/* echo'<pre>';
print_r($data);
echo'</pre>'; */
$valid_mi_fo=CTR_MESSAGE::ctr_valid_my_fo($_GET['C']);
?>
<a href="/h.php?C=<?php echo $_GET['C'];?>&access=get&members=get">
        <div class="container_integrantes">
            <samp><h1>⚔INTEGRANTES BOSTERS</h1></samp>
            <?php if($tree_img):?>
            <span>
                <img id="img1"src="/public/tmp/all_img_users/user_<?php echo$tree_img[0]?>_img.jpg" alt="">
                <img id="img2"src="/public/tmp/all_img_users/user_<?php echo$tree_img[1]?>_img.jpg" alt="">
                <img id="img3"src="/public/tmp/all_img_users/user_<?php echo$tree_img[2]?>_img.jpg" alt="">
                <div class="container_marcador">
                    <p>+<?php echo$all_user_num;?></p>
                </div>
            </span>
            <?php endif;?>
        </div>
        </a>
        <a href="/h.php?C=<?php echo $_GET['C'];?>&access=get&rules=get">
        <div class="container_reglas">
            <samp><h1>📋REGLAS DE LA FUERZA OPERATIVA📋</h1></samp>
        </div>
        </a>
        <hr>
        <?php
        $my_fo_id=(isset($_COOKIE['user_id_fo']))?$_COOKIE['user_id_fo']:00404;
        if($my_fo_id==$valid_mi_fo):?>
            <div class="container_message">
            <img src="<?php echo "/public/tmp/users/directori_". $_COOKIE['id_user'] ."/img_perfil_big.jpg"?>" alt="">
            <div class="container_txt_button">
            <textarea id="text_area" name="description" maxlength="250" rows="3" cols="5" required><?php echo$text;?></textarea>
            <div class="butt">
            <button id="id_button_A_P" onclick="alert_message();"><?php if($my_message!=false)echo"Actualizar";else echo'Publicar'?></button>
            <button class="<?php if($my_message==false)echo'borrar_none';else echo'borrar';?>"<?php if($my_message!=false)echo" onclick='alert_deleted_message();'";?>>Borrar</button>
            </div>
            </div>
            </div>
        <?php endif;?>
        <div class="container_commentary">
        <?php for($i=0;$i<$data['Row'];$i++):?>
            <div class="commentary" >
                <img style="cursor:pointer;" src="/public/tmp/all_img_users/user_<?php echo$data['data'][$i][2]?>_img.jpg" alt="" onclick="box_user(<?php echo$data['data'][$i][2];?>);">
                <div class="name_commentary">
                    <h1 onclick="box_user(<?php echo$data['data'][$i][2];?>);" style="cursor:pointer;"><?php echo$data['data'][$i][0];if($data['data'][$i][3]=='yes')echo"<img style='width:auto;height:15px;position:relative;top:2px;margin:auto 2px;background:none;' src='/public/img/img04.png'>";?></h1>
                    <p><?php echo$data['data'][$i][1]?></p>
                </div>
            </div>
        <?php endfor;?>
        </div>
        <script src="/js/perfil_user__.js"></script>
           <script>
                function box_user(id_user){
                    $.ajax({
                    url: '/public/ajax/ajax_perfil_users.php',
                    type: 'POST',
                    data: 'id_user='+id_user,
                    dataType: "json",
                    success:function(rpt){
                        user_box(rpt);
                    }
                });
                }
           </script>
        <form action="" method="POST">
            <?php
            $ex=CTR_QUERYS_USER::ctr_valid_fo_user();if($ex):?>
        <input class="unirse_false" type="submit" name="warning_unirse_false" value="Unirse">
            <?php endif;if(!$ex):?>
        <input class="unirse_true" type="submit" name="warning_unirse" value="Unirse">
            <?php endif;?>
        </form>
        <?php
        $_SESSION['url']=$Row['fo_url_b_b_f'];
        if(isset($_POST['warning_unirse'])){
            $ex=CTR_QUERYS_F_O::ctr_obtain_id_fo();
            $_SESSION['fo_id']=$ex;
        }
        if(isset($_POST['sb_unirse'])){
            if(!isset($_COOKIE['id_user'])){
                echo"<script>window.open('".$Row['fo_url_b_b_f']."','_blank');</script>";
                echo"<script>location.href='/h?C=".$_SESSION['code_f_o']."';</script>";
            }else{
                $ex=CTR_QUERYS_USER::ctr_join_to_fo();
                if($ex==true){
                    echo"<script>window.open('".$Row['fo_url_b_b_f']."','_blank');</script>";
                    echo"<script>location.href='/h?C=".$_SESSION['code_f_o']."';</script>";
                }else{
                    echo'Ocurrio un error, buelve a intentarlo mas tarde';
                }
            }
        }?>
<script>
    function alert_message(){
        var text = document.getElementById('text_area').value;
        if(text=='')messagebox_2('Hubo un problema','El campo de texto esta vacio, por favor escriba algo.');
        else messagebox_1('Publicar','¿Estas seguro de publicar este mensage?','message()');
    }
    function alert_deleted_message(){
        messagebox_1('Publicar','¿Estas seguro de eliminar este mensage?','deleted_message()');
    }
    function message(){
        var text = document.getElementById('text_area').value;
        $.ajax({
        url: '/public/ajax/ajax_message.php',
        type: 'POST',
        data: 'text='+text,
        /* dataType: "json", */
        success:function(rpt){
            if(rpt == true)closet();
            else messagebox_2('error','ocurrio un error, intentalo nuevamente mas tarde.');
            actualizar();
        }
    });
    }
    function actualizar(){location.reload(true);}
    function deleted_message(){
        $.ajax({
        url: '/public/ajax/ajax_message.php',
        type: 'POST',
        data: 'deleted=get',
        /* dataType: "json", */
        success:function(rpt){
            if(rpt==true)closet();
            else messagebox_2('error','ocurrio un error, intentalo nuevamente mas tarde.');
            actualizar();
            /* alert(rpt); */
        }
    });
    }
</script>
<script src="/public/js/warning_.js"></script>
<!-- //PAINT -->
<?php
$color_data = VALIDATIONS::ctr_obtaiin_color();
if($color_data != false){
echo"
<script>
    $('#id_body').css('background','".$color_data['c1']."');
    
    $('#id_btn_login').css('background','".$color_data['c2']."');
    $('#id_btn_register').css('background','".$color_data['c2']."');
    $('#id_button_A_P').css('background','".$color_data['c2']."');
    $('.unirse_true').css('background','".$color_data['c2']."');
    $('#id_p_u_cerrar_btn').css('background','".$color_data['c2']."');
    
    $('.container_body-espace-container').css('background','linear-gradient(to right,#ffffff00, ".$color_data['c3']."35, #ffffff00)');
    
    $('.container_reglas').css('background','".$color_data['c6']."');
    $('.container_integrantes').css('background','".$color_data['c6']."');
    $('.container_message').css('background','".$color_data['c4']."98');
    $('.header_cibb').css('background','".$color_data['c4']."98');
    $('.container').css('background','".$color_data['c4']."30');

    $('.toolbar_right-menu').html('<img src=/public/svg/menu-icon_width.svg>');
    $('#toolbar_top').css('background','".$color_data['c4']."');
    $('#id_toolbar_right').css('background','".$color_data['c4']."b4');
    $('.toolbar_right-menu').css('background','".$color_data['c4']."b4');

</script>
";
}
?>