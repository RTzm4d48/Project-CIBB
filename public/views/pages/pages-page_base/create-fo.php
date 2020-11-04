<?php
?>
<link rel="stylesheet" href="/css/style-create-fo__.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>

    <div id="conteiner">
        
    </div>

    <?php
    require_once(URL_PROJECT.'/app/controller/ctr_create_f_o.php');
    $ex=new CTR_CREATE_F_O();

   if(isset($_POST['sb_data'])){
     if($_COOKIE['user_id_fo'] != 'none'){
          header('Location: /');
     }else{
          $ex -> val_insert_fo();
     }
   }
   else if(isset($_POST['sb_rules'])){
        $ex -> val_insert_rules();
   }else{
        include "create-fo/data-form.php";  
        /* include ($_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/rules-fo.php"); */ 
   }
    ?>

</div>