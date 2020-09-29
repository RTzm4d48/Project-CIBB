function plus_normative(i){
    if(i<=4){
    i++;
    $("#num_rule_").html("<input type='text' name='num_rule' value='"+i+"' id='num_rule'>");
    $("#normative").append("<div id='rule_"+i+"' class='rule'> <img src='/svg/rules-true.svg' alt=''><input type='text' name='rule_"+i+"' id='' required></div> ");
    $("#bottons_normative").html("<div class='plus' onclick='plus_normative("+i+");'></div>  <div class='plus minus' onclick='minus_normative("+i+");'></div>");
    }else{

    }
}
function minus_normative(i){
    $("#rule_"+i).remove();
    i--;
    if(i==1){
        $("#bottons_normative").html("<div class='plus' onclick='plus_normative("+i+");'>");
        $("#num_rule_").html("<input type='text' name='num_rule' value='"+i+"' id='num_rule'>");
    }else{
        $("#num_rule_").html("<input type='text' name='num_rule' value='"+i+"' id='num_rule'>");
        $("#bottons_normative").html("<div class='plus' onclick='plus_normative("+i+");'></div>  <div class='plus minus' onclick='minus_normative("+i+");'></div>");
    }
}

function plus_expulsion(i){
    if(i<=4){
    i++;
    $("#num_prohibition_").html("<input type='text' name='num_prohibition' value='"+i+"' id='num_prohibition'>");
    $("#expulsion").append("<div id='prohibition_"+i+"' class='rule'><img src='/svg/rules-false.svg' alt=''><input type='text' name='prohibition_"+i+"' id='' required></div>");
    $("#bottons_expulsion").html("<div class='plus' onclick='plus_expulsion("+i+");'></div> <div class='plus minus' onclick='minus_expulsion("+i+");'></div>");
    }else{

    }
}
function minus_expulsion(i){
    $("#prohibition_"+i).remove();
    i--;
    if(i==1){
        $("#bottons_expulsion").html("<div class='plus' onclick='plus_expulsion("+i+");'></div>");
        $("#num_prohibition_").html("<input type='text' name='num_prohibition' value='"+i+"' id='num_prohibition'>");
    }else{
        $("#num_prohibition_").html("<input type='text' name='num_prohibition' value='"+i+"' id='num_prohibition'>");
        $("#bottons_expulsion").html("<div class='plus' onclick='plus_expulsion("+i+");'></div> <div class='plus minus' onclick='minus_expulsion("+i+");'></div>");
    }
}