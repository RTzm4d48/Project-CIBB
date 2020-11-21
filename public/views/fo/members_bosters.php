<?php
$data=CTR_FO_ACCESS::ctr_select_users();
/* echo'hola<pre>';
print_r($data);
echo'</pre>'; */
?>
<div class="container_members">
    <div class="container_categori">
        <span>✨:LIDER</span>
        <div class="container_users">
            <!--  -->
            <a href="">
            <div class="user">
                <div class="line B_leader"></div>
                <img src="/public/tmp/all_img_users/user_<?php echo$data['lider'][0];?>_img.jpg" alt="">
                <div class="data">
                <div class="space_name">
                    <h2 class="name C_leader"><?php echo$data['lider'][1]?></h2><img class="img_pink" src="/public/img/img04.png">
                    <div class="points"><img class="img_blue" src="/public/img/img05.png"><p><?php echo$data['lider'][4]?></p></div>
                </div>
                    <samp class="estado"><?php echo$data['lider'][2]?></samp>
                </div>
            </div>
            </a>
           <!--  -->
        </div>
    </div>
    <!--  -->
    <br>
    <!--  -->
<?php if($data['num_legends']!=0):?>
    <div class="container_categori">
        <span>🔥:LEYENDAS</span>
        <div class="container_users">
            <!--  -->
            <?php for($i=1;$i<$data['num_legends'];$i++):?>
            <a href="">
            <div class="user">
                <div class="line B_legend"></div>
                <img src="/public/img/user-img.jpg" alt="">
                <div class="data">
                <div class="space_name">
                    <h2 class="name C_legend">#Edgar_X</h2><img class="img_pink" src="/public/img/img04.png">
                    <div class="points"><img class="img_blue" src="/public/img/img05.png"><p>45</p></div>
                </div>
                    <samp class="estado">Siento el peso de la gravedad...</samp>
                </div>
            </div>
            </a>
            <?php endfor;?>
    </div>
<?php endif;?>

        <!--  -->
        <br>
        <!--  -->
<?php if($data['num_officers']!=0):?>
    <div class="container_categori">
        <span>👻:INTEGRANTES OFICIALES</span>
        <div class="container_users">
        <?php for($i=0;$i<$data['num_officers'];$i++):?>
            <!--  -->
            <a href="">
            <div class="user">
                <div class="line B_i_oficer"></div>
                <img src="/public/tmp/all_img_users/user_<?php echo$data['officers'][$i][0];?>_img.jpg" alt="">
                <div class="data">
                <div class="space_name">
                    <h2 class="name C_i_oficer"><?php echo$data['officers'][$i][1];?></h2>
                    <div class="points"><img class="img_blue" src="/public/img/img05.png"><p><?php echo$data['officers'][$i][4];?></p></div>
                </div>
                    <samp class="estado"><?php echo$data['officers'][$i][2];?></samp>
                </div>
            </div>
            </a>
            <!--  -->
        <?php endfor;?>
    </div>
<?php endif;?>
    <br>
    <a href="/h?C=<?php echo $_GET['C'];?>&access=get&start=get">
    <button>Regresar</button>
    </a>
</div>