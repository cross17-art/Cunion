var iconUp = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-up align-middle me-2\"><polyline points=\"23 6 13.5 15.5 8.5 10.5 1 18\"></polyline><polyline points=\"17 6 23 6 23 12\"></polyline></svg>";
var iconDown = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-down align-middle me-2\"><polyline points=\"23 18 13.5 8.5 8.5 13.5 1 6\"></polyline><polyline points=\"17 18 23 18 23 12\"></polyline></svg>";
var coinIcon = "<i class=\"align-middle me-2 fas fa-fw fa-coins\"></i>";

var clockIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clock align-middle me-2\"><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><polyline points=\"12 6 12 12 16 14\"></polyline></svg>"


var profitIcon = "<svg style='transform: scale(1.5);' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-up align-middle me-2\"><polyline points=\"17 11 12 6 7 11\"></polyline><polyline points=\"17 18 12 13 7 18\"></polyline></svg>";
var lossIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-down align-middle me-2\"><polyline points=\"7 13 12 18 17 13\"></polyline><polyline points=\"7 6 12 11 17 6\"></polyline></svg>";
var dollarIcon = "<i style=\" margin: 0 !important; padding: 0 !important; width: 10px\" class=\"align-middle me-2 fas fa-fw fa-dollar-sign\"></i>";
var percentIcon = "<svg style='margin-right: 0px !important;' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-percent align-middle me-2\"><line x1=\"19\" y1=\"5\" x2=\"5\" y2=\"19\"></line><circle cx=\"6.5\" cy=\"6.5\" r=\"2.5\"></circle><circle cx=\"17.5\" cy=\"17.5\" r=\"2.5\"></circle></svg>"

MasterBalanceHistoryLoader = class {

    masterHistoryArray = [];
    masters = [];

    constructor() {

    }

    DrawBalances = async () =>{
        await masterBalanceHistoryLoader.Init();
        await masterBalanceHistoryLoader.DisplayBalances();
    }

    Init = async () => {
        await this.LoadMastersHistory().then((balances) => {
            balances.forEach((balanceRecord) => {
                console.log(balanceRecord)
                if(this.masters[balanceRecord.user_id] === undefined) {
                    this.masters[balanceRecord.user_id] = [];
                    this.masters[balanceRecord.user_id].push(balanceRecord);
                } else {
                    this.masters[balanceRecord.user_id].push(balanceRecord);
                }
            })
        });
    }

    LoadMastersHistory = async () => {
        let url = "https://cunion.io/client/copy_server_api/kucoin/load_masters_balance_history.php"

        let result = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type' : 'application-json'
            }
        }).then((rsp) => {
            return rsp.json()
        }).then((data) => {
            console.log("LoadMasterHistoryBalancesResult", data);
            return data.balanceHistoryArray;
        }).catch((err) => {
            console.log('LoadMastersHistory', err);
        })

        this.masterHistoryArray = result;
        return result;
    }

    DisplayBalances = async () => {
        Object.entries(masterBalanceHistoryLoader.masters).forEach(([key, value]) => {
            let masterId = key;
            let balancePoints = value;

            let masterCanvas = document.querySelector("[chart = master_balance][master-id = '" + masterId + "']");
            if(masterCanvas != null){
                let canvasId = masterCanvas.id;
                this.DrawBalanceLine(canvasId, balancePoints);
                this.DrawRoi(masterId, balancePoints);
            }

        })
    }

    DrawRoi = function (masterId, balancePoints){


        //Collect balance for two days
        let twoDays = balancePoints.reverse().slice(0,2)
        let day_0 = twoDays[0].balance;
        let day_1 = twoDays[1].balance;

        let dailyProfit = parseInt((day_0 - day_1)*100)/100;
        let roiPercent = parseInt((dailyProfit/day_1*100)*100)/100
        let dailyStat =  "$" + dailyProfit + " (" + roiPercent + "%)";
        // show on front


        //collect the balance from the beginning
        let dayCount = 7;
        let Days = balancePoints.slice(0,dayCount)
        let day_start = Days[0].balance;
        let day_end = Days[Days.length-1].balance;

        let fullProfit = parseInt((day_start - day_end)*100)/100;
        let fullRoi = parseInt(fullProfit/day_end*100*100)/100;
        let fullState = "$" + fullProfit + " (" + fullRoi +"%)";


        let roiTd = document.querySelector("tr[master-id ='"+ masterId +"'] > td[roi]")
        roiTd.querySelector("[daily-profit]").innerHTML = dailyStat;
        roiTd.querySelector("[weekly-profit]").innerHTML = fullState;

        if(dailyProfit >= 0){
            roiTd.querySelector("[upper-daily-arrow]").style.display = "block";
            roiTd.querySelector("[down-daily-arrow]").style.display = "none";
            roiTd.querySelector("[roi-per-day]").style.color = "#4bbf73";
        } else {
            roiTd.querySelector("[upper-daily-arrow]").style.display = "none";
            roiTd.querySelector("[down-daily-arrow]").style.display = "block";
            roiTd.querySelector("[roi-per-day]").style.color = "#d9534f";
        }

        if(fullProfit >= 0){
            roiTd.querySelector("[upper-weekly-arrow]").style.display = "block";
            roiTd.querySelector("[down-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[roi-per-week]").style.color = "#4bbf73";
        } else {
            roiTd.querySelector("[upper-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[down-weekly-arrow]").style.display = "block";
            roiTd.querySelector("[roi-per-week]").style.color = "#d9534f";
        }

    }

    DrawBalanceLine = (canvasId, balancePoints) => {


        // --- Prepare labels ---
        let labels = [];
        let balanceY = [];
        balancePoints.forEach((point) => {
            labels.push("");
            balanceY.push(point.balance);

        })

        //--- find min max levels
        let maxPoint = balancePoints[0];
        let minPoint = balancePoints[0]
        balancePoints.forEach((point) => {
            if (point.balance > maxPoint.balance)
                maxPoint = point
            if(point.balance < minPoint.balance)
                minPoint = point
        })
        console.log(maxPoint)
        console.log(minPoint)

        var maxY = parseInt(maxPoint.balance);
        var minY = parseInt(minPoint.balance);
        var topBuffer = parseInt((maxY - minY)/100*15);


        // Line chart
        new Chart(document.getElementById(canvasId), {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: "USDT",
                    fill: true,
                    backgroundColor: "transparent",
                    borderColor: window.theme.primary,
                    data: balanceY
                }]
            },
            options: {
                responsive:false,
                maintainAspectRatio: false,
                elements: {
                    point:{
                        radius: 0
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
                        display: true,
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.05)"
                        }
                    }],
                    yAxes: [{

                        ticks: {
                            display:false,
                            min: minY,
                            max: maxY + topBuffer
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
}
const masterBalanceHistoryLoader = new MasterBalanceHistoryLoader();
masterBalanceHistoryLoader.DrawBalances();
