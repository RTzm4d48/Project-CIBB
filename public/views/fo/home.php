<?php
require_once(URL_PROJECT.'/app/controller/crud.controller.php');
$Row = VALIDATIONS::val_select_datos_fo();
$_SESSION['code_f_o']=$_GET['C'];
?>
<link rel="stylesheet" href= "/public/css/style-fo_home_______.css">
<link rel="stylesheet" href= "/public/css/Responsive/rsp_style-fo_home_.css">
<div class="container_">
    <div class="section_1">
    <!-- "/public/views/fo/default_big.jpg" -->
        <img id="img_foo" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_big.jpg" ?>" alt="">
        <div class="container_responsi_img">
            <img class="fondo" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_big.jpg" ?>" alt="">
            <img class="fo_i_m_g" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_big.jpg" ?>" alt="">
        </div>
        <div class="info">
            <p class='title'>Fuerza Operativa</p>
            <h1 class="tag_fo"><?php echo $Row['name'] ?></h1>
            <div class="leadfor">
                <p>Liderado por:</p>
                <img id="img_leader" src="<?php echo "/public/tmp/f_o/directori_".$Row['fo_id']."/leader_img.jpg" ?>" alt="">
                <div class="conatiner_leader" onclick="box_user(<?php echo $Row[0]['us_id'];?>);"><h1 id="name_leader"><?php echo $Row[0]['user_leader'];/* echo'<pre>'; print_r($Row); echo '<pre>'; */?></h1></div>
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
           <?php if($Row['fo_url_w_a']!='null'):?>
            <div class="url_w_a">
                <img src="/public/svg/link-solid.svg" alt="">
                <a href="https://www.<?php echo $Row['fo_url_w_a']?>" target="_blank"><?php echo $Row['fo_url_w_a']?></a>
            </div>
            <?php endif;?>
            <?php if($Row['fo_tag']!='null'):?>
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
                <p class="text_tag" id="textoetiqueta">#9U2RYRCQ</p>
                <img class="imgtag" src="/public/svg/copy-solid.svg" alt="" onclick="etiquetacopy()">

            </div>
            <div class="tag">
                <img src="/public/svg/tag-solid.svg" alt="">
                <p>URL</p>
                <p class="text_tag" id="textourl">cibb/h?C=<?php echo$_GET['C']?></p>
                <img class="imgtag" src="/public/svg/copy-solid.svg" alt="" onclick="urlcopy()">

            </div>
        </div>
        <div class="estadistic">
            <div id="MiGrafica" class="container_estadisticas">
            <canvas id="myChart" style="font-size: 20px;"></canvas>
            </div>
            <a href="/h?C=<?php echo $_GET['C'];?>&access=get&start=get"><button>Acceder a la F.O</button></a>
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

            <video controls="" name="media"><source src="/public/img/Feet_YKVGVU.mp3" type="audio/mpeg"></video>
            
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
