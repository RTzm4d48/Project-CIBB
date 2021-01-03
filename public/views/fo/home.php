<?php
require_once(URL_PROJECT.'/app/controller/crud.controller.php');
$Row = VALIDATIONS::val_select_datos_fo();
$this_ismi_fo = VALIDATIONS::ctr_obtain_code_my_fo();
$fo_premium = VALIDATIONS::ctr_valid_premium_fo();
/* echo'<pre>';
print_r($Row);
echo'</pre>'; */
$_SESSION['code_f_o']=$_GET['C'];
?>

<link rel="stylesheet" href= "/public/css/style-fo_home__.css">
<link rel="stylesheet" href= "/public/css/Responsive/rsp_style-fo_home____.css">
<!-- link fo name -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
<!-- end -->
<div id="container_c_" class="container_">
    <div class="section_1">
    <!-- "/public/views/fo/default_big.jpg" -->
        <img id="img_foo" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_big.jpg" ?>" alt="">
        <div class="container_responsi_img">
            <img class="fondo" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_big.jpg" ?>" alt="">
            <img class="fo_i_m_g" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_big.jpg" ?>" alt="">
        </div>
        <?php if($this_ismi_fo==true and $fo_premium==false):?>
        <a class="a_puch" href="/h.php?C=<?php echo $_GET['C'];?>&purchase=get"><div class="conteiner_btn_premium"><img src="/public/svg/premium_icon.svg" alt=""></div></a>
        <?php endif;?>
        <div class="info">
            <p class='title'>Fuerza Operativa</p>
            <P class="tag_fo"><?php echo $Row['name'] ?></P>
            <div class="leadfor">
                <p>Liderado por:</p>
                <img id="img_leader" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/leader_img.jpg" ?>" alt="">
                <div class="conatiner_leader" onclick="box_user(<?php echo $Row[0]['us_id'];?>);"><h1 id="name_leader"><?php echo $Row[0]['user_leader'];?></h1></div>
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
           <?php if($Row['fo_url_w_a']!=''):?>
            <div class="url_w_a">
                <img src="/public/svg/link-solid.svg" alt="">
                <a href="https://www.<?php echo $Row['fo_url_w_a']?>" target="_blank"><?php echo $Row['fo_url_w_a']?></a>
            </div>
            <?php endif;?>
            <?php if($Row['fo_tag']!=''):?>
            <div class="tag">
                <img src="/public/svg/tag-solid.svg" alt="">
                <p>Eslogan</p>
                <p class="text_tag" id="textoeslogan"><?php echo $Row['fo_tag']?></p>
                <img class="imgtag" src="/public/svg/copy-solid.svg" alt="" onclick="eslogancopy()">
            </div>
            <?php endif;?>
            <div class="tag">
                <img src="/public/svg/tag-solid.svg" alt="">
                <p>Etiqueta</p>
                <p class="text_tag" id="textoetiqueta"><?php echo$Row['fo_label']?></p>
                <img class="imgtag" src="/public/svg/copy-solid.svg" alt="" onclick="etiquetacopy()">

            </div>
            <div class="tag">
                <img src="/public/svg/tag-solid.svg" alt="">
                <p>URL</p>
                <p class="text_tag" id="textourl"><?php echo'cibb.com/h.php?C='.$_GET['C']?></p>
                <img class="imgtag" src="/public/svg/copy-solid.svg" alt="" onclick="urlcopy()">

            </div>
        </div>
        <div class="estadistic">
            <div id="MiGrafica" class="container_estadisticas">
            <canvas id="myChart" style="font-size: 20px;"></canvas>
            </div>
            <div class="mis_botons">
                <a href="/h.php?C=<?php echo $_GET['C'];?>&access=get&start=get"><button class="btn_a_a_fo_"><?php if($this_ismi_fo==true)echo'Acceder a mi F.O';else echo'Acceder a la F.O';?></button></a>
                <?php if($this_ismi_fo==true):?>
                <a  href="/h.php?C=<?php echo $_GET['C'];?>&purchase=get"><div class="conteiner_btn_premium_2"><img src="/public/svg/premium_icon.svg" alt=""></div></a>
                <?php endif?>
            </div>
        </div>
    </div>
    <div class="section_2">
        <div class="bisection_1">
            <div class="description">
                <span>
                <i class="icono"></i><h5>Descripción</h5>
                </span>
                <span>
                <div class="line"></div><p><?php echo $Row['description'] ?></p>
                </span>
            </div>
            <?php if($Row['fo_url_m']!=''):?>
            <video controls="" name="media"><source src="<?php echo$Row['fo_url_m'];?>" type="audio/mpeg"></video>
            <?php endif;?>
            
        </div>
        <div class="bisection_2">
            <img src="public/tmp/f_o/directori_<?php echo $Row['fo_id'];?>/photo_01.jpg" alt="">
            <img src="public/tmp/f_o/directori_<?php echo $Row['fo_id'];?>/photo_02.jpg" alt="">
            <img src="public/tmp/f_o/directori_<?php echo $Row['fo_id'];?>/photo_03.jpg" alt="">
        </div>
    </div>
</div>
<script src="/public/js/Chart.js"></script>
<script src="/public/js/MiGrafica___.js"></script>
<script src="/public/js/PortaPapeles_.js"></script>
<!-- //PAINT -->
<?php
$color_data = VALIDATIONS::ctr_obtaiin_color();
if($color_data != false){
echo"
<script>
    $('#id_body').css('background','".$color_data['c1']."');
    
    $('#id_btn_login').css('background','".$color_data['c2']."');
    $('#id_btn_register').css('background','".$color_data['c2']."');
    $('#id_p_u_cerrar_btn').css('background','".$color_data['c2']."');

    $('.container_body-espace-container').css('background','linear-gradient(to right,#ffffff00, ".$color_data['c3']."35, #ffffff00)');

    $('#toolbar_top').css('background','".$color_data['c4']."');
    $('#id_toolbar_right').css('background','".$color_data['c4']."b4');
    $('.section_2').css('background','".$color_data['c6']."98');
    $('.toolbar_right-menu').css('background','".$color_data['c4']."b4');
    $('.toolbar_right-menu').html('<img src=/public/svg/menu-icon_width.svg>');
    
    $('.estadistic').css('background','".$color_data['c4']."10');


    $('.btn_a_a_fo').css('background','".$color_data['c5']."');

</script>
";
}
?>
