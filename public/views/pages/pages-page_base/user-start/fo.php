<div class="box font_containers fo ">

<?php $i=null;$b='no';if(isset($_COOKIE['user_id_fo']) and $_COOKIE['user_id_fo'] != "none")$i='no'.$b=null;?>

    <div class="container_principal <?php echo $b;?>">
       <div class="badge">
            <img src="<?php echo"/public/tmp/users/directori_".$_COOKIE['id_user']."/my_f_o_img_little.jpg"?>" class="badge-img" alt="">
            <img src="/img/F-O.png" class="badge-ornaments" alt="">
       </div>
       <h1><?php require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');$data=CTR_QUERYS_F_O::ctr_select_name_fo();echo$data;?></h1>
        <a href="/?settings_fo=set&edit=set"><img src="/svg/cogs-solid.svg" class="setings" alt=""></a>
    </div>



    <div class="container_principal notFo <?php echo $i;?>">
        <div class="buttons">
            <a href="/?search=set"><img src="/svg/search-solid.svg" alt=""> Buscar Fuerzas Operativas</a>
            <a class="a2" href="/views/pages/page_base?new_fo=start"><img src="/svg/plus-solid.svg" alt=""> Crear Fuerza Operative</a>
       </div>
    </div>
</div>