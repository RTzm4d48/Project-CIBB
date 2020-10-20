<link rel="stylesheet" href="/css/style-toolbar-right___.css">
<div class="toolbar_right">
            <div class="toolbar_right-menu">
                <img src="/svg/menu-icon.svg" alt="">
            </div>
            <?php
            $code_fo = VALIDATIONS_U::val_verificate_f_o_of_user();
            if(isset($code_fo)) see_fo($code_fo);
            function see_fo($code){
            ?>
            <a href="/h?C=<?php echo $code;?>">
            <div class="toolbar_right-fo">
                <img src="<?php echo"/public/tmp/users/directori_".$_COOKIE['id_user']."/my_f_o_img_little.jpg"?>" class="toolbar_right-fo-img" alt="">
                <img src="/img/F-O.png" class="toolbar_right-fo-ornaments" alt=""> 
            </div>
            </a>
            <?php }?>
            <div class="toolbar_right-user">
                <a href="/"><img src="<?php echo "/public/tmp/users/directori_". $_COOKIE['id_user'] ."/img_perfil_big.jpg" ?>" class="img-user" alt=""></a>
                <a href="/?settings=set&exit=set"><img src="/svg/setings.svg" class="setings-user" alt=""></a>
            </div>
        </div>