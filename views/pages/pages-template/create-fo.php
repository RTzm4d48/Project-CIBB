<link rel="stylesheet" href="/css/style-create-fo__.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>
    <?php
    if(isset($_POST['namefok'])){
        $s = $_POST['namefok'];
        echo 'lol '. $s;

        include "create-fo/rules-fo.php";

       /*  echo "<script>
                if(window.history.replaceState ){
                    window.history.replaceState(null, null, window.location.href );
                }
              </script>"; */
    }else{
        echo 'lola';
        include "create-fo/data-form.php";
    }
    ?>
</div>