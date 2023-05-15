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
                let masterBaseAsset = value[0].master_base_asset
                let masterCanvas = document.querySelector("[chart = master_balance][master-id = '" + masterId + "']");
                if (masterCanvas != null) {
                    let canvasId = masterCanvas.id;
                    // this.DrawBalanceLine(canvasId, balancePoints, masterId);
                    if(masterBaseAsset === 'USDT'){
                        this.DrawROILine(canvasId, balancePoints, masterId, 0);
                        this.DrawRoi(masterId, balancePoints);
                    } else if (masterBaseAsset === "BTC") {
                        this.DrawROILine_BTC(canvasId, balancePoints, masterId, 0);
                        this.DrawRoi_BTC(masterId, balancePoints);
                    }

                }
            }
        })
    }

    DrawRoi = function (masterId, balancePoints) {
        const masterEmail = this.GetMasterEmailById(masterId);
        // balancePoints.reverse()
        let roiTd = document.querySelector("tr[master-id ='" + masterId + "'] > td[roi]")
        let indicatorTemplate = roiTd.querySelector("[roi-indicator-template]");

        let totalIndicator = new RoiIndicator('total', balancePoints.length, balancePoints, masterEmail, indicatorTemplate, 'Roi Per Day having 1000$ deposit');
        totalIndicator.Init();

        const roiRatioCalculator = new ROI_RatioCalculator(balancePoints);
        roiRatioCalculator.CalculateRatioModel();
        totalIndicator.roi = roiRatioCalculator.GetTotalRoi();

        totalIndicator.Display();
        totalIndicator.SetAsSortCriteria();

        let dailyIndicator = new RoiIndicator('day', 1, balancePoints, masterEmail, indicatorTemplate, 'Roi Per Day having 1000$ deposit');
        dailyIndicator.Init();
        dailyIndicator.Display();

        let weeklyIndicator = new RoiIndicator('week', 7, balancePoints, masterEmail, indicatorTemplate, 'Roi Per Week having 1000$ deposit');
        weeklyIndicator.Init();
        weeklyIndicator.Display();

        let monthlyIndicator = new RoiIndicator('month', 30, balancePoints, masterEmail, indicatorTemplate, 'Roi Per Month having 1000$ deposit');
        monthlyIndicator.Init();
        monthlyIndicator.Display();

        StartArrowsAnimation();
    }

    DrawRoi_BTC = function (masterId, balancePoints) {
        const masterEmail = this.GetMasterEmailById(masterId);
        let availableBTCBalancePoints = this.PrepareActualBTCBalancePoint(balancePoints);
        availableBTCBalancePoints.reverse()
        let roiTd = document.querySelector("tr[master-id ='" + masterId + "'] > td[roi]")
        let indicatorTemplate = roiTd.querySelector("[roi-indicator-template_BTC]");


        let totalIndicator = new RoiIndicator_BTC('total', availableBTCBalancePoints.length, availableBTCBalancePoints, masterEmail, indicatorTemplate, 'Roi Per Day having 1 BTC deposit');
        totalIndicator.Init();
        totalIndicator.Display();
        totalIndicator.SetAsSortCriteria();

        let dailyIndicator = new RoiIndicator_BTC('day', 1, availableBTCBalancePoints, masterEmail, indicatorTemplate, 'Roi Per Day having 1 BTC deposit');
        dailyIndicator.Init();
        dailyIndicator.Display();

        let weeklyIndicator = new RoiIndicator_BTC('week', 7, availableBTCBalancePoints, masterEmail, indicatorTemplate, 'Roi Per Week having 1 BTC deposit');
        weeklyIndicator.Init();
        weeklyIndicator.Display();

        let monthlyIndicator = new RoiIndicator_BTC('month', 30, availableBTCBalancePoints, masterEmail, indicatorTemplate, 'Roi Per Month having 1 BTC deposit');
        monthlyIndicator.Init();
        monthlyIndicator.Display();

        StartArrowsAnimation();
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
                            color: "#293042",
                            display: false,
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

    DrawROILine = (canvasId, balancePoints, masterId, displaying_days = 0) => {

        let ROILabels = [];
        let dataArray = [];

        const roiRatioCalculator = new ROI_RatioCalculator(balancePoints);
        let ratioRoiModelArray = roiRatioCalculator.CalculateRatioModel();
        let ROIPoints = roiRatioCalculator.GetRatioRoiPoints();


        ratioRoiModelArray.forEach((ratioModelPoint, index, array) => {
            dataArray.push(date_handler.Format(ratioModelPoint.date));
            ROILabels.push("")
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
                labels: ROILabels,
                datasets: [
                    {
                        label: "USDT",
                        fill: true,
                        backgroundColor: function (context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;

                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getBackgroundGradient(ctx, chartArea, minY, maxY);
                        },
                        borderColor: function (context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;
                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getGradient(ctx, chartArea, minY, maxY);
                        },
                        // borderColor: '#4bbf73',
                        pointRadius: 0,
                        borderWidth: 2,
                        data: ROIPoints
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
                    padding: {
                        left: 10,
                        right: 15,
                        bottom: 15,
                        top: 5
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
                            display: false,
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

    DrawROILine_BTC = (canvasId, balancePoints, masterId, displaying_days = 0) => {

        let dataArray = [];

        // --- Prepare labels ---


        //This is the point from where the calculation will start for ROI calculation model
        let startIndexROIBalancePoint = 0;
        let startROIBalancePoint = balancePoints[0]
        if (displaying_days === 0 || balancePoints.length < displaying_days) {
            startIndexROIBalancePoint = 0;
        } else {
            startIndexROIBalancePoint = balancePoints.length - displaying_days;
        }
        startROIBalancePoint = balancePoints[startIndexROIBalancePoint];

        if(startROIBalancePoint.btc_balance == 0){
            startIndexROIBalancePoint = this.FindFirstNotNullBalancePointIndex_BTC(balancePoints);
            startROIBalancePoint = balancePoints[startIndexROIBalancePoint];
        }


        //Compose ROI Points
        let ROIPoints = [];
        let ROILabels = [];

        let masterEmail = startROIBalancePoint.user_email;
        ROILabels.push(0);
        ROIPoints.push(0);


        for (let i = startIndexROIBalancePoint + 1; i < balancePoints.length; i++) {

            let currentPoint = balancePoints[i];

            // if(masterId == 258 && currentPoint.date > '2022-04-11 00:00:00'){
            //     debugger;
            // }

            let cumulativeTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay_InBTC(masterEmail, currentPoint.date, startROIBalancePoint.date);
            let pointBalanceDelta = currentPoint.btc_balance - startROIBalancePoint.btc_balance;

            let pointBalanceRoi = ((pointBalanceDelta - cumulativeTransfer) / startROIBalancePoint.btc_balance) * 100; //TODO include transfers
            ROILabels.push("")
            ROIPoints.push(pointBalanceRoi);
        }


        balancePoints.forEach((point, index, array) => {
            if (index >= array.length - displaying_days || displaying_days == 0) {
                dataArray.push(date_handler.Format(point.date, 3));
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
                labels: ROILabels,
                datasets: [
                    {
                        label: "USDT",
                        fill: true,
                        backgroundColor: function (context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;

                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getBackgroundGradient_BTC(ctx, chartArea, minY, maxY);
                        },
                        borderColor: function (context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;
                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getGradient_BTC(ctx, chartArea, minY, maxY);
                        },
                        // borderColor: '#4bbf73',
                        pointRadius: 0,
                        borderWidth: 2,
                        data: ROIPoints
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
                    padding: {
                        left: 10,
                        right: 15,
                        bottom: 15,
                        top: 5
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
                            display: false,
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

    FindFirstNotNullBalancePointIndex_BTC = (balancePointsArray) => {
        for(let i=0; i < balancePointsArray.length; i++){
            if(balancePointsArray[i].btc_balance != 0){
                return i;
            }
        }
    }


    PrepareActualBTCBalancePoint = (initialBalancePoints) => {
        let firstNotNullBTCBalancePoint = this.FindFirstNotNullBalancePointIndex_BTC(initialBalancePoints);
        let availableNotNullBTCBalancePointsArray = initialBalancePoints.slice(firstNotNullBTCBalancePoint);
        return availableNotNullBTCBalancePointsArray;
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

