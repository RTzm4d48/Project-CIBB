var monthName = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
                 "Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

var now = new Date();
var day = now.getDate();
var currentDay = now.getDate();
var month = now.getMonth();
var currentMonth = month;
var year = now.getFullYear();
var currentYear = now.getFullYear();

initCalender();
disable_button();
console.log(startDay());

function disable_button(){
    document.getElementById("create_event").disabled = true;
    $("#create_event").addClass("disable");
    $("#create_event").removeClass("crear");
}
function active_button(){
    document.getElementById("create_event").disabled = false;
    $("#create_event").addClass("crear");
    $("#create_event").removeClass("disable");
}

function function_finish(f_day,f_month){
    
    if(f_day>day && f_month==currentMonth+1){
    initCalender_select(f_day);
        $("#f_date_day").text(f_day);
        $("#f_date_month").text(f_month);
        $("#f_date_year").text(year);
        active_button();
    }else if(f_month>currentMonth+1){
        initCalender_select(f_day);
        $("#f_date_day").text(f_day);
        $("#f_date_month").text(f_month);
        $("#f_date_year").text(year);
        active_button();
    }else if(year>currentYear){
        initCalender_select(f_day);
        $("#f_date_day").text(f_day);
        $("#f_date_month").text(f_month);
        $("#f_date_year").text(year);
        active_button();
    }else{
    }
}
function unnamed(f_day,f_month,year){
    var data="day="+f_day+"&month="+f_month+"&year="+year;
    $.ajax({
        url: '/public/ajax/event_ctr/ctr_prepare_create.php',
        type: 'POST',
        data: data,
        dataType: "json",
        success:function(rpt){
            if(rpt==true){
                alert('true');
            }else{
                alert('false');
            }
        }
    });
}
function initCalender(){
    $("#date_start").text(currentDay+"/"+(currentMonth+1)+"/"+currentYear);
    $("#f_date_day").text('--');
    $("#f_date_month").text('--');
    $("#f_date_year").text('----');

    $("#text_day").text(day);
    $("#text_month").text(monthName[currentMonth]);

    $("#text_month_02").text(monthName[month]);
    $("#text_year").text(year);

    $(".item_day").remove();

    for(let i = startDay(); i>0; i--){
        $(".container_days").append
        (`<span class="week_days_item item_day prev_days">${getTotalDays(month-1)-(i-1)}</span>`);
    }

    for(let i=1; i<=getTotalDays(month); i++){
        if(i==day && month==currentMonth && year==currentYear){
            $(".container_days").append
        (`<span class="week_days_item item_day today" onclick="function_finish(${i},${month+1})">${i}</span>`);
        }else{
        $(".container_days").append
        (`<span class="week_days_item item_day" onclick="function_finish(${i},${month+1})">${i}</span>`);
        }
    }
}
function initCalender_select(finday){
    $("#text_day").text(day);
    $("#text_month").text(monthName[currentMonth]);

    $("#text_month_02").text(monthName[month]);
    $("#text_year").text(year);

    $(".item_day").remove();

    for(let i = startDay(); i>0; i--){
        if(i<=finday && month!=currentMonth){
            $(".container_days").append
            (`<span class="week_days_item item_day prev_days days_event ">${getTotalDays(month-1)-(i-1)}</span>`);
        }else{
            $(".container_days").append
            (`<span class="week_days_item item_day prev_days">${getTotalDays(month-1)-(i-1)}</span>`);
        }
    }

    for(let i=1; i<=getTotalDays(month); i++){
        if(i==day && month==currentMonth && year==currentYear){
            $(".container_days").append
        (`<span class="week_days_item item_day today" onclick="function_finish(${i},${month+1})">${i}</span>`);
        }else if(i==finday){
            $(".container_days").append
            (`<span class="week_days_item item_day finday" onclick="function_finish(${i},${month+1})">${i}</span>`);
        }
        else if(i>day && i<=finday && month==currentMonth){
            $(".container_days").append
        (`<span class="week_days_item item_day days_event" onclick="function_finish(${i},${month+1})">${i}</span>`);
        }else if(i<=finday && month!=currentMonth){
            $(".container_days").append
        (`<span class="week_days_item item_day days_event" onclick="function_finish(${i},${month+1})">${i}</span>`);
        }else{
        $(".container_days").append
        (`<span class="week_days_item item_day" onclick="function_finish(${i},${month+1})">${i}</span>`);
        }
    }
}
function getNextMonth(){
    if(month !== 11){
        month++;
    }else{
        year++;
        month = 0;
    }
    initCalender();
}
function getPrevMonth(){
    if(month !== 0){
        month--;
    }else{
        year--;
        month = 11;
    }
    initCalender();
}
function startDay(){
    var start = new Date(year, month, 1);
    return((start.getDate()-1)===-1) ? 6 : start.getDay();
}

function leapMonth(){
    return((year % 400 === 0) || (year % 4 === 0) && (year % 100 !== 0));
}

function getTotalDays(){
    if(month === -1) month = 11;

    var numMonthReal = month +1;

    if(numMonthReal == 3 || numMonthReal == 5 || numMonthReal == 8 || numMonthReal == 10 ||numMonthReal == 12){
        return 31;
    }else if(numMonthReal == 0 || numMonthReal == 2 || numMonthReal == 4 || numMonthReal == 6 
             || numMonthReal == 7 || numMonthReal == 9 || numMonthReal == 10 ||numMonthReal == 11){
        return 30;
    }else{
        return leapMonth() ? 29:28;
    }
}

$("#next_month").click(function(){
    getNextMonth();
    disable_button();
});
$("#last_month").click(function(){
    getPrevMonth();
    disable_button();
})