<link rel="stylesheet" href="/css/style-create-fo_.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>

    <?php
    if(isset($_POST['namefok'])){
        include "create-fo/rules-fo.php";
    }else{
        if(isset($_POST['rule_1'])){
            include "create-fo/loading_creation_fo.php";
        }else{
            include "create-fo/data-form.php";
             /*  echo "<script>
                if(window.history.replaceState ){
                    window.history.replaceState(null, null, window.location.href );
                }
              </script>"; */
        }
    }
    ?>
</div>