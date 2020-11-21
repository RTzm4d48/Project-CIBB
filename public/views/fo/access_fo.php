<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_user.php');
require_once(URL_PROJECT.'/app/controller/ctr_fo_access.php');
?>
<link rel="stylesheet" href="/css/style-settings________.css">
<link rel="stylesheet" href="/css/style-access_fo_.css">
<link rel="stylesheet" href="/css/style-members_.css">
<link rel="stylesheet" href="/css/style-rules.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>
    <div id="conteiner">
        <?php
        $tree_img=CTR_FO_ACCESS::ctr_select_tree_users_img();
        $all_user_num=CTR_FO_ACCESS::ctr_select_num_all_user();
        if(isset($_GET['start'])){
            include URL_PROJECT."/public/views/fo/access_start.php";
        }else if(isset($_GET['members'])){
            include URL_PROJECT."/public/views/fo/members_bosters.php";
        }else if(isset($_GET['rules'])){
            include URL_PROJECT."/public/views/fo/rules_fo.php";
        }else{echo"<div style='color: white;font-family:Arial;text-align:center;width:90%;margin:0px auto'>";
        exit('<h1>Error #404 <br> vuelva a intentarlo mas tarde.</h1>');echo"</div>";}
        ?>
    </div>
</div>