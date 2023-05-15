
document.addEventListener("DOMContentLoaded", function() {
    // Bar chart
    new Chart(document.getElementById("raise-bar"), {
        type: "bar",
        data: {
            labels: ["1 ROUND", "2 ROUND", "3 ROUND", "LIQUIDITY"],
            datasets: [{
                label: "$",
                backgroundColor: ['#4bbf73', '#3b82ec', '#f0ad4e', '#6f42c1'],
                borderColor: window.theme.primary,
                hoverBackgroundColor: window.theme.primary,
                hoverBorderColor: window.theme.primary,
                data: [60000, 180000, 360000, 500000],
                barPercentage: .75,
                categoryPercentage: .5
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 200000,
                        callback: function(value, index, ticks) {
                            return '$' + value;
                        },
                        fontSize:GetChartFontSize(),
                    },
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    ticks: {
                        fontSize:GetChartFontSize(),
                    }
                }]
            }
        }
    });
});
