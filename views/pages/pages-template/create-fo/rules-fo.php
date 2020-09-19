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

<script>
    function plus_normative(i){
        if(i<=4){
        i++;
        $("#normative").append("<div id='rule_"+i+"' class='rule'> <img src='/svg/rules-true.svg' alt=''><input type='text' name='rule_"+i+"' id=''></div> ");
        $("#bottons_normative").html("<div class='plus' onclick='plus_normative("+i+");'></div>  <div class='plus minus' onclick='minus_normative("+i+");'></div>");
        }else{

        }
    }
    function minus_normative(i){
        $("#rule_"+i).remove();
        i--;
        if(i==1){
            $("#bottons_normative").html("<div class='plus' onclick='plus_normative("+i+");'>");
        }else{
        $("#bottons_normative").html("<div class='plus' onclick='plus_normative("+i+");'></div>  <div class='plus minus' onclick='minus_normative("+i+");'></div>");
        }
    }

    function plus_expulsion(i){
        if(i<=4){
        i++;
        $("#expulsion").append("<div id='prohibition_"+i+"' class='rule'><img src='/svg/rules-false.svg' alt=''><input type='text' name='prohibition_"+i+"' id=''></div>");
        $("#bottons_expulsion").html("<div class='plus' onclick='plus_expulsion("+i+");'></div> <div class='plus minus' onclick='minus_expulsion("+i+");'></div>");
        }else{

        }
    }
    function minus_expulsion(i){
        $("#prohibition_"+i).remove();
        i--;
        if(i==1){
            $("#bottons_expulsion").html("<div class='plus' onclick='plus_expulsion("+i+");'></div>");
        }else{
            $("#bottons_expulsion").html("<div class='plus' onclick='plus_expulsion("+i+");'></div> <div class='plus minus' onclick='minus_expulsion("+i+");'></div>");
        }
    }
</script>

<input type="submit" value="Siguiente" id="" >
</div>