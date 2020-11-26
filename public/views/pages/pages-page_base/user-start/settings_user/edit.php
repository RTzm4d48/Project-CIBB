<?php require_once(URL_PROJECT.'/app/controller/ctr_querys_user.php');$ex=CTR_QUERYS_USER::ctr_select_data_user();?>
<link rel="stylesheet"href="/public/css/style-settings_user_____.css">
<link rel="stylesheet"href="/public/css/Responsive/rsp_style-settings_user_.css">
<div class="container_user_settings">
    <form action=""method="POST"enctype="multipart/form-data">
    <div class="img_name">
        <img src="<?php echo"/public/tmp/users/directori_".$_COOKIE['id_user']."/img_perfil_big.jpg";?>"id="imagePreview" alt="">
        <div class="name">
            <h1>Edgar Aggre</h1>
            <label for="inpFile">cambiar imagen de perfil</label>
            <input type="file"name="img"accept="image/jpeg,image/png"id="inpFile"hidden >
        </div>
    </div>
    <div class="body_form">
        <div class="space">
            <p>Nombre</p>
            <input type="text"name="name"id=""value="<?php echo$ex['name_user'];?>"required>
        </div>
        <div class="space">
            <p>Estado</p>
            <textarea name="state"maxlength="250"rows="3"cols="5"required><?php echo$ex['state'];?></textarea>
        </div>
        <div class="space">
            <p>Correo Electroonico</p>
            <input type="email"pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"name="email"value="<?php echo$ex['gmail'];?>"id=""required>
        </div>
        <?php require_once(URL_PROJECT.'/app/controller/ctr_querys_user.php');if(isset($_POST['sb_guardar_cambios'])){$data=CTR_QUERYS_USER::ctr_uptade_data_user();echo $data;}?>
    </div>
    <input type="submit"name="sb_guardar_cambios"value="Guardar Cambios">
    </form>
</div>
<script src="/public/js/view_img.js"></script>