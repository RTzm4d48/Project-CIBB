<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
if(isset($_POST['sub_search']))$data=CTR_QUERYS_F_O::ctr_search_all_fo_for_name();
else$data=CTR_QUERYS_F_O::ctr_search_all_fo();
?>
<link rel="stylesheet" href="/css/style-search__.css">
<link rel="stylesheet" href="/css/responsive/rsp_style-search.css">
<div class="container_search">
<form action="" method="POST">
    <div class="bar_search">
        <input id="search" type="search" name="text_search" value="<?php if(isset($_POST['text_search']))echo$_POST['text_search'];?>" placeholder="Buscar..." autofocus required />
        <button type="submit" name="sub_search" id="go">Go</button>
    </form>
    </div>
<div id="respuesta"></div>
    <div class="wraper_f_o_s">
        <?php if($data[4]==0):?>
        <div class="without_results">
            <label for="">Sin Resultados</label>
            <p>lo sentimos, no existe ninguna fuerza operativa llamada "<?php if(isset($_POST['text_search']))echo$_POST['text_search'];?>".</p>
        </div>
        <?php endif;?>
        <?php for($i = 1;$i<=$data[4];$i++):?>
        <div class="wraper_fo" id="wraper_fo">
            <div class="cont_fo">
                <div class="badge">
                    <img src="/public/tmp/users/directori_<?php echo $_COOKIE['id_user'];?>/search_fo/img_all_<?php echo $i;?>.jpg" class="badge-img" alt="">
                    <img src="/img/F-O.png" class="badge-ornaments" alt="">
                </div>
                <div class="properties">
                    <h1><?php echo $data[0][$i-1];?></h1>
                    <p><?php echo $data[3][$i-1];?>...</p>
                    <span>
                        <p class="activity">Actividad: <?php echo round($data[2][$i-1]);?>%</p>
                        <a href="/h?C=<?php echo $data[1][$i-1];?>">Visitar</a>
                    </span>
                </div>
            </div>
        </div>
        <?php endfor;?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    </div>
</div>