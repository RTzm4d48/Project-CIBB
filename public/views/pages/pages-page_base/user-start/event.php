<?php
$id_evt=($data==false)?0:$data[0];
$objetive=($data==false)?'--':$data[1];
$description=($data==false)?'--':$data[2];
$range=($data==false)?0:$data[3];
$day=($data==false)?0:$data[4];
$month=($data==false)?0:$data[5];
$year=($data==false)?0:$data[6];

$i_day=($data==false)?0:$data[10];
$i_month=($data==false)?0:$data[11];
$i_year=($data==false)?0:$data[12];
require_once(URL_PROJECT.'/app/controller/ctr_querys_event.php');
$rpt=CTR_QUERYS_EVENT::ctr_validate_joind_event();
$num_part=CTR_QUERYS_EVENT::ctr_select_participants($id_evt);
/* echo '<pre>';
print_r($num_part);
echo'</pre>'; */
?>
<div class="box font_containers event">
    <div class="titulo">
        <div class="classtext">
            <p class="texttitle">Nuevo evento</p>
            <p class="textadvertence">El evento expira en:</p>
        </div>
        <div id="cuenta" class="time">
            <!-- time -->
        </div>
    </div>
    <div id="cat_and_des" class="cat_and_des">
        <div class="spacetext">
            <p class="name">Objetivo:</p>
            <p><?php echo$objetive;?></p>
        </div>
        <div class="spacetext">
            <p class="name">Descripcion:</p>
            <p><?php echo$description;?></p>
        </div>
        <div class="spacetext">
            <p class="name">Puntos para el ganador:</p>
            <p><?php echo$range;?></p>
        </div>
        <div class="spacetext">
            <p class="name">Fecha de inicio:</p>
            <p><?php echo"$i_day/$i_month/$i_year";?></p>
        </div>
        <div class="spacetext">
            <p class="name">Fecha de Finalizacion:</p>
            <p><?php echo"$day/$month/$year";?></p>
        </div>
    </div>
    <div id="button_and_num_p" class="button_and_num_p">
    <?php
    if($rpt==true)echo"<button class='btn'style='background:gray;'>Participando</button>";
    else echo"<button class='btn' id='joind_event'>Participar</button>";
    ?>
    <select class="combobox" id="combo_objetive">
            <option>Participantes: <?php echo$num_part[0];?></option>
            <?php
            for($i=0;$i<=$num_part[0]-1;$i++){
                echo"<option>".$num_part[2][$i]."</option>";
            }
            ?>
        </select>
    </div>

    <!-- EVENT FINISHED -->
    <?php if($data==false)include("event_finished.php");else{?>
    <!-- LOADING LEADER -->
    <div id="loading_leader" class="loading_leader no">
        <h4>Evento Finalizado</h4>
        <p>Esperando a que el lider haga las calificaciones...</p>
        <?php require_once(URL_PROJECT.'/app/controller/ctr_querys_user.php');
         $ex_leader=CTR_QUERYS_USER::ctr_valid_leader();if($ex_leader==true)echo"<a href='/?settings_fo_admin=set&event=set'>calificar</a>";?>
    </div>
    <?php }?>

</div>

<script src="/js/simplyCountdown.min.js"></script>
<script src="/js/time_script_users_.js"></script>

<!-- call function archive time_script_users.js -->
<?php echo"<script>event($day,$month,$year);</script>";?>

<script>
$("#joind_event").click(function(){
    messagebox_1('Participar','¿Estas seguro de participar en este evento?','join_to_event()');
});
function join_to_event(){
    var data='evt_id=<?php echo$id_evt;?>';
    $.ajax({
        url: '/public/ajax/event_ctr/ajax_joind_event.php',
        type: 'POST',
        data: data,
        /* dataType: "json", */
        success:function(rpt){
            if(rpt==true)actualizar();
            else if(rpt=='exist')messagebox_2('error','Tu ya estas participando en este evento.');
            else messagebox_2('error','ocurrio un error, intentalo nuevamente mas tarde.');
        }
    });
}
function actualizar(){location.reload(true);}
</script>

<script src="/js/warning_.js"></script>