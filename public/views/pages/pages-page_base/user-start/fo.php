<div class="box font_containers fo ">
<?php if(isset($_COOKIE['user_id_fo']) and $_COOKIE['user_id_fo'] != "none"){?>
    <div class="container_principal">
       <div class="badge">
            <img src="<?php echo"/public/tmp/users/directori_".$_COOKIE['id_user']."/my_f_o_img_little.jpg"?>" class="badge-img" alt="">
            <img src="/img/F-O.png" class="badge-ornaments" alt="">
       </div>
       <h1><?php require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');$data=CTR_QUERYS_F_O::ctr_select_name_fo();echo$data;?></h1>
        <a class="setings" href="/?settings_fo=set&fo=set"><img src="/svg/cogs-solid.svg" alt=""></a>
    </div>

<?php }else{ ?>

    <div class="container_principal notFo">
        <div class="buttons" >
            <a class="btn_create_join" href="/?search=set"><img src="/svg/search-solid.svg" alt=""><h5>Buscar Fuerzas Operativas</h5></a>
            <a class="btn_create_join a2" href="/views/pages/page_base?new_fo=start"><img src="/svg/plus-solid.svg" alt=""><h5>Crear Fuerza Operative</h5></a>
       </div>
    </div>
<?php } ?>
</div>