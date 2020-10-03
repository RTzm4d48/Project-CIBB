<div class="loading_creation_fo" onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
    <h1>¡Fuerza Oprativa creada con exito!</h1>
    <img src="/svg/check-circle-solid.svg" alt="">
    <div class="direcction">
        <p>Dirección:</p>
        <input type="text" name="" value="http://cibb/h?C=<?php echo $_SESSION['sess_code']; ?>" id="">

        <div class="copiar">COPIAR</div>
    </div>
    <a href="/h?C=<?php echo $_SESSION['sess_code']; ?>" target="_blank">ir a la F.O</a>
    <?php  unset($_SESSION['sess_code']); ?>
    <script type="text/javascript">
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
    </script>
</div>