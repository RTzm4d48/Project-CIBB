<link rel="stylesheet" href="/css/style-toolbar-right____.css">
<div id="id_toolbar_right" class="toolbar_right">
            <div class="toolbar_right-menu">
                <img src="/svg/menu-icon.svg" alt="">
            </div>
            <?php
            $code_fo=VALIDATIONS_U::val_verificate_f_o_of_user();
            if(isset($code_fo))see_fo($code_fo);
            function see_fo($code){
            ?>
            <a href="/h.php?C=<?php echo $code;?>">
            <div class="toolbar_right-fo">
                <img src="<?php echo"/public/tmp/users/directori_".$_COOKIE['id_user']."/my_f_o_img_little.jpg"?>" class="toolbar_right-fo-img" alt="">
                <img src="/img/F-O.png" class="toolbar_right-fo-ornaments" alt=""> 
            </div>
            </a>
            <?php }if(isset($_COOKIE['id_user'])):?>
            <div class="toolbar_right-user">
                <a href="/"><img src="<?php echo "/public/tmp/users/directori_". $_COOKIE['id_user'] ."/img_perfil_big.jpg" ?>" class="img-user" alt=""></a>
                <a href="/?settings=set&exit=set"><img src="/svg/setings.svg" class="setings-user" alt=""></a>
            </div>
            <?php endif;if(!isset($_COOKIE['id_user'])):
                require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
                $ex=CTR_QUERYS_F_O::ctr_obtain_id_fo();
                ?>
            <a href="/h?C=<?php echo $_SESSION['code_f_o'];?>">
                <div class="toolbar_right-fo">
                <img src="<?php echo"/public/tmp/f_o/directori_".$ex."/fo_img_little.jpg";?>" class="toolbar_right-fo-img" alt="">
                <img src="/img/F-O.png" class="toolbar_right-fo-ornaments" alt=""> 
                </div>
            </a>
            <?php endif;?>

        </div>