
<link rel="stylesheet" href="/css/style-create-fo_.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>

    <div id="conteiner">
        
    </div>
    <form action="" method="POST">
    <input type="submit" name="sbm_salir" value="salir">
        <?php
        function rmDir_rf($carpeta)
        {
          foreach(glob($carpeta . "/*") as $archivos_carpeta){             
            if (is_dir($archivos_carpeta)){
              rmDir_rf($archivos_carpeta);
            } else {
            unlink($archivos_carpeta);
            }
          }
          rmdir($carpeta);
         }
        if(isset($_POST['sbm_salir'])){
            rmDir_rf(URL_PROJECT. "/public/tmp/users/directori_". $_COOKIE['id_user']);
            setcookie("id_user", "000", time() - 10);
            header('Location: '.'/');
        }
        ?>
    </form>
</div>
