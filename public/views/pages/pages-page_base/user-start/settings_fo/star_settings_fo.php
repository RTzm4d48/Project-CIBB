<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
?>
<link rel="stylesheet" href="/css/style-create-fo_.css">
<link rel="stylesheet" href="/css/style-settings___.css">
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
               <li class="<?php if(isset($_GET['edit']))echo'active';?>"><a href="/?settings_fo=set&edit=set">Editar</a></li>
               <li class="<?php if(isset($_GET['photo']))echo'active';?>"><a href="/?settings_fo=set&photo=set">Fotos</a></li>
               <li class="<?php if(isset($_GET['rules']))echo'active';?>"><a href="/?settings_fo=set&rules=set">Reglas</a></li>
               <li class="<?php if(isset($_GET['fo']))echo'active'?>"><a href="/?settings_fo=set&fo=set">Fuerza Operativa</a></li>
               
           </ul> 
        </div>
        </form>
        <div class="right_tool">
            <?php
            if(isset($_GET['edit'])) echo'Edit';
            if(isset($_GET['fo']))include'fo.php';
            ?>
        </div>
    </div>
</div>