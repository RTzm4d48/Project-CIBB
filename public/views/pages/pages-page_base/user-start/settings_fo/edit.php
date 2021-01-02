<div class="edit">
<?php if(isset($_POST['sub_update_fo']))$ex=CTR_QUERYS_F_O::ctr_update_data_fo();?>
    <?php $Row=VALIDATIONS::val_select_datos_fo_settings();
    /* echo"<pre>";
    print_r($Row);
    echo"</pre>"; */
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="header_form_edit">
            <h1><?php echo$Row['name'];?></h1>
            <div class="container_img">
                <img src="/public/tmp/f_o/directori_<?php echo$Row['fo_id']?>/fo_img_little.jpg" id="imagePreview" alt="">
                <div class="semi-circulo">
                    <input type="file" name="image" accept="image/jpeg, image/png" id="inpFile" hidden>
                    <label for="inpFile">Cambiar</label>
                </div>
            </div>
        </div>
        <div class="body_form_edit">
            <div class="text_box">
                <p>Nombre</p>
                <input name="input_name" maxlength="15" class="inputText"type="text" value="<?php echo$Row['name'];?>" id="" required>
            </div>
            <div class="text_box">
                <p class="p_description">Descripcion</p>
                <textarea name="description" maxlength="250" rows="3" cols="5" required><?php echo$Row['description'];?></textarea>
            </div>
            <div class="text_box">
                <p>Eslogan</p>
                <input class="inputText inputText_tag" maxlength="5" type="text" value="<?php echo$Row['fo_tag'];?>" name="input_tag" id="">
            </div>
            <div class="text_box">
                <p>URL de web alternativa</p>
                <input class="inputText" maxlength="40" type="text" value="<?php echo$Row['fo_url_w_a'];?>" placeholder="example.com" name="input_url_w_a" id="">
            </div>
            <div class="text_box">
                <p>URL direccion Boom Beach</p>
                <input class="inputText" type="text" name="fo_url_b_b_f" id="" placeholder="https://link.boombeach.com?url=boommbeach%3A%2F%2FiewTaskforce%3Ftag%3D%fTL9QJJ8R" value="<?php echo$Row['fo_url_b_b_f'];?>" required>
            </div>
            <div class="text_box">
                <p>URL musica o audio</p>
                <input class="inputText" type="text" name="fo_url_m" id="" placeholder="https://example/example.mp3" value="<?php echo$Row['fo_url_m'];?>">
            </div>
            <div class="text_box">
                <p>Etiqueta</p>
                <input class="inputText" type="text" name="fo_label" id="" placeholder="#5d7tg48" value="<?php echo$Row['fo_label'];?>" required>
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