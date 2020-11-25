<div class="loading_creation_fo">
    <h1>¡Fuerza Oprativa creada con exito!</h1>
    <img src="/svg/check-circle-solid.svg" alt="">
    <div class="direcction">
        <p>Dirección:</p>
        <?php $code=CTR_CREATE_F_O::ctr_select_code_fo();?>
        <input type="text" name="" value="http://cibb/h?C=<?php echo$code;?>" id="">

        <div class="copiar">COPIAR</div>
    </div>
    <a href="/h?C=<?php echo$code;?>" target="_blank">ir a la F.O</a>
</div>