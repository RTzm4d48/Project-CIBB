<?php
require_once(URL_PROJECT.'/app/controller/crud.controller.php');
?>
<link rel="stylesheet" href= "/public/css/style-fo_home____.css">
<link rel="stylesheet" href= "/public/css/Responsive/rsp_style-fo_home.css">
<div class="container_">
    <div class="section_1">
    <!-- "/public/views/fo/default_big.jpg" -->
        <img id="img_foo" src="/public/views/fo/default_big.jpg" alt="">
        <div class="info">
            <p class='title'>Fuerza Operativa</p>
            <h1 class="tag_fo">FRIHETS</h1>
            <div class="leadfor">
                <p>Liderado por:</p>
                <img id="img_leader" src="/public/views/fo/default_big.jpg" alt="">
                <h1 id="name_leader">#Edgar_X</h1>
            </div>
            <div class="url_w_a">
                <img src="/public/svg/link-solid.svg" alt="">
                <a href="">edgar.somee.com</a>
            </div>
            <div class="tag">
                <img src="/public/svg/tag-solid.svg" alt="">
                <p>Name</p>
                <p class="text_tag">[FRS]</p>
                <img class="imgtag" src="/public/svg/copy-solid.svg" alt="">

            </div>
        </div>
        <div class="estadistic">
            <div id="MiGrafica" class="container_estadisticas">
            <canvas id="myChart" style="font-size: 20px;"></canvas>
            </div>
            <button>Acceder a la F.O</button>
        </div>
    </div>
    <div class="section_2">
        <div class="bisection_1">
            <div class="description">
                <h5>Descripción</h5>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate.</p>
            </div>

            <video controls="" name="media"><source src="/public/img/Feet_YKVGVU.mp3" type="audio/mpeg"></video>
            
        </div>
        <!-- <div class="bisection_2">
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
        </div> -->
    </div>
</div>
<script src="/public/js/Chart.js"></script>
<script src="/public/js/MiGrafica.js"></script>
