<link rel="stylesheet" href="/css/style-create-fo_.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/controllers/crud.controller.php');
    $ex = new VALIDATIONS();

    if(isset($_POST['namee'])){
        $ex -> val_insert_fo();
    }else if(isset($_POST['rule_1']) && isset($_POST['prohibition_1'])){
        $ex -> val_insert_rules();
    }else{
        include "create-fo/data-form.php";   
        /* include ($_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/rules-fo.php"); */
        }
    
    ?>
</div>