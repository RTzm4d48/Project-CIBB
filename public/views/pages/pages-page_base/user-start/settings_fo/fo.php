<?php
ob_start();
?>
<div class="fo">
<form action="" method="POST">
    <img src="<?php echo "/public/tmp/f_o/directori_". $_COOKIE['user_id_fo'] ."/fo_img_big.jpg" ?>" alt="">
    <label for="">Mi Fuerza Operativa</label>
    <p>Nick-Name</p>
    <input type="submit" name="sb_calir_fo" value="Abandonar la fuerza operativa">
    <?php
    if(isset($_POST['sb_calir_fo'])){
        $ex = CTR_QUERYS_F_O::get_out_fo();
        if($ex == true){
            /* setcookie('user_id_fo', 'none', strtotime( '+360 days' ), '/');
            header('Location: /'); */
            echo "<script> location.href='/'; </script>";
        }else{
        }
    }
    ?>
    </form>
</div>
