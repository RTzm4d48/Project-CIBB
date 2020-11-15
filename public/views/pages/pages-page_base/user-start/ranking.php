<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_user.php');
$data=CTR_QUERYS_USER::ctr_select_user_ranking();
/* echo'<pre>';
print_r($data);
echo'</pre>'; */
?>
<div class="box font_containers ranking">
    <p class="ranking_title">Ranking</p>
    <div class="ranking_containerList">

        <div class="line_01">
            <p class="num">#</p>
            <p class="name">Nick Name</p>
            <p class="points">Puntos</p>
            <p class="participations">Participaciones</p>
        </div>
        <div class="line_02">
        <?php if($data[3] >=1):?>
            <p class="num">1</p>
            <div class="name_m"><img src="/public/tmp/users/directori_<?php echo$_COOKIE['id_user']?>/ranking/top_1_img_user.jpg" alt=""><p><?php echo$data[0][0]?></p></div>
            <p class="points"><?php echo$data[1][0]?></p>
            <p class="participations"><?php echo$data[2][0]?></p>
        <?php endif;?>
        </div>
        <div class="line_01">
        <?php if($data[3] >=2):?>
            <p class="num">2</p>
            <div class="name_m"><img src="/public/tmp/users/directori_<?php echo$_COOKIE['id_user']?>/ranking/top_2_img_user.jpg" alt=""><p><?php echo$data[0][1]?></p></div>
            <p class="points"><?php echo$data[1][1]?></p>
            <p class="participations"><?php echo$data[2][1]?></p>
        <?php endif;?>
        </div>
        <div class="line_02">
        <?php if($data[3] >=3):?>
            <p class="num">3</p>
            <div class="name_m"><img src="/public/tmp/users/directori_<?php echo$_COOKIE['id_user']?>/ranking/top_3_img_user.jpg" alt=""><p><?php echo$data[0][2]?></p></div>
            <p class="points"><?php echo$data[1][2]?></p>
            <p class="participations"><?php echo$data[2][2]?></p>
        <?php endif;?>
        </div>
        <div class="line_01">
        <?php if($data[3] >=4):?>
            <p class="num">4</p>
            <div class="name_m"><img src="/public/tmp/users/directori_<?php echo$_COOKIE['id_user']?>/ranking/top_4_img_user.jpg" alt=""><p><?php echo$data[0][3]?></p></div>
            <p class="points"><?php echo$data[1][3]?></p>
            <p class="participations"><?php echo$data[2][3]?></p>
        <?php endif;?>
        </div>
        <div class="line_02 lineend">
        <?php if($data[3] >=5):?>
            <p class="num">5</p>
            <div class="name_m"><img src="/public/tmp/users/directori_<?php echo$_COOKIE['id_user']?>/ranking/top_5_img_user.jpg" alt=""><p><?php echo$data[0][4]?></p></div>
            <p class="points"><?php echo$data[1][4]?></p>
            <p class="participations"><?php echo$data[2][4]?></p>
        <?php endif;?>
        </div>
        

    </div>
</div>