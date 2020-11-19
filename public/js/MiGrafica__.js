
let params = new URLSearchParams(location.search);
var fo_code = params.get('C');
$.ajax({
    url: '/public/ajax/ajax_data_graphics.php',
    type: 'POST',
    data: 'fo_code='+fo_code,
    dataType: "json",
    success:function(data){
        graphics(data);
    }
});

function graphics(data){
var ctx = document.getElementById('myChart').getContext('2d');
Chart.defaults.global.defaultFontColor = 'rgba(255, 255, 255, 0.9)';

var monthName = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
                 "Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

var currentMonth = 12-1;//10

let monthAray = [];
var initMonth = currentMonth - 5;//4
var x = 1;
for(var i = initMonth; i<=currentMonth;i++){
    x++;
    monthAray.push(monthName[i]);//4,5,6,7,8,9,10
    if(i == 12){
        var r = 0;
        for(var z = x; z <= 6; z++){
            r++;
            monthAray.push(monthName[r]);
        }
        
    }
}
/* CREO Y LES DOY VALOR A LOS MESES ANTERIORES A month */
var _now = new Date();
var month = _now.getMonth()+1;
var M_pre_1=(month!=1)?month-1:12;
var M_pre_2=(month!=1)?month-2:11;
var M_pre_3=(month!=1)?month-3:10;
var M_pre_4=(month!=1)?month-4:9;
var M_pre_5=(month!=1)?month-5:8;

/* VALIDO Y OBTENGO LOS VALORES DE CADA MES */
var n_ass_1 = data[month][2];
var n_act_1 = data[month][3];
var n_part_1 = data[month][4];
/*  */
try{var M1_1= data[M_pre_1][2];}catch(e){var M1_1=0;}
try{var M1_2= data[M_pre_1][3];}catch(e){var M1_2=0;}
try{var M1_3= data[M_pre_1][4];}catch(e){var M1_3=0;}
/*  */
try{var M2_1= data[M_pre_2][2];}catch(e){var M2_1=0;}
try{var M2_2= data[M_pre_2][3];}catch(e){var M2_2=0;}
try{var M2_3= data[M_pre_2][4];}catch(e){var M2_3=0;}
/*  */
try{var M3_1= data[M_pre_3][2];}catch(e){var M3_1=0;}
try{var M3_2= data[M_pre_3][3];}catch(e){var M3_2=0;}
try{var M3_3= data[M_pre_3][4];}catch(e){var M3_3=0;}
/*  */
try{var M4_1= data[M_pre_4][2];}catch(e){var M4_1=0;}
try{var M4_2= data[M_pre_4][3];}catch(e){var M4_2=0;}
try{var M4_3= data[M_pre_4][4];}catch(e){var M4_3=0;}
/*  */
try{var M5_1= data[M_pre_5][2];}catch(e){var M5_1=0;}
try{var M5_2= data[M_pre_5][3];}catch(e){var M5_2=0;}
try{var M5_3= data[M_pre_5][4];}catch(e){var M5_3=0;}

/* ASIGNO LOS VALOREAS A LA GRAFICA */
let data_Asistencia = [M5_1,M4_1,M3_1,M2_1,M1_1,n_ass_1];
let data_Actividades = [M5_2,M4_2,M3_2,M2_2,M1_2,n_act_1];
let data_Participaciones = [M5_3,M4_3,M3_3,M2_3,M1_3,n_part_1];
/* let data_Asistencia = [0, 0, 0, 0, 0,2];
let data_Actividades = [0, 0, 0, 10, 0, 50];
let data_Participaciones = [0, 0, 0, 0, 0, 5]; */

let meses = [];


var myChart = new Chart(ctx, {
    type: 'line',
    
    data: {
        labels: monthAray,
        datasets: [{
            label: 'Asistencia',
            data: data_Asistencia,
            
            backgroundColor: [
                'rgba(244, 39, 142, 0.2)',
                'rgba(244, 39, 142, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(244, 39, 142, 1)',
                'rgba(244, 39, 142)',
                'rgba(244, 39, 142)',
                'rgba(244, 39, 142)',
                'rgba(244, 39, 142)',
                'rgba(244, 39, 142)',
                'rgba(244, 39, 142)',
            ],
            
            borderWidth: 1.5
        },
        {
            label: 'Actividades',
            data: data_Actividades,
            backgroundColor: [
                'rgba(110, 53, 253, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(110, 53, 253, 1)',
                'rgba(110, 53, 253)',
                'rgba(110, 53, 253)',
                'rgba(110, 53, 253)',
                'rgba(110, 53, 253)',
                'rgba(110, 53, 253)',
                'rgba(110, 53, 253)',
                
            ],
            
            borderWidth: 1.5
        },
        {
            label: 'Participaciones',
            data: data_Participaciones,
            backgroundColor: [
                'rgba(50, 249, 135, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(50, 249, 135, 1)',
                'rgba(50, 249, 135)',
                'rgba(50, 249, 135)',
                'rgba(50, 249, 135)',
                'rgba(50, 249, 135)',
                'rgba(50, 249, 135)',
                'rgba(50, 249, 135)',
                
            ],
            
            borderWidth: 1.5
        }
        ]

    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
}