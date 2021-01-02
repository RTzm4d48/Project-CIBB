<?php
?>
<link rel="stylesheet" href="/css/style-create-fo____.css">
<div class="container">
    <div class="header_cibb">
        <img src="/svg/CIBB.svg" alt="">
    </div>

    <div id="conteiner">
        
    </div>
    <script src="/public/js/warning_.js"></script>
<?php
require_once(URL_PROJECT.'/app/controller/ctr_create_f_o.php');
$ex=new CTR_CREATE_F_O();

if(isset($_POST['sb_data'])){
     if($_COOKIE['user_id_fo']!='none'){
          include "create-fo/loading_creation_fo.php";
     }else{
          $data=CTR_CREATE_F_O::ctr_prepare_data();
          include "create-fo/data-form.php";
          /* echo$data; */
          if($data==false)echo"<script>messagebox_2('Hubo un problema','la extencion de la imagen no está permitida');</script>";
          else if($data=='prev')echo"<script>messagebox_2('Hubo un problema','Tienes que esperar 3 dias desde la ultima ves que creaste una F_O');</script>";
          else{
               echo"<script>
               var data = '$data';
               messagebox_1('Crear F.O','¿Estas seguro de crear esta fuerza operativa?_','CreateFo(data)');
               </script>";
          }
     }
}else{
     include "create-fo/data-form.php";
}
?>
</div>
<script>
     function CreateFo(data){
          
          $.ajax({
               url: '/public/ajax/ajax_create_fo.php',
               type: 'POST',
               data: data,
               dataType: "json",
               success:function(rpt){
                    if(rpt == true){closet_();actualizar();}
                    else messagebox_2('error','ocurrio un error, intentalo nuevamente mas tarde.');
                    /* alert(rpt); */
               }
          });
     }
     function actualizar(){location.reload(true);}
</script>
<!-- <?php include "create-fo/loading_creation_fo.php";?> -->