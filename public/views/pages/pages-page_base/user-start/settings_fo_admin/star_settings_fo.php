<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
?>
<link rel="stylesheet" href="/css/style-create-fo__.css">
<link rel="stylesheet" href="/css/style-settings______.css">
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
               <li class="<?php if(isset($_GET['edit']))echo'active';?>"><a href="/?settings_fo_admin=set&general=set">General</a></li>
               <li class="<?php if(isset($_GET['photo']))echo'active';?>"><a href="/?settings_fo_admin=set&administration=set">Administracion</a></li>
               <li class="<?php if(isset($_GET['rules']))echo'active';?>"><a href="/?settings_fo_admin=set&event=set">Eventos</a></li>
           </ul> 
        </div>
        </form>
        <div class="right_tool">
            <?php
            if(isset($_GET['general']))echo'Esto es general';
            if(isset($_GET['administration']))echo'Esto es administracion';
            if(isset($_GET['event']))echo'Esto es eventos';
            ?>
        </div>
    </div>
</div>