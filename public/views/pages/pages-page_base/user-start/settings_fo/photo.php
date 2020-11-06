<div class="photo">
<form action="" method="POST" enctype="multipart/form-data">
    <div class="header_button">
        <img src="/public/svg/plus-square-solidd.svg" alt="">
        <h1>Fotografias de mmi fuerza operativa</h1>
        <p>Las fotografias ayuda a mostrar una mejor imagen de tu fuerza operativa.
        Tamaño maximo recomedado (1280p).</p>
       
        <p style="font-size:13px;color:#34B6F7;">⚠ Puede que tarde unos cuantos segundos en mostrarse los cambios Guardados.</p>
    </div>
    <div class="conatiner_photos">
        <div class="photo">
            <div class="header_photo">
                <input type="file" name="photo_01" id="file_photo_01" hidden>
                <label for="file_photo_01"><img src="/public/svg/plus-square-solidd.svg" alt=""></label>
                <samp>Foto 01</samp>
                <img class="img_deleted" src="/public/svg/image-solid.svg" alt="">
            </div>
            <div class="photo_photo">
                <img id="img_photo_01" src="<?php if(isset($_POST['warning_sub_update_fo'])&&$_FILES['photo_01']['tmp_name'] !='')echo"public/tmp/default/change.gif";else echo'public/tmp/f_o/directori_'.$_COOKIE['user_id_fo'].'/photo_01.jpg';?>" alt="">
            </div>
        </div>
        <div class="photo">
            <div class="header_photo">
            <input type="file" name="photo_02" id="file_photo_02" hidden>
                <label for="file_photo_02"><img src="/public/svg/plus-square-solidd.svg" alt=""></label>
                <samp>Foto 02</samp>
                <img class="img_deleted" src="/public/svg/image-solid.svg" alt="">
            </div>
            <div class="photo_photo">
                <img id="img_photo_02" src="<?php if(isset($_POST['warning_sub_update_fo'])&&$_FILES['photo_02']['tmp_name'] !='')echo"public/tmp/default/change.gif";else echo'public/tmp/f_o/directori_'.$_COOKIE['user_id_fo'].'/photo_02.jpg';?>" alt="">
            </div>
        </div>
        <div class="photo">
            <div class="header_photo">
            <input type="file" name="photo_03" id="file_photo_03" hidden>
                <label for="file_photo_03"><img src="/public/svg/plus-square-solidd.svg" alt=""></label>
                <samp>Foto 03</samp>
                <img class="img_deleted" src="/public/svg/image-solid.svg" alt="">
            </div>
            <div class="photo_photo">
                <img id="img_photo_03" src="<?php if(isset($_POST['warning_sub_update_fo'])&&$_FILES['photo_03']['tmp_name'] !='')echo"public/tmp/default/change.gif";else echo'public/tmp/f_o/directori_'.$_COOKIE['user_id_fo'].'/photo_03.jpg';?>" alt="">
            </div>
        </div>
    </div>
    <?php if(isset($_POST['warning_sub_update_fo']))$ex=CTR_QUERYS_F_O::ctr_write_photo();
    /* if($_COOKIE['id_user']==5)echo'lol'; */
        $ruta1=URL_PROJECT."/public/tmp/tmp/photo_01_user_".$_COOKIE['id_user'].".jpg";
        $ruta2=URL_PROJECT."/public/tmp/tmp/photo_02_user_".$_COOKIE['id_user'].".jpg";
        $ruta3=URL_PROJECT."/public/tmp/tmp/photo_03_user_".$_COOKIE['id_user'].".jpg";
        if(isset($_POST['sub_update_fo'])){
            $ex=CTR_QUERYS_F_O::ctr_update_photo();
            echo"<div class='cambios_gusrdados'>Cambios Guardados</div>";
        }?>
    <input id="sub_update_fo" type="submit" class="submit" style="" name="warning_sub_update_fo" value="Guardar Cambios">
    <?php if(file_exists($ruta1))action(1);
          if(file_exists($ruta2))action(2);
          if(file_exists($ruta3))action(3);
        function action($i){
            echo"<script>
            const img_photo$i=document.getElementById('img_photo_0$i');
            img_photo$i.setAttribute('src','/public/tmp/default/change.gif');
            const sub$i=document.getElementById('sub_update_fo');
            sub$i.setAttribute('value','Confirmar');
            sub$i.setAttribute('style','background:#45A1E5;');
            </script>";
        }
        ?>
</form>
</div>
<script src="/public/js/view_img_photo.js"></script>