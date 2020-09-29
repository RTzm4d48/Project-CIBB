<form action="" method="POST">
<div class="rulesFo">

<h1>Reglas de la Fuerza Operativa</h1>
<div class="section">
    <h2>REGRAS DE LA FUERZA OPERATIVA</h2>
    <h3>Nuestra normativa</h3>
    <div id="normative">
        <div id="rule_1" class="rule">
            <img src="/svg/rules-true.svg" alt="">
            <input type="text" name="rule_1" id="" required>
        </div>
    </div>
    <div id="bottons_normative">
    <div class="plus" onclick="plus_normative(1);"></div>
    </div>
</div>
<div id="num_rule_">
    <input type='text' name='num_rule' value='1' id='num_rule'>
</div>
<div id="num_prohibition_">
    <input type='text' name='num_prohibition' value='1' id='num_prohibition'>
</div>
<!--  -->
<div class="section"> 
    <h2>PROHIBICIONES</h2>
    <h3>Razones de expulsión</h3>
    <div id="expulsion">
        <div id="prohibition_1" class="rule">
            <img src="/svg/rules-false.svg" alt="">
            <input type="text" name="prohibition_1" id="" required>
        </div>
    </div>
    <div id="bottons_expulsion">
    <div class="plus" onclick="plus_expulsion(1);"></div>
    </div>
</div>
<div class="alert"><p id="alert"></p></div>
<input type="submit" name="sb_rules" value="Siguiente" id="" >

</div>
</form>

<script src="/js/rules_fo_plus_minus.js"></script>