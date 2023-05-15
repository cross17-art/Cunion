var iconUp = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-up align-middle me-2\"><polyline points=\"23 6 13.5 15.5 8.5 10.5 1 18\"></polyline><polyline points=\"17 6 23 6 23 12\"></polyline></svg>";
var iconDown = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-down align-middle me-2\"><polyline points=\"23 18 13.5 8.5 8.5 13.5 1 6\"></polyline><polyline points=\"17 18 23 18 23 12\"></polyline></svg>";
var coinIcon = "<i class=\"align-middle me-2 fas fa-fw fa-coins\"></i>";

var clockIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clock align-middle me-2\"><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><polyline points=\"12 6 12 12 16 14\"></polyline></svg>"


var profitIcon = "<svg style='transform: scale(1.5);' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-up align-middle me-2\"><polyline points=\"17 11 12 6 7 11\"></polyline><polyline points=\"17 18 12 13 7 18\"></polyline></svg>";
var lossIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-down align-middle me-2\"><polyline points=\"7 13 12 18 17 13\"></polyline><polyline points=\"7 6 12 11 17 6\"></polyline></svg>";
var dollarIcon = "<i style=\" margin: 0 !important; padding: 0 !important; width: 10px\" class=\"align-middle me-2 fas fa-fw fa-dollar-sign\"></i>";
var percentIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-percent align-middle me-2\"><line x1=\"19\" y1=\"5\" x2=\"5\" y2=\"19\"></line><circle cx=\"6.5\" cy=\"6.5\" r=\"2.5\"></circle><circle cx=\"17.5\" cy=\"17.5\" r=\"2.5\"></circle></svg>"

MasterBalanceHistoryLoader = class {

    masterBalancesHistory = [];
    masterID = "";

    constructor(master_id) {
        this.masterID = master_id
    }

    DrawBalances = async () =>{
        // await masterBalanceHistoryLoader.Init(this.masterID);
        this.masterBalancesHistory = await this.LoadMastersHistory(this.masterID);

        this.DisplayBalances(this.masterBalancesHistory);
        this.DisplayRoi(this.masterBalancesHistory)
    }

    LoadMastersHistory = async (master_id) => {
        let url = "https://cunion.io/client/copy_server_api/kucoin/masters/get_master_history_balance.php?master-id=" + master_id;

        let result = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type' : 'application-json'
            }
        }).then((rsp) => {
            return rsp.json()
        }).then((data) => {
            console.log("LoadMasterHistoryBalancesResult", data);
            return data.masterBalancesHistory;
        }).catch((err) => {
            console.log('LoadMasterHistory:' + master_id, err);
        })
        return result;
    }

    DisplayBalances = async (balanceHistory) => {

        let balancePoints = [];
        let labels = []

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];

        balanceHistory.forEach((balancePoint) => {
            balancePoints.push(balancePoint.balance);

            //---date
            let date = new Date(balancePoint.date);
            let dateString = monthNames[date.getMonth()] + "/" + date.getDate();
            labels.push(dateString)
        })

        this.DrawBalanceLine("chartjs-line", balancePoints, labels);
    }

    DisplayRoi =  (balanceHistory) =>{

        let balancePoints = [];
        let roiPoints = [];
        let nullPoints = [];
        let labels = [];
        let colors = [];

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];

        //--- Prepare balance points
        balanceHistory.forEach((balancePoint) => {
            balancePoints.push(balancePoint.balance);
            //---date
            let date = new Date(balancePoint.date);
            let dateString = monthNames[date.getMonth()] + "/" + date.getDate();
            labels.push(dateString)
        })


        //--- Prepare roi points
        roiPoints.push(0); //First point
        colors.push(0);
        balancePoints.forEach((point, index) => {
            if(index >=1) {
                let deltaBalance = point - balancePoints[index-1];
                let deltaRoi = deltaBalance/balancePoints[index-1]*100
                roiPoints.push(deltaRoi);
                nullPoints.push(0);

                //set colors
                colors.push(deltaBalance >= 0 ? "#4bbf73" : "#d9534f")
            }
        })

        this.DrawBalanceRoi("chartjs-dashboard-bar", roiPoints, nullPoints, colors, labels)

    }

    DrawBalanceLine = (canvasId, balancePoints, labels) => {

        // Line chart
        new Chart(document.getElementById(canvasId), {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: "USDT",
                    fill: true,
                    backgroundColor: "transparent",
                    // borderColor: window.theme.primary,
                    borderColor: '#4bbf73',
                    data: balancePoints
                }]
            },
            options: {
                responsive:false,
                maintainAspectRatio: false,
                elements: {
                    point:{
                        radius: 3
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: false
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        ticks:{
                            display: true
                        },
                        display: true,
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.05)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 90000,
                            display:true
                        },
                        display: true,
                        borderDash: [5, 5],
                        gridLines: {
                            color: "rgba(0,0,0,0)",
                            fontColor: "#fff"
                        }
                    }]
                }
            }
        });
    }



    DrawBalanceRoi = (canvasId, roiPoints, emptyPoints, colors, labels) => {

        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Daily Roi",
                    backgroundColor: colors,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: roiPoints,
                    barPercentage: .8,
                    categoryPercentage: .8
                }, {
                    label: "",
                    backgroundColor: window.theme["primary-light"],
                    borderColor: window.theme["primary-light"],
                    hoverBackgroundColor: window.theme["primary-light"],
                    hoverBorderColor: window.theme["primary-light"],
                    data: emptyPoints,
                    barPercentage: .8,
                    categoryPercentage: .8
                }]
            },
            options: {
                maintainAspectRatio: false,
                cornerRadius: 15,
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
                            stepSize: 20
                        },
                        stacked: true,
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        },
                        stacked: true,
                    }]
                }
            }
        });

    };
}


GetMasterIDFromURL = () => {
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString)
    return urlParams.get('master-id');
}


const masterBalanceHistoryLoader = new MasterBalanceHistoryLoader(GetMasterIDFromURL());
masterBalanceHistoryLoader.DrawBalances();
