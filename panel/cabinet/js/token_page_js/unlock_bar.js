document.addEventListener("DOMContentLoaded", function () {
    // Bar chart
    new Chart(document.getElementById("unlock-bar"), {
        type: "bar",
        data: {
            labels: ["1 UNLOCK", "2 UNLOCK", "3 UNLOCK", "4 UNLOCK"],
            datasets: [
                {
                    label: "1 ROUND",
                    backgroundColor: '#4bbf73',
                    borderColor: "#E8EAED",
                    hoverBackgroundColor: '#4bbf73',
                    hoverBorderColor: "#E8EAED",
                    data: [37500, 37500, 37500, 37500],
                    barPercentage: .75,
                    categoryPercentage: .5
                },
                {
                    label: "2 ROUND",
                    backgroundColor: '#3b82ec',
                    borderColor: "#E8EAED",
                    hoverBackgroundColor: '#3b82ec',
                    hoverBorderColor: "#E8EAED",
                    data: [75000, 75000, 75000, 75000],
                    barPercentage: .75,
                    categoryPercentage: .5
                },
                {
                    label: "3 ROUND",
                    backgroundColor: '#f0ad4e',
                    borderColor: "#E8EAED",
                    hoverBackgroundColor: '#f0ad4e',
                    hoverBorderColor: "#E8EAED",
                    data: [112500, 112500, 112500, 112500],
                    barPercentage: .75,
                    categoryPercentage: .5
                },

            ]
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
                        min: 0,
                        stepSize: 40000,
                        callback: function (value, index, ticks) {
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
                        fontSize: GetChartFontSize()
                    }

                }]
            }
        }
    });
});
