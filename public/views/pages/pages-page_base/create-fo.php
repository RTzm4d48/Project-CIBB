<link rel="stylesheet" href="/css/style-create-fo_.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>

    <div id="conteiner">
        
    </div>

    <?php
    require_once(URL_PROJECT.'/app/controller/crud.controller.php');
    $ex = new VALIDATIONS();

   if(isset($_POST['sb_data'])){
        $ex -> val_insert_fo();
   }
   else if(isset($_POST['sb_rules'])){
        $ex -> val_insert_rules();
   }else{
        include "create-fo/data-form.php";  
        /* include ($_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/rules-fo.php"); */ 
   }
    ?>

</div>