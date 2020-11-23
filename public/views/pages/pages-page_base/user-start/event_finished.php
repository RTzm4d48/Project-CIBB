<?php
$winers=CTR_QUERYS_EVENT::ctr_obtain_winers();
/* echo '<pre>';
print_r($winers);
echo'</pre>'; */
$num_winers;
if($winers[2]!=null)$num_winers=2;
if($winers[1]!=null)$num_winers=1;
else $num_winers=3;
$top1=(isset($winers[0]))?$winers[0]:'unnamed';
$top2=(isset($winers[1]))?$winers[1]:'unnamed';
$top3=(isset($winers[2]))?$winers[2]:'unnamed';
$point_top_1=(isset($winers[3]))?$winers[3]:0;
$point_top_2=$point_top_1/2;
$point_top_3=$point_top_1/3;
?>
<div id="event_finished_container" class="event_finished_container">
    <h4>Evento Finalizado</h4>
    <div class="container_califications">
        <?php if($num_winers==3):?>
        <div class="winers">
            <div class="winer_1_2_3"><img src="/public/svg/position_2_.svg" alt=""><p><?php echo$top2;?><br><label>+<?php echo round($point_top_2);?>pts</label></p></div>
            <div class="winer_1_2_3"><img src="/public/svg/position_1_.svg" alt=""><p><?php echo$top1;?><br><label>+<?php echo round($point_top_1);?>pts</label></p></div>
            <div class="winer_1_2_3"><img src="/public/svg/position_3_.svg" alt=""><p><?php echo$top3;?><br><label>+<?php echo round($point_top_3);?>pts</label></p></div>
        </div>
        <?php endif;?>
        <?php if($num_winers==2):?>
        <div class="winers">
            <div class="winer_1_2_3"><img src="/public/svg/position_2_.svg" alt=""><p><?php echo$top1;?><br><label>+<?php echo round($point_top_1);?>pts</label></p></div>
            <div class="winer_1_2_3"><img src="/public/svg/position_1_.svg" alt=""><p><?php echo$top2;?><br><label>+<?php echo round($point_top_2);?>pts</label></p></div>
        </div>
        <?php endif;?>
        <?php if($num_winers==1):?>
        <div class="winers">
            <div class="winer_1_2_3"><img src="/public/svg/position_1_.svg" alt=""><p><?php echo$top1;?><br><label>+<?php echo round($point_top_1);?>pts</label></p></div>
        </div>
        <?php endif;?>
        <button class='btn_cerrar_fin' id='close_event'>Cerrar</button>
    </div>
</div>
<script>
$("#close_event").click(function(){
    $.ajax({
        url: '/public/ajax/event_ctr/ajax_close_event.php',
        type: 'POST',
        /* data: data, */
        dataType: "json",
        success:function(rpt){
            if(rpt==true)actualizar();
            else messagebox_2('error','hubo un problema desonocido, por falvor vuelve a intentarlo mas tarde.');
        }
    });
});
</script>