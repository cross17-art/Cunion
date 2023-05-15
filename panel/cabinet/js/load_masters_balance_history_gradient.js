var iconUp = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-up align-middle me-2\"><polyline points=\"23 6 13.5 15.5 8.5 10.5 1 18\"></polyline><polyline points=\"17 6 23 6 23 12\"></polyline></svg>";
var iconDown = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-down align-middle me-2\"><polyline points=\"23 18 13.5 8.5 8.5 13.5 1 6\"></polyline><polyline points=\"17 18 23 18 23 12\"></polyline></svg>";
var coinIcon = "<i class=\"align-middle me-2 fas fa-fw fa-coins\"></i>";
var clockIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clock align-middle me-2\"><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><polyline points=\"12 6 12 12 16 14\"></polyline></svg>"
var profitIcon = "<svg style='transform: scale(1.5);' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-up align-middle me-2\"><polyline points=\"17 11 12 6 7 11\"></polyline><polyline points=\"17 18 12 13 7 18\"></polyline></svg>";
var lossIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-down align-middle me-2\"><polyline points=\"7 13 12 18 17 13\"></polyline><polyline points=\"7 6 12 11 17 6\"></polyline></svg>";
var dollarIcon = "<i style=\" margin: 0 !important; padding: 0 !important; width: 10px\" class=\"align-middle me-2 fas fa-fw fa-dollar-sign\"></i>";
var percentIcon = "<svg style='margin-right: 0px !important;' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-percent align-middle me-2\"><line x1=\"19\" y1=\"5\" x2=\"5\" y2=\"19\"></line><circle cx=\"6.5\" cy=\"6.5\" r=\"2.5\"></circle><circle cx=\"17.5\" cy=\"17.5\" r=\"2.5\"></circle></svg>"


let width, height, gradient;
    function getGradient(ctx, chartArea) {
        const chartWidth = chartArea.right - chartArea.left;
        const chartHeight = chartArea.bottom - chartArea.top;
        if (!gradient || width !== chartWidth || height !== chartHeight) {
            // Create the gradient because this is either the first render
            // or the size of the chart has changed
            width = chartWidth;
            height = chartHeight;
            gradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);
            gradient.addColorStop(0, '#d9534fc7');
            gradient.addColorStop(0.5, '#4f66d9');
            gradient.addColorStop(1, '#4fd961');
        }

        return gradient;
    }


MasterBalanceHistoryLoader = class {
    masterHistoryArray = [];
    masters = [];
    masterEmailArray = [];
    masterEmailArrayById = [];
    dateElement;

    constructor() {

        //Create date tooltip element
        this.dateElement = document.createElement('div');
        this.dateElement.style.position = 'absolute';
        this.dateElement.style.fontSize = "13px";
        this.dateElement.style.width = "100%";
        this.dateElement.style.bottom = "10px";
        this.dateElement.style.display = "";


        //Hide date tooltip when mouse over from any balance history canvas
        document.querySelectorAll('td[balance] > canvas').forEach((element) => {
            element.addEventListener('mouseout', () => {
                this.HideDateTooltip();
            })
        })
    }

    DrawBalances = async () => {
        await masterBalanceHistoryLoader.Init();
        await masterBalanceHistoryLoader.DisplayBalances();
    }

    Init = async () => {
        await this.LoadMastersHistory().then((balances) => {
            balances.forEach((balanceRecord) => {
                // console.log(balanceRecord)
                if (this.masters[balanceRecord.user_id] === undefined) {
                    this.masters[balanceRecord.user_id] = [];
                    this.masters[balanceRecord.user_id].push(balanceRecord);
                } else {
                    this.masters[balanceRecord.user_id].push(balanceRecord);
                }
                this.masterEmailArrayById[balanceRecord.user_id] = balanceRecord.user_email;
                //Get all Unique master Emails in array
                if (!this.masterEmailArray.includes(balanceRecord.user_email)) {
                    this.masterEmailArray.push(balanceRecord.user_email);
                }
            })
        });
        //Receive transfer list from transferLoader
        let transferList = await transfer_loader.LoadAllTransfersByEmailList(this.masterEmailArray);
    }

    LoadMastersHistory = async () => {
        let url = "https://cunion.io/panel/copy_server_api/kucoin/load_masters_balance_history.php";
        let result = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application-json'
            }
        }).then((rsp) => {
            return rsp.json()
        }).then((data) => {
            // console.log("LoadMasterHistoryBalancesResult", data);
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
            if (balancePoints.length >= 2) {
                let masterCanvas = document.querySelector("[chart = master_balance][master-id = '" + masterId + "']");
                if (masterCanvas != null) {
                    let canvasId = masterCanvas.id;
                    // this.DrawBalanceLine(canvasId, balancePoints, masterId);
                    this.DrawROILine(canvasId, balancePoints, masterId, 0);
                    this.DrawRoi(masterId, balancePoints);
                }
            }
        })
    }

    DrawRoi = function (masterId, balancePoints) {
        const masterEmail = this.GetMasterEmailById(masterId);

        //Collect balance for two days
        let twoDays = balancePoints.reverse().slice(0, 2);
        let day_0 = twoDays[0].balance;
        let day_1 = twoDays[1].balance;


        //Daily Profit
        let dailyProfit = parseInt((day_0 - day_1) * 100) / 100;
        let roiPercent = parseInt((dailyProfit / day_1 * 100) * 100) / 100;

        //Weekly Profit
        let dayCount = 7;
        let Days = balancePoints.slice(0, dayCount);
        let day_start = Days[0].balance;
        let date_start = Days[0].date;
        let day_end = Days[Days.length - 1].balance;
        let date_end = Days[Days.length - 1].date;
        let totalWeeklyTransferSum = transfer_loader.GetSumTransferByMasterEmailFromToDay(masterEmail, date_start, date_end);
        let weeklyProfit = parseInt((day_start - day_end - totalWeeklyTransferSum) * 100) / 100;
        let weeklyRoi = parseInt(weeklyProfit / day_end * 100 * 100) / 100;

        //2xWeekly Profit
        dayCount = 14;
        Days = balancePoints.slice(0, dayCount);
        day_start = Days[0].balance;
        date_start = Days[0].date;
        day_end = Days[Days.length - 1].balance;
        date_end = Days[Days.length - 1].date
        let total_2x_WeeklyTransferSum = transfer_loader.GetSumTransferByMasterEmailFromToDay(masterEmail, date_start, date_end);
        let weeklyProfit_x2 = parseInt((day_start - day_end - total_2x_WeeklyTransferSum) * 100) / 100;
        let weeklyRoi_x2 = parseInt(weeklyProfit_x2 / day_end * 100 * 100) / 100;

        //3xWeekly Profit
        dayCount = 21;
        Days = balancePoints.slice(0, dayCount);
        day_start = Days[0].balance;
        date_start = Days[0].date;
        day_end = Days[Days.length - 1].balance;
        date_end = Days[Days.length - 1].date
        let total_3x_WeeklyTransferSum = transfer_loader.GetSumTransferByMasterEmailFromToDay(masterEmail, date_start, date_end);
        let weeklyProfit_x3 = parseInt((day_start - day_end - total_3x_WeeklyTransferSum) * 100) / 100;
        let weeklyRoi_x3 = parseInt(weeklyProfit_x3 / day_end * 100 * 100) / 100;

        //TotalProfit
        let startPoint = balancePoints[0];
        let endPoint = balancePoints[balancePoints.length - 1];
        let totalTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay(masterEmail, startPoint.date, endPoint.date);
        let totalProfit = parseInt((parseFloat(startPoint.balance) - parseFloat(endPoint.balance) - totalTransfer) * 100) / 100;
        let totalRoi = parseInt(totalProfit / parseFloat(endPoint.balance) * 100 * 100) / 100;


        // if(masterId === '133'){
        //     dailyProfit = -23.03;
        //     roiPercent = -4.5;
        //     weeklyProfit = -112.34;
        //     weeklyRoi = -33.12;
        //     totalProfit = -1230.20;
        //     totalRoi = -93.87;
        // }

        const per1000Element = '<span style=" display: inline-block; "><span style=" font-size: 10px; display: block; margin-top: -9px; position: relative; top: -9px;">\\1000$</span></span>';
        // let dailyState =  "$" + dailyProfit + per1000Element + " (" + roiPercent + "%)";
        // let weeklyState = "$" + weeklyProfit + per1000Element + " (" + weeklyRoi +"%)";
        // let weeklyState_x2 = "$" + weeklyProfit_x2 + per1000Element + " (" + weeklyRoi_x2 +"%)";
        // let weeklyState_x3 = "$" + weeklyProfit_x3 + per1000Element + " (" + weeklyRoi_x3 +"%)";
        // let fullState = "$" + totalProfit + per1000Element + " (" + totalRoi +"%)";
        let dailyState = "$" + parseInt(roiPercent * 10) + " (" + roiPercent + "%)";
        let weeklyState = "$" + parseInt(weeklyRoi * 10) + " (" + weeklyRoi + "%)";
        let weeklyState_x2 = "$" + parseInt(weeklyRoi_x2 * 10) + " (" + weeklyRoi_x2 + "%)";
        let weeklyState_x3 = "$" + parseInt(weeklyRoi_x3 * 10) + " (" + weeklyRoi_x3 + "%)";
        let fullState = "$" + parseInt(totalRoi * 10) + " (" + totalRoi + "%)";


        // let dailyState =  "$" + parseInt(roiPercent*10) + per1000Element;
        // let weeklyState = "$" + parseInt(weeklyRoi*10) + per1000Element;
        // let weeklyState_x2 = "$" + parseInt(weeklyRoi_x2*10) + per1000Element;
        // let weeklyState_x3 = "$" + parseInt(weeklyRoi_x3*10) + per1000Element;
        // let fullState = "$" + parseInt(totalRoi*10) + per1000Element;
        let roiTd = document.querySelector("tr[master-id ='" + masterId + "'] > td[roi]")
        roiTd.querySelector("[daily-profit]").innerHTML = dailyState;
        roiTd.querySelector("[weekly-profit]").innerHTML = weeklyState;
        roiTd.querySelector("[weekly-profit-x2]").innerHTML = weeklyState_x2;
        // roiTd.querySelector("[weekly-profit-x2]").setAttribute('sort_stat', weeklyRoi_x2);
        roiTd.querySelector("[weekly-profit-x3]").innerHTML = weeklyState_x3;
        roiTd.querySelector("[weekly-profit-x3]").setAttribute('sort_stat', weeklyRoi_x3);
        roiTd.querySelector("[total-profit]").innerHTML = fullState;

        let greenColor = '#4bbf73';
        let redColor = '#d9534fc7';

        let profitColor = '#62cbfe';
        let lossColor = "#898e99"
        if (dailyProfit >= 0) {
            roiTd.querySelector("[upper-daily-arrow]").style.display = "block";
            roiTd.querySelector("[down-daily-arrow]").style.display = "none";
            roiTd.querySelector("[roi-per-day]").style.color = profitColor;
        } else {
            roiTd.querySelector("[upper-daily-arrow]").style.display = "none";
            roiTd.querySelector("[down-daily-arrow]").style.display = "block";
            roiTd.querySelector("[roi-per-day]").style.color = lossColor;
            roiTd.querySelector("[roi-per-day]").style.fontSize = "12px";
        }

        if (weeklyProfit >= 0) {
            roiTd.querySelector("[upper-weekly-arrow]").style.display = "block";
            roiTd.querySelector("[down-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[roi-per-week]").style.color = profitColor;
        } else {
            roiTd.querySelector("[upper-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[down-weekly-arrow]").style.display = "block";
            roiTd.querySelector("[roi-per-week]").style.color = lossColor;
            roiTd.querySelector("[roi-per-week]").style.fontSize = "12px";
        }

        if (weeklyProfit_x2 >= 0) {
            roiTd.querySelector("[upper-2x-weekly-arrow]").style.display = "block";
            roiTd.querySelector("[down-2x-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[roi-per-week-x2]").style.color = profitColor;
        } else {
            roiTd.querySelector("[upper-2x-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[down-2x-weekly-arrow]").style.display = "block";
            lossColor
            roiTd.querySelector("[roi-per-week-x2]").style.fontSize = "12px";
        }

        if (weeklyProfit_x3 >= 0) {
            roiTd.querySelector("[upper-3x-weekly-arrow]").style.display = "block";
            roiTd.querySelector("[down-3x-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[roi-per-week-x3]").style.color = profitColor;
        } else {
            roiTd.querySelector("[upper-3x-weekly-arrow]").style.display = "none";
            roiTd.querySelector("[down-3x-weekly-arrow]").style.display = "block";
            roiTd.querySelector("[roi-per-week-x3]").style.color = lossColor;
            roiTd.querySelector("[roi-per-week-x3]").style.fontSize = "12px";
        }

        if (totalProfit >= 0) {
            roiTd.querySelector("[upper-total-arrow]").style.display = "block";
            roiTd.querySelector("[down-total-arrow]").style.display = "none";
            roiTd.querySelector("[roi-total]").style.color = profitColor;
        } else {
            roiTd.querySelector("[upper-total-arrow]").style.display = "none";
            roiTd.querySelector("[down-total-arrow]").style.display = "block";
            roiTd.querySelector("[roi-total]").style.color = lossColor;
            roiTd.querySelector("[roi-total]").style.fontSize = "12px";
        }
    }

    DrawBalanceLine = (canvasId, balancePoints, masterId, displaying_days= 0) => {

        let positiveTransferDataSet = [];
        let negativeTransferDataSet = [];
        let transfersArray = [];
        let dataArray = [];

        // --- Prepare labels ---
        let labels = [];
        let balanceY = [];

        balancePoints.forEach((point, index, array) => {
            if(index > array.length - displaying_days || displaying_days == 0){
                dataArray.push(date_handler.Format(point.date, 3));
                labels.push("");
                balanceY.push(point.balance);

                let masterEmail = point.user_email;
                let dayStartTime = date_handler.GetStartOfTheDay(point.date);

                if(index < array.length - 1){
                    let dayCumulativeTransfer = transfer_loader.GetCumulativeTransferForTheDayByMasterEmail(masterEmail, dayStartTime);

                    if (dayCumulativeTransfer != null && dayCumulativeTransfer != 0) {
                        if (dayCumulativeTransfer > 0) {
                            positiveTransferDataSet.push(point.balance);
                            negativeTransferDataSet.push(null);
                        }
                        if (dayCumulativeTransfer < 0) {
                            positiveTransferDataSet.push(null);
                            negativeTransferDataSet.push(point.balance);
                        }
                        transfersArray.push({cumulativeDayTransfer: dayCumulativeTransfer});
                    } else {
                        positiveTransferDataSet.push(null);
                        negativeTransferDataSet.push(null);
                        transfersArray.push(null);
                    }
                }
            }
        })

        //--- find min max levels
        let maxPoint = balancePoints[0];
        let minPoint = balancePoints[0]
        balancePoints.forEach((point) => {
            if (parseFloat(point.balance) > parseFloat(maxPoint.balance))
                maxPoint = point
            if (parseFloat(point.balance) < parseFloat(minPoint.balance))
                minPoint = point
        })

        // console.log(maxPoint)
        // console.log(minPoint)
        var maxY = parseFloat(maxPoint.balance);
        var minY = parseFloat(minPoint.balance);
        var topBuffer = (maxY) / 100 * 5;
        var bottomBuffer = (minY) / 100 * 5;

        // Line chart
        new Chart(document.getElementById(canvasId), {
            type: "line",
            data: {
                labels: labels,
                datasets: [
                    {
                        //Positive Transfer
                        label: "Transfer",
                        fill: false,
                        backgroundColor: '#4bbf73',
                        data: positiveTransferDataSet,
                        borderColor: '#4bbf73',
                        borderDash: [0, 10],
                        pointRadius: 3,
                        borderWidth: 1
                    },
                    {
                        // Negative Transfer
                        label: "Transfer",
                        fill: false,
                        backgroundColor: '#d9534f',
                        data: negativeTransferDataSet,
                        borderColor: '#d9534f',
                        borderDash: [0, 10],
                        pointRadius: 3,
                        borderWidth: 1
                    },
                    {
                        label: "USDT",
                        fill: true,
                        backgroundColor: '#27435b', //Label color
                        borderColor: window.theme.primary,
                        // borderColor: '#4bbf73',
                        pointRadius: 0,
                        borderWidth: 2,
                        data: balanceY
                    }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                elements: {
                    point: {
                        radius: 1
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {

                            masterBalanceHistoryLoader.DrawDateTooltip(dataArray[tooltipItem.index], canvasId);


                            if (tooltipItem.datasetIndex === 0) {
                                //Positive Transfer
                                if(transfersArray[tooltipItem.index] != null){
                                    const value = transfersArray[tooltipItem.index].cumulativeDayTransfer;
                                    return "+" + parseInt(value * 100) / 100 + " USDT Transfer";
                                }

                            }
                            if (tooltipItem.datasetIndex === 1) {
                                //Negative Transfer
                                if(transfersArray[tooltipItem.index]){
                                    const value = transfersArray[tooltipItem.index].cumulativeDayTransfer;
                                    return parseInt(value * 100) / 100 + " USDT  Transfer";
                                }
                            }
                            if (tooltipItem.datasetIndex === 2) {
                                return "Total " + parseInt(tooltipItem.yLabel * 100) / 100 + "\n USDT";
                            }
                        }
                    },
                    intersect: false,
                },
                layout: {
                    padding:{
                        left:10,
                        right:15,
                        bottom:20
                    }
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
                        display: false,
                        reverse: true,
                        gridLines: {
                            color: "#293042",
                            drawBorder: false,
                            display:false,
                            borderDash: [10, 10],
                        },
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            drawBorder: false,
                            borderDash: [10, 10],
                        },

                        ticks: {
                            display: false,
                            min: minY - bottomBuffer,
                            max: maxY + topBuffer,
                            stepSize: parseInt(minY - bottomBuffer - (maxY + topBuffer)),
                        }
                    }]
                }
            }
        });

        // BTC Chart
        new Chart(document.getElementById(canvasId + "_btc"), {
            type: "line",
            data: {
                labels: labels,
                datasets: [
                    {
                        //Positive Transfer
                        label: "Transfer",
                        fill: false,
                        backgroundColor: '#4bbf73',
                        data: positiveTransferDataSet,
                        borderColor: '#4bbf73',
                        borderDash: [0, 10],
                        pointRadius: 3,
                        borderWidth: 1
                    },
                    {
                        // Negative Transfer
                        label: "Transfer",
                        fill: false,
                        backgroundColor: '#d9534f',
                        data: negativeTransferDataSet,
                        borderColor: '#d9534f',
                        borderDash: [0, 10],
                        pointRadius: 3,
                        borderWidth: 1
                    },
                    {
                        label: "USDT",
                        fill: true,
                        backgroundColor: '#46403f', //Label color
                        borderColor: '#c68836',
                        // borderColor: '#4bbf73',
                        pointRadius: 0,
                        borderWidth: 2,
                        data: balanceY
                    }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                elements: {
                    point: {
                        radius: 1
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {

                            masterBalanceHistoryLoader.DrawDateTooltip(dataArray[tooltipItem.index], canvasId);


                            if (tooltipItem.datasetIndex === 0) {
                                //Positive Transfer
                                if(transfersArray[tooltipItem.index] != null){
                                    const value = transfersArray[tooltipItem.index].cumulativeDayTransfer;
                                    return "+" + parseInt(value * 100) / 100 + " USDT Transfer";
                                }

                            }
                            if (tooltipItem.datasetIndex === 1) {
                                //Negative Transfer
                                if(transfersArray[tooltipItem.index]){
                                    const value = transfersArray[tooltipItem.index].cumulativeDayTransfer;
                                    return parseInt(value * 100) / 100 + " USDT  Transfer";
                                }
                            }
                            if (tooltipItem.datasetIndex === 2) {
                                return "Total " + parseInt(tooltipItem.yLabel * 100) / 100 + "\n USDT";
                            }
                        }
                    },
                    intersect: false,
                },
                layout: {
                    padding:{
                        left:10,
                        right:15,
                        bottom:20
                    }
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
                        display: false,
                        reverse: true,
                        gridLines: {
                            color: "#293042",
                            drawBorder: false,
                            display:false,
                            borderDash: [10, 10],
                        },
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            drawBorder: false,
                            borderDash: [10, 10],
                        },

                        ticks: {
                            display: false,
                            min: minY - bottomBuffer,
                            max: maxY + topBuffer,
                            stepSize: parseInt(minY - bottomBuffer - (maxY + topBuffer)),
                        }
                    }]
                }
            }
        });
    }

    DrawROILine = (canvasId, balancePoints, masterId, displaying_days= 0) => {

        let positiveTransferDataSet = [];
        let negativeTransferDataSet = [];
        let transfersArray = [];
        let dataArray = [];

        // --- Prepare labels ---
        let labels = [];
        let balanceY = [];

        //This is the point from where the calculation will start for ROI calculation model
        let startIndexROIBalancePoint = 0;
        let startROIBalancePoint = balancePoints[0]
        if (displaying_days === 0 || balancePoints.length < displaying_days ) {
            startIndexROIBalancePoint = 0;
        } else {
            startIndexROIBalancePoint = balancePoints.length - displaying_days ;
        }
        startROIBalancePoint = balancePoints[startIndexROIBalancePoint];


        //Compose ROI Points
        let ROIPoints = [];
        let ROILabels = [];
        let positiveRoiPoints = [];
        let negativeRoiPoints = [];
        let masterEmail = startROIBalancePoint.user_email;
        ROILabels.push(0);
        ROIPoints.push(0);
        for(let i=startIndexROIBalancePoint + 1; i<balancePoints.length; i++){
            let currentPoint =  balancePoints[i];
            let cumulativeTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay(masterEmail, startROIBalancePoint.date, currentPoint.date);
            let pointBalanceDelta = currentPoint.balance - startROIBalancePoint.balance;
            if(cumulativeTransfer != null){
                // debugger
            }
            let pointBalanceRoi = (pointBalanceDelta/startROIBalancePoint.balance)*100; //TODO include transfers

            ROILabels.push("")
            ROIPoints.push(pointBalanceRoi);
            if(pointBalanceRoi > 0){
                positiveRoiPoints.push(pointBalanceRoi);
                negativeRoiPoints.push(0);
            }
            if(pointBalanceRoi < 0){
                positiveRoiPoints.push(0);
                negativeRoiPoints.push(pointBalanceRoi);
            }
        }


        balancePoints.forEach((point, index, array) => {
            if(index > array.length - displaying_days || displaying_days == 0){
                dataArray.push(date_handler.Format(point.date, 3));
                labels.push("");
                balanceY.push(point.balance);

                let masterEmail = point.user_email;
                let dayStartTime = date_handler.GetStartOfTheDay(point.date);

                if(index < array.length - 1){

                    let dayCumulativeTransfer = transfer_loader.GetCumulativeTransferForTheDayByMasterEmail(masterEmail, dayStartTime);

                    if (dayCumulativeTransfer != null && dayCumulativeTransfer != 0) {
                        if (dayCumulativeTransfer > 0) {
                            positiveTransferDataSet.push(point.balance);
                            negativeTransferDataSet.push(null);
                        }
                        if (dayCumulativeTransfer < 0) {
                            positiveTransferDataSet.push(null);
                            negativeTransferDataSet.push(point.balance);
                        }
                        transfersArray.push({cumulativeDayTransfer: dayCumulativeTransfer});
                    } else {
                        positiveTransferDataSet.push(null);
                        negativeTransferDataSet.push(null);
                        transfersArray.push(null);
                    }
                }
            }
        })


        // --- Find Max/Min Roi
        let maxRoiPoint = Math.max(...ROIPoints);
        let minRoiPoint = Math.min(...ROIPoints);
        var maxY = maxRoiPoint;
        var minY = minRoiPoint;
        var topBuffer = Math.abs((maxY) / 100 * 5);
        var bottomBuffer = Math.abs((minY) / 100 * 5);


        // Line chart
        new Chart(document.getElementById(canvasId), {
            type: "line",
            data: {
                labels:
                datasets: [
                    {
                        label: "USDT",
                        fill: true,
                        backgroundColor: function(context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;

                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getGradient(ctx, chartArea);
                        },
                        borderColor: function(context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;

                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getGradient(ctx, chartArea);
                        },
                        // borderColor: '#4bbf73',
                        pointRadius: 0,
                        borderWidth: 2,
                        data: [0,2,-7,-10,-3,5,9]
                    }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                elements: {
                    point: {
                        radius: 1
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {

                            masterBalanceHistoryLoader.DrawDateTooltip(dataArray[tooltipItem.index], canvasId);
                            return "Total " + parseInt(tooltipItem.yLabel * 100) / 100 + "%";
                        }
                    },
                    intersect: false,
                },
                layout: {
                    padding:{
                        left:10,
                        right:15,
                        bottom:20
                    }
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
                        display: false,
                        reverse: true,
                        gridLines: {
                            color: "#293042",
                            drawBorder: false,
                            display:false,
                            borderDash: [10, 10],
                        },
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            drawBorder: false,
                            borderDash: [10, 10],
                        },

                        ticks: {
                            display: false,
                            // min: minY - bottomBuffer,
                            // max: maxY + topBuffer,
                            // stepSize: parseInt(minY - bottomBuffer - (maxY + topBuffer)),
                            min:-10,
                            max:10
                        }
                    }]
                }
            }
        });

        // BTC Chart
        new Chart(document.getElementById(canvasId + "_btc"), {
            type: "line",
            data: {
                labels: labels,
                datasets: [
                    {
                        //Positive Transfer
                        label: "Transfer",
                        fill: false,
                        backgroundColor: '#4bbf73',
                        data: positiveTransferDataSet,
                        borderColor: '#4bbf73',
                        borderDash: [0, 10],
                        pointRadius: 3,
                        borderWidth: 1
                    },
                    {
                        // Negative Transfer
                        label: "Transfer",
                        fill: false,
                        backgroundColor: '#d9534f',
                        data: negativeTransferDataSet,
                        borderColor: '#d9534f',
                        borderDash: [0, 10],
                        pointRadius: 3,
                        borderWidth: 1
                    },
                    {
                        label: "USDT",
                        fill: true,
                        backgroundColor: '#46403f', //Label color
                        borderColor: '#c68836',
                        // borderColor: '#4bbf73',
                        pointRadius: 0,
                        borderWidth: 2,
                        data: balanceY
                    }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                elements: {
                    point: {
                        radius: 1
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {

                            masterBalanceHistoryLoader.DrawDateTooltip(dataArray[tooltipItem.index], canvasId);


                            if (tooltipItem.datasetIndex === 0) {
                                //Positive Transfer
                                if(transfersArray[tooltipItem.index] != null){
                                    const value = transfersArray[tooltipItem.index].cumulativeDayTransfer;
                                    return "+" + parseInt(value * 100) / 100 + " USDT Transfer";
                                }

                            }
                            if (tooltipItem.datasetIndex === 1) {
                                //Negative Transfer
                                if(transfersArray[tooltipItem.index]){
                                    const value = transfersArray[tooltipItem.index].cumulativeDayTransfer;
                                    return parseInt(value * 100) / 100 + " USDT  Transfer";
                                }
                            }
                            if (tooltipItem.datasetIndex === 2) {
                                return "Total " + parseInt(tooltipItem.yLabel * 100) / 100 + "\n USDT";
                            }
                        }
                    },
                    intersect: false,
                },
                layout: {
                    padding:{
                        left:10,
                        right:15,
                        bottom:20
                    }
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
                        display: false,
                        reverse: true,
                        gridLines: {
                            color: "#293042",
                            drawBorder: false,
                            display:false,
                            borderDash: [10, 10],
                        },
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            drawBorder: false,
                            borderDash: [10, 10],
                        },

                        ticks: {
                            display: false,
                            min: minY - bottomBuffer,
                            max: maxY + topBuffer,
                            stepSize: parseInt(minY - bottomBuffer - (maxY + topBuffer)),
                        }
                    }]
                }
            }
        });
    }


    GetMasterEmailById = (master_id) => {
        return this.masterEmailArrayById[master_id];
    }


    DrawDateTooltip = (datePoint, canvasId) => {
        this.dateElement.innerHTML = datePoint;
        this.dateElement.style.display = "";
        document.getElementById(canvasId).parentElement.appendChild(this.dateElement)
    }

    HideDateTooltip = () => {
        this.dateElement.style.display = 'none';
    }

};
var masterBalanceHistoryLoader;
document.addEventListener("DOMContentLoaded", () => {
    masterBalanceHistoryLoader = new MasterBalanceHistoryLoader();
    masterBalanceHistoryLoader.DrawBalances().then(() => {
        var master_table_sorter = new MasterTableSorter();
        master_table_sorter.Init();
    });
});

