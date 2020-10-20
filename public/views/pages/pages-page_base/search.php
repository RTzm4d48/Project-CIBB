<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
$data = CTR_QUERYS_F_O::ctr_search_all_fo();
?>
<link rel="stylesheet" href="/css/style-search__.css">
<link rel="stylesheet" href="/css/responsive/rsp_style-search.css">
<div class="container_search">
    <div class="bar_search">
        <input id="search" type="search" placeholder="Buscar..." autofocus required />
        <button type="submit">Go</button>    
    </div>
    <div class="wraper_f_o_s">
        <div class="without_results no">
            <label for="">Sin Resultados</label>
            <p>lo sentimos, no existe ninguna fuerza operativa llamada "Ositos".</p>
        </div>
        <?php for($i = 1;$i<=$data[4];$i++):?>
        <div class="wraper_fo">
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
        <?php
        function get_in_fo($id){

        }
        ?>
    </div>
</div>