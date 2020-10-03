
var ctx = document.getElementById('myChart').getContext('2d');
Chart.defaults.global.defaultFontColor = 'rgba(255, 255, 255, 0.9)';

var monthName = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
                 "Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

var currentMonth = 10 - 1;

let monthAray = [];
var initMonth = currentMonth - 5;
var x = 1;
for(var i = initMonth; i<=currentMonth;i++){
    x++;
    monthAray.push(monthName[i]);
    if(i == 12){
        var r = 0;
        for(var z = x; z <= 6; z++){
            r++;
            monthAray.push(monthName[r]);
        }
        
    }
}

let data_Asistencia = [0, 0, 0, 0, 0,2];
let data_Actividades = [0, 0, 0, 0, 0, 8];
let data_Participaciones = [0, 0, 0, 0, 0, 5];

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