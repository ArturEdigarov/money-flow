


document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('myChart').getContext('2d');
    const totalSum = sum.reduce((acc, val) => acc + val, 0);
    let chartData, chartLabels, chartColors;
    if (totalSum === 0) {
        chartData = [1];
        chartLabels = ['No Info'];
        chartColors = ['#c6c5c5ff'];
    }else {
        chartData = sum;
        chartLabels = ['Food', 'Fuel', 'Transport', 'Unknown', 'Shopping', 'Salary', 'Side Job', 'Bonuses'];
        chartColors = [
            '#00C49F', // Food
            '#FF8042', // Fuel
            '#8884D8', // Transport
            '#FF4C4C', // Unknown
            '#0088FE',  // Shopping
            '#FFE048',  // Salary 
            '#0B6B3A', // Side Job
            '#E8A6C9' // Bonuses
        ];
    }
        const centerText = {
        id: 'centerText',
        beforeDraw(chart) {
            const { ctx, chartArea: { width, height } } = chart;
            ctx.save();

            const text = totalSum + ' $';
            let fontSize = Math.min(width, height) / 7; 
            
            ctx.font = `bold ${fontSize}px Inter`;

            let textWidth = ctx.measureText(text).width;
            const maxWidth = width / 2.3; 
            if (textWidth > maxWidth) {
                fontSize = fontSize * (maxWidth / textWidth);
                ctx.font = `bold ${fontSize}px Inter`;
            }

            ctx.fillStyle = '#D6D6D6';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(text, width / 2, height / 2);
        }
    };
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartData, 
                backgroundColor: chartColors,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return `${context.label}: ${context.formattedValue} $`;
                        }
                    }
                }
            }
        },
        plugins: [centerText]
    });
});
