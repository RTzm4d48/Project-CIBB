<?php
$num_part=CTR_QUERYS_EVENT::ctr_select_participants($data[0]);
?>
<div id="admin_event" class="admin_event no">
    <hr>
    <h2>Evento Finalizado</h2>
    <p>Asegurate de no cometer errores al momento de posisionar a los ganadores ya que todos los integrantes
    que participaron en el evento recibiran una notificacion con  los resultados.</p>
    <div class="position_container">

        <?php $Row=($num_part[0]>=3)?3:$num_part[0];
        for($i=1;$i<=$Row;$i++):?>
        <div class='position'>
            <img src='/public/svg/position_<?php echo $i;?>_.svg'>
            <select class='combobox' id='user_top_<?php echo $i;?>'>
                <option value='0'>- - -</option>
                <?php for($u=0;$u<=$num_part[0]-1;$u++){
                    echo"<option value='".$num_part[1][$u]."'>".$num_part[2][$u]."</option>";
                }?>
            </select>
        </div><?php endfor;?>

    </div>
    <button id="cerrar_Event" class="cerrar_Event">Guardar y cerrar el evento</button>
</div>

<script>
$("#cerrar_Event").click(function(){
    /* $("#create_event_container").addClass("no"); */
    var ut1_ = document.getElementById('user_top_1');
    var ut2_ = document.getElementById('user_top_2');
    var ut3_ = document.getElementById('user_top_3');
    if(ut2_ == null)position_participants1(ut1_);
    else if(ut3_ == null)position_participants2(ut1_,ut2_);
    else position_participants3(ut1_,ut2_,ut3_);
});

function position_participants1(ut1){
    var user_top_1=ut1.options[ut1.selectedIndex].text;
    var id_user_top_1=ut1.options[ut1.selectedIndex].value;
    if(user_top_1==0)alert_empty_top(1);
    else ajax_getset(user_top_1,null,null,id_user_top_1,null,null);
}
function position_participants2(ut1,ut2){
    var user_top_1=ut1.options[ut1.selectedIndex].text;
    var user_top_2=ut2.options[ut2.selectedIndex].text;
    var id_user_top_1=ut1.options[ut1.selectedIndex].value;
    var id_user_top_2=ut2.options[ut2.selectedIndex].value;
    if(user_top_1==0)alert_empty_top(1);
    else if(user_top_2==0)alert_empty_top(2);
    else{
        if(user_top_1==user_top_2)messagebox_2('Hubo un problema','Un participante no puede estar en dos puestos');
        else ajax_getset(user_top_1,user_top_2,null,id_user_top_1,id_user_top_2,null);
    }
}
function position_participants3(ut1,ut2,ut3){
    var user_top_1=ut1.options[ut1.selectedIndex].text;
    var user_top_2=ut2.options[ut2.selectedIndex].text;
    var user_top_3=ut3.options[ut3.selectedIndex].text;
    var id_user_top_1=ut1.options[ut1.selectedIndex].value;
    var id_user_top_2=ut2.options[ut2.selectedIndex].value;
    var id_user_top_3=ut3.options[ut3.selectedIndex].value;
    if(user_top_1==0)alert_empty_top(1);
    else if(user_top_2==0)alert_empty_top(2);
    else if(user_top_3==0)alert_empty_top(3);
    else{
        if(user_top_1==user_top_2 || user_top_1==user_top_3 || user_top_2==user_top_3)messagebox_2('Hubo un problema','Un participante no puede estar en dos puestos');
        else ajax_getset(user_top_1,user_top_2,user_top_3,id_user_top_1,id_user_top_2,id_user_top_3);
    }
}
function ajax_getset(top_1,top_2,top_3,id_top_1,id_top_2,id_top_3){
    data = 'top_1='+top_1+'&top_2='+top_2+'&top_3='+top_3+'&evt_id=<?php echo $data[0]?>'+
    '&id_top_1='+id_top_1+'&id_top_2='+id_top_2+'&id_top_3='+id_top_3+'&point_top_1='+<?php echo $data[3]?>;
    $.ajax({
        url: '/public/ajax/event_ctr/ajax_position_participants.php',
        type: 'POST',
        data: data,
        /* dataType: "json", */
        success:function(rpt){
            if(rpt == true)actualizar();
            else messagebox_2('error','ocurrio un error, intentalo nuevamente mas tarde.');
        }
    });
}
function actualizar(){location.reload(true);}
function alert_empty_top(num){
    messagebox_2('Hubo un problema','Te falto dar el puesto '+num+' a un participante.');
}
</script>