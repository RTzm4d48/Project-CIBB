<?php
require_once(URL_PROJECT.'/app/controller/crud.controller.php');
$Row = VALIDATIONS::val_select_datos_fo();
$_SESSION['code_f_o']=$_GET['C'];
?>
<link rel="stylesheet" href= "/public/css/style-fo_home_____.css">
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
                <h1 id="name_leader"><?php echo $Row[0]['user_leader']/* echo'<pre>'; print_r($Row); echo '<pre>'; */?></h1>
            </div>
            <div class="url_w_a">
                <img src="/public/svg/link-solid.svg" alt="">
                <a href=""><?php echo $Row['fo_url_w_a'] ?></a>
            </div>
            <div class="tag">
                <img src="/public/svg/tag-solid.svg" alt="">
                <p>Name</p>
                <p class="text_tag"><?php echo $Row['fo_tag'] ?></p>
                <img class="imgtag" src="/public/svg/copy-solid.svg" alt="">

            </div>
        </div>
        <div class="estadistic">
            <div id="MiGrafica" class="container_estadisticas">
            <canvas id="myChart" style="font-size: 20px;"></canvas>
            </div>
            <button>Acceder a la F.O</button>
            <a href="/h?access=G52157c215">Acceder a la F.O</a>
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
<script src="/public/js/MiGrafica.js"></script>
