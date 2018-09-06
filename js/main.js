const CHART = document.getElementById("lineChart");
Chart.defaults.scale.ticks.beginAtZero = true
let barChart = new Chart(CHART, {
    type:'doughnut',
    data: {
        labels: ["Voted", "Not Vote"],
        datasets: [
            {
            label: '# of Votes',
            data: [12, 7],
            backgroundColor: ['green','red'
                
            ]
        }]
    },
    options: {
        rotation: Math.PI * -0.5,
        animation: {
            animateScale: true 
        }
            
        }
    
});
