<div class="fo">
<form action="" method="POST">
    <img src="<?php echo"/public/tmp/f_o/directori_".$_COOKIE['user_id_fo']."/fo_img_big.jpg" ?>" alt="">
    <label for="">Mi Fuerza Operativa</label>
    <p>Nick-Name</p>
    <?php $ex=CTR_QUERYS_USER::ctr_valid_leader();if($ex==true):?>
    <input type="submit"name="warning_calir_fo_leader"value="Abandonar la fuerza operativa leader">
    <?php endif;if($ex==false):?>
    <input type="submit" name="warning_calir_fo" value="Abandonar la fuerza operativa officer">
    <?php endif;
    if(isset($_POST['sb_salir_fo'])){
        $ex=CTR_QUERYS_F_O::get_out_fo();
        if($ex==true){
            //Eliminar la cookie id fo
            echo"<script>var expiry=new Date();expiry.setTime(expiry.getTime()-3600);document.cookie='user_id_fo'+'=;expires='+expiry.toGMTString()+';path=/';</script>";
            echo "<script> location.href='/';</script>";
        }
    }?>
    </form>
</div>
