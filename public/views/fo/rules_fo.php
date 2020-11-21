<?php
$data_r_p=CTR_FO_ACCESS::ctr_select_rules();
/* echo'hola2<pre>';
print_r($data_r_p);
echo'</pre>'; */
?>
<div class="container_rules_fo">
    <h3>¡Te damos la bienvenida a las reglas de la F.O!</h3>
    <p>Queremos hacer las cosas bien y mantener la fuerza operativa a flote, es por eso que tenemos ciertas reglas y prohibiciones que se tienen que complir.</p>

    <span>REGLAS DE LA FUERZA OPERATIVA</span>
    <h4>Nuestra normativa</h4>
    <?php for($i=0;$i<$data_r_p[0]['num_rules'];$i++):?>
    <div class="rule">
              <img src="/svg/rules-true.svg" alt="">
              <p><?php echo$data_r_p[0]['rules'][$i];?></p>
    </div>
    <?php endfor;?>

    <!--  -->

    <span>PROHIBICIONES</span>
    <h4>Razones de expulsión</h4>

    <?php for($i=0;$i<$data_r_p[1]['num_prohibitions'];$i++):?>
    <div class="rule">
              <img src="/svg/rules-false.svg" alt="">
              <p><?php echo$data_r_p[1]['prohibitions'][$i];?></p>
    </div>
    <?php endfor;?>
    

    <p class="message">Los Colideres y Oficiales quedan con el derecho total de expulsar a cualquier integrante, reservandose o no cualquier tipo de explicacion, puesto que se asume que estas reglas fueron leidas y comprendidas.</p>

    <a href="/h?C=<?php echo $_GET['C'];?>&access=get&start=get"><button>Entendido</button></a>
</div>