
var tokenomikChart
document.addEventListener("DOMContentLoaded", function() {
    // Pie chart
    tokenomikChart = new Chart(document.getElementById("tokenomik_chart"), {
        type: "pie",
        data: {
            labels: ["AIR", "1 ROUND", "2 ROUND", "3 ROUND", "LIQUIDITY", "MARKETING", "REWARD", "RESERVE"],
            datasets: [{

                data: [ 50000, 150000, 300000, 450000, 500000, 175000, 750000, 125000],
                backgroundColor: [
                    '#d9534f', //AIR
                    '#4bbf73', //R1
                    '#3b82ec', //R2
                    '#f0ad4e', //R3
                    '#6f42c1', //Liq
                    '#1f9bcf', //Mark
                    '#20c997', //Rew
                    '#d4d6d9', //Res
                ],
                borderWidth: 0,
                borderColor: '#293042'
            }]
        },
        options: {
            responsive: !window.MSInputMethodContext,
            maintainAspectRatio: false,
            cutoutPercentage: 50,
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                        HighlightTokenomicsRow(tooltipItem.index)
                        let label = this._data.labels[tooltipItem.index] + " " +  numberWithCommas(this._data.datasets[0].data[tooltipItem.index]) + " CTU";
                        return  label;
                    }
                },
            },
        }
    });
});


function DisableHighlightAll(){
    for(let i=0; i<=7; i++){
        let row = document.querySelector('[pie-index = "' + i + '"]');
        row.style.backgroundColor = '#293042';
    }
}

function HighlightTokenomicsRow(index){

    DisableHighlightAll()

    let row = document.querySelector('[pie-index = "' + index + '"]');
    let color = row.getAttribute('highlight-bg-color');
    row.style.backgroundColor = color;
    console.log(row);
}

document.querySelector("#tokenomik_chart").addEventListener("mouseleave", () => {
    DisableHighlightAll();
})