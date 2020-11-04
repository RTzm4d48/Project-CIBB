<div class="photo">
<form action="" method="POST" enctype="multipart/form-data">
    <div class="header_button">
        <img src="/public/svg/plus-square-solidd.svg" alt="">
        <h1>Fotografias de mmi fuerza operativa</h1>
        <p>Las fotografias ayuda a mostrar una mejor imagen de tu fuerza operativa.
        Tamaño maximo recomedado (1280p).</p>
       
        <p style="color:#000;font-size:12px;">se recomienda no superar el tamaño maximo recomendado ya que al hacerlo pueden ocurrir errores de redimension</p>
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
        if(isset($_POST['sub_update_fo'])){
            $ex=CTR_QUERYS_F_O::ctr_update_photo();
            echo"<div class='cambios_gusrdados'>Cambios Guardados</div>";
        }?>
    <input type="submit" class="submit" name="warning_sub_update_fo" value="Guardar Cambios">
    
</form>
</div>
<script src="/public/js/view_img_photo.js"></script>