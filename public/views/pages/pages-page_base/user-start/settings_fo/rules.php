<?php
if(isset($_POST['sb_rules_prohibitions'])){
    /* POR ALGUNA RAZON QUE DESCONOZCO NO PERMITE ESCRIBIR NADA DENTRO DE ESTA CONDICION */
    $ex=CTR_QUERYS_F_O::ctr_update_rules_prohibitions();
}
$ex=CTR_QUERYS_F_O::ctr_select_rules();
$num_rules=$ex[0];
$data_prohibitions=CTR_QUERYS_F_O::ctr_select_prohibitions();
$num_prohibition=$data_prohibitions[0];
?>
<div class="rulesFo">
<form action="" method="POST">
<h1>Reglas de la Fuerza Operativa</h1>
<div class="section">
    <h2>REGRAS DE LA FUERZA OPERATIVA</h2>
    <h3>Nuestra normativa</h3>
    <div id="normative">
        <?php for($i=1;$i<=$num_rules;$i++):?>
        <div id="rule_<?php echo $i;?>" class="rule">
            <img src="/svg/rules-true.svg" alt="">
            <input type="text" name="rule_<?php echo $i;?>" value="<?php echo$ex[1][$i-1];?>" id="" required>
        </div>
        <?php endfor;?>
    </div>
    <div id="bottons_normative">
    <div class="plus" onclick="plus_normative(<?php echo$num_rules;?>);"></div>
    <?php if($num_rules!=1)echo"<div class='plus minus' onclick='minus_normative(".$num_rules.");'></div>";?>
    </div>
</div>
<div id="num_rule_">
    <input type='text' name='num_rule' value='<?php echo$num_rules;?>' id='num_rule' hidden>
</div>
<div id="num_prohibition_">
    <input type='text' name='num_prohibition' value='<?php echo$num_prohibition;?>' id='num_prohibition' hidden>
</div>
<!--  -->
<div class="section"> 
    <h2>PROHIBICIONES</h2>
    <h3>Razones de expulsión</h3>
    <div id="expulsion">
        <?php for($i=1;$i<=$num_prohibition;$i++):?>
        <div id="prohibition_<?php echo$i;?>" class="rule">
            <img src="/svg/rules-false.svg" alt="">
            <input type="text" name="prohibition_<?php echo$i;?>" value="<?php echo$data_prohibitions[1][$i-1];?>" id="" required>
        </div>
        <?php endfor;?>
    </div>
    <div id="bottons_expulsion">
    <div class="plus" onclick="plus_expulsion(<?php echo$num_prohibition;?>);"></div>
    <?php if($num_prohibition!=1)echo"<div class='plus minus' onclick='minus_expulsion(".$num_prohibition.");'></div>";?>
    </div>
</div>
<div class="alert"><p id="alert"></p></div>
<input type="submit" name="sb_rules_prohibitions" value="Guardar Cambios" id="" >
</form>
</div>
<script src="/js/rules_fo_plus_minus.js"></script>