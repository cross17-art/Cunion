let width, height, gradient;
function getGradient(ctx, chartArea) {
    const chartWidth = chartArea.right - chartArea.left;
    const chartHeight = chartArea.bottom - chartArea.top;
    if (!gradient || width !== chartWidth || height !== chartHeight) {
        // Create the gradient because this is either the first render
        // or the size of the chart has changed
        width = chartWidth;
        height = chartHeight;
        gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
        gradient.addColorStop(0, '#d9534fc7');
        gradient.addColorStop(0.5, '#4f66d9');
        gradient.addColorStop(1, '#4fd961');
    }

    return gradient;
}


document.addEventListener("DOMContentLoaded", function() {
    // Bar chart
    new Chart(document.getElementById("price-bar"), {
        type: "bar",
        data: {
            labels: ['Airdrop', "1 ROUND", "2 ROUND", "3 ROUND", "LISTING"],
            datasets: [{
                backgroundColor: ['#D9534F33', '#4bbf7333', '#3b82ec33', '#f0ad4e33', '#6f42c133'],
                borderColor: ['#D9534FFF', '#4bbf73', '#3b82ec', '#f0ad4e', '#6f42c1'],
                hoverBackgroundColor: ['#D9534F44', 'rgba(75,191,115,0.3)', 'rgba(59,130,236,0.3)', 'rgba(240,173,78,0.3)', '#36335b'],
                hoverBorderColor: ['#D9534FFF', '#4bbf73', '#3b82ec', '#f0ad4e', '#6f42c1'],
                data: [0.1, 0.4, 0.6, 0.8, 1],
                barPercentage: 1,
                categoryPercentage: 0.95,
                borderWidth:1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive:true,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    stacked: false,
                    ticks: {
                        min: 0,
                        stepSize: 0.2,
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
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, dataSets) {
                        HighlightPriceRow(tooltipItem.index)
                        let label;
                        if(tooltipItem.index != 0){
                            label = "1 CTU = $" +  numberWithCommas(this._data.datasets[0].data[tooltipItem.index]);
                        } else {
                            label = "1 CTU = $0";
                        }
                        return  label;
                    }
                },
            },
        }
    });
});



function HighlightPriceRow(index){

    DisableHighlightAllPriceBars()
    let row = document.querySelector('[price-bar-index = "' + index + '"]');
    let color = row.getAttribute('highlight-bg-color');
    row.style.backgroundColor = color;
    console.log(row);
}

function DisableHighlightAllPriceBars(){
    for(let i=0; i<=4; i++){
        let row = document.querySelector('[price-bar-index = "' + i + '"]');
        row.style.backgroundColor = '#293042';
    }
}

document.querySelector("#price-bar").addEventListener("mouseleave", () => {
    DisableHighlightAllPriceBars();
})