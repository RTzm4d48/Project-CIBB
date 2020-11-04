<div class="edit">
<?php if(isset($_POST['sub_update_fo']))echo $ex=CTR_QUERYS_F_O::ctr_update_data_fo();?>
    <?php $Row=VALIDATIONS::val_select_datos_fo_settings();?>
    <form action="" method="POST">
        <div class="header_form_edit">
            <h1><?php echo$Row['name'];?></h1>
            <div class="container_img">
                <img src="/public/tmp/default/default_big.jpg" id="imagePreview" alt="">
                <div class="semi-circulo">
                    <input type="file" name="image" accept="image/jpeg, image/png" id="inpFile" hidden>
                    <label for="inpFile">Cambiar</label>
                </div>
            </div>
        </div>
        <div class="body_form_edit">
            <div class="text_box">
                <p>Nombre</p>
                <input name="input_name" class="inputText"type="text" value="<?php echo$Row['name'];?>" id="">
            </div>
            <div class="text_box">
                <p class="p_description">Descripcion</p>
                <textarea name="description" maxlength="250" rows="3" cols="5" required><?php echo$Row['description'];?></textarea>
            </div>
            <div class="text_box">
                <p>Tag</p>
                <input class="inputText inputText_tag" type="text" value="<?php echo$Row['fo_tag'];?>" name="input_tag" id="">
            </div>
            <div class="text_box">
                <p>URL de web alternativa</p>
                <input class="inputText" type="text" value="<?php echo$Row['fo_url_w_a'];?>" name="input_url_w_a" id="">
            </div>
            <div class="text_box">
                <p>URL direccion Boom Beach</p>
                <input class="inputText" type="text" name="fo_url_b_b_f" id="" value="<?php echo$Row['fo_url_b_b_f'];?>">
            </div>
            <div class="text_box">
                <p>URL musica o audio</p>
                <input class="inputText" type="text" name="fo_url_m" id="" value="<?php echo$Row['fo_url_m'];?>">
            </div>
            <?php if(isset($_POST['sub_update_fo'])):?>
            <div class="cambios_gusrdados">
                Cambios Guardados
            </div>
            <?php endif;?>
            <input type="submit" name="sub_update_fo" value="Guardar Cambios">
            
        </div>
    </form>
    <script src="/public/js/view_img.js"></script>
</div>