<!-- <link rel="stylesheet" href="/css/style-create-fo_.css"> -->
<link rel="stylesheet" href="/css/style-settings________.css">
<link rel="stylesheet" href="/css/responsive/rsp_style-settings_____.css">
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
            <li class="<?php if(isset($_GET['exit']))echo'active';?>"><a href="/?settings=set&exit=set">Salir</a></li>
            <li class="<?php if(isset($_GET['edit']))echo'active';?>"><a href="/?settings=set&edit=set">Editar cuenta</a></li>
            <li class="<?php if(isset($_GET['changePass']))echo'active';?>"><a href="/?settings=set&changePass=set">Cambiar contraseña</a></li>
           </ul> 
        </div>
        </form>
        <div class="right_tool">
            <?php
            if(isset($_GET['edit']))include'edit.php';
            if(isset($_GET['changePass']))include'changPass.php';
            if(isset($_GET['exit']))include'exit.php';
            ?>
        </div>
    </div>
</div>
