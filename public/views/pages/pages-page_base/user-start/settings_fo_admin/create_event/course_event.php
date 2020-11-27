<?php
$objetive=($data==false)?'--':$data[1];
$description=($data==false)?'--':$data[2];
$range=($data==false)?0:$data[3];
$day=($data==false)?0:$data[4];
$month=($data==false)?0:$data[5];
$year=($data==false)?0:$data[6];
?>
<div class="course_event">
        <h4>Tiempo de duracion del evento</h4>
        <div id="cuenta_Admin" class="time">
            <!-- time -->
        </div>
        <br>
        <center>
        <span>Objetivo: <?php echo$objetive;?></span>
        <br>
        <span>Descripción: <?php echo$description;?></span>
        <br>
        <span>Recompensa del evento: <?php echo$range;?>pts</span>
        </center>
        <br>
        <div id="container_borrar" class="container_borrar">
        <p>El evento solo se devera cancelar antes del primer día transcurrido desde la fecha de cracion.</p>
        <button class="btn_cancelar" id="btn_borrar_event">Cancelar Evento</button>
        </div>

    <script src="/js/simplyCountdown.min.js"></script>
    
    <script>
        $("#btn_borrar_event").click(function(){
            messagebox_1('Eliminar evento','¿Estas seguro de eliminar este evento?','deleted_event()');
        });
        function deleted_event(){
            var data = 'id_event=<?php echo $data[0]?>';
            $.ajax({
                url: '/public/ajax/event_ctr/ctr_deleted_event.php',
                type: 'POST',
                data: data,
                dataType: "json",
                success:function(rpt){
                    if(rpt==true)closet();
                    else messagebox_2('error','ocurrio un error, intentalo nuevamente mas tarde.');
                    actualizar();
                }
            }); 
        }
        function actualizar(){location.reload(true);}
    </script>





    <script>

    simplyCountdown('#cuenta_Admin', {
    year:<?php echo$year?>, // required
    month:<?php echo$month?>, // required
    day:<?php echo$day?>, // required
    hours: 0, // Default is 0 [0-23] integer
    minutes: 0, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: 'día',
        hours: 'hora',
        minutes: 'minuto',
        seconds: 'segundo',
        pluralLetter: 's'
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: true, //Use UTC as default
    onEnd: function(){
        $("#container_borrar").addClass("no");
        $("#admin_event").removeClass("no");
    }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: false
});
    </script>
    </div>