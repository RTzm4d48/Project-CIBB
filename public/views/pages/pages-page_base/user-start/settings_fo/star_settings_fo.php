<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_user.php');
?>
<!-- stilos generales -->
<link rel="stylesheet" href="/css/style-settings________.css">   
<link rel="stylesheet" href="/css/responsive/rsp_style-settings_____.css">
<!-- style for settings fo -->
<link rel="stylesheet"href="/public/css/style-settings_fo________.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>
    <div id="conteiner">
    </div>
    <div class="theconteiner">
        <form action="" id="myForm" method="GET">
        <div class="left_tool">
           <ul>
           <li class="<?php if(isset($_GET['fo']))echo'active'?>"><a href="/?settings_fo=set&fo=set">Fuerza Operativa</a></li>
           <?php $ex=CTR_QUERYS_USER::ctr_valid_leader();if($ex==true):?>
               <li class="<?php if(isset($_GET['edit']))echo'active';?>"><a href="/?settings_fo=set&edit=set">Editar</a></li>
               <li class="<?php if(isset($_GET['photo']))echo'active';?>"><a href="/?settings_fo=set&photo=set">Fotos</a></li>
               <li class="<?php if(isset($_GET['rules']))echo'active';?>"><a href="/?settings_fo=set&rules=set">Reglas</a></li>
           <?php endif;?>
           </ul> 
        </div>
        </form>
        <div class="right_tool">
            <?php
            if(isset($_GET['edit']))include'edit.php';
            if(isset($_GET['fo']))include'fo.php';
            if(isset($_GET['photo']))include'photo.php';
            if(isset($_GET['rules']))include'rules.php';
            ?>
        </div>
    </div>
</div>