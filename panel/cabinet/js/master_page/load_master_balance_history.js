var iconUp = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-up align-middle me-2\"><polyline points=\"23 6 13.5 15.5 8.5 10.5 1 18\"></polyline><polyline points=\"17 6 23 6 23 12\"></polyline></svg>";
var iconDown = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-down align-middle me-2\"><polyline points=\"23 18 13.5 8.5 8.5 13.5 1 6\"></polyline><polyline points=\"17 18 23 18 23 12\"></polyline></svg>";
var coinIcon = "<i class=\"align-middle me-2 fas fa-fw fa-coins\"></i>";
var clockIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clock align-middle me-2\"><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><polyline points=\"12 6 12 12 16 14\"></polyline></svg>"
var profitIcon = "<svg style='transform: scale(1.5);' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-up align-middle me-2\"><polyline points=\"17 11 12 6 7 11\"></polyline><polyline points=\"17 18 12 13 7 18\"></polyline></svg>";
var lossIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-chevrons-down align-middle me-2\"><polyline points=\"7 13 12 18 17 13\"></polyline><polyline points=\"7 6 12 11 17 6\"></polyline></svg>";
var dollarIcon = "<i style=\" margin: 0 !important; padding: 0 !important; width: 10px\" class=\"align-middle me-2 fas fa-fw fa-dollar-sign\"></i>";
var percentIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-percent align-middle me-2\"><line x1=\"19\" y1=\"5\" x2=\"5\" y2=\"19\"></line><circle cx=\"6.5\" cy=\"6.5\" r=\"2.5\"></circle><circle cx=\"17.5\" cy=\"17.5\" r=\"2.5\"></circle></svg>"

var balanceChart;


MasterBalanceHistoryLoader = class {

    masterBalancesHistory = [];
    transferHistory = [];
    masterID = "";
    master_base_asset;

    constructor(master_id) {
        this.masterID = master_id

        //Create date tooltip element
        this.dateElement = document.createElement('div');
        this.dateElement.classList.add('roi-chart-date-tooltip');



        //Hide date tooltip when mouse over from any balance history canvas
        document.querySelectorAll('canvas').forEach((element) => {
            element.addEventListener('mouseout', () => {
                this.HideDateTooltip();
            })
        })
    }

    DrawBalances = async () => {
        // await masterBalanceHistoryLoader.Init(this.masterID);
        let transferHistory = transfer_loader.LoadMasterTransfersHistory();
        this.masterBalancesHistory = await this.LoadMastersHistory(this.masterID);
        this.transferHistory = await transferHistory;
        this.master_base_asset = this.masterBalancesHistory[0].master_base_asset;
        let totalTransfer = transfer_loader.DisplayTransfersOnMasterPage(this.transferHistory);
        let startDeposit = this.masterBalancesHistory[0].balance
        let currentBalance = this.masterBalancesHistory[this.masterBalancesHistory.length-1].balance
        let masterStatistics = new MasterStatistic(startDeposit, totalTransfer, currentBalance, this.masterBalancesHistory)

        this.DisplayStatistics(masterStatistics);
        this.DisplayBalances(this.masterBalancesHistory);
        this.DisplayRoiBars(this.masterBalancesHistory)
    }

    LoadMastersHistory = async (master_id) => {
        let url = "https://cunion.io/panel/copy_server_api/kucoin/masters/get_master_history_balance.php?master-id=" + master_id;

        let result = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application-json'
            }
        }).then((rsp) => {
            return rsp.json()
        }).then((data) => {
            // console.log("LoadMasterHistoryBalancesResult", data);
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

        balanceHistory.forEach((balancePoint, index, array) => {
            balancePoints.push(balancePoint.balance);
            //---date

            let halfIndex = parseInt(array.length/2);
            if(index == 0 || index == array.length-2 ||
                (array.length > 3 && index == halfIndex)){
                let dateString = date_handler.FormatDMY(balancePoint.date);
                labels.push(dateString)
            } else {
                labels.push('');
            }

        })

        let masterBaseAsset = balanceHistory[0].master_base_asset;

        this.DrawBalanceLine("chartjs-line", balanceHistory, labels);
        if(masterBaseAsset === 'USDT'){
            this.DrawROILine("chartjs-line-roi", balanceHistory, this.masterID);
        } else if(masterBaseAsset === 'BTC'){
            this.DrawROILine_BTC("chartjs-line-roi", balanceHistory, this.masterID);
        }
    }

    DisplayRoiBars = (balanceHistory, last_X_bars = 30) => {

        let masterEmail = balanceHistory[0].user_email;
        const roi_bar_calculator = new RoiBarCalculator();
        roi_bar_calculator.Init(masterEmail, balanceHistory);
        let roiBarsModel = roi_bar_calculator.CalculateRoiBars_Model();
        let displayingRoiBars = roiBarsModel.slice(-30);
        let dateArray = [];
        let ROIPoints = [];
            /**
             * @param {RoiBarModel} roiBar
             */
        displayingRoiBars.forEach((roiBar) => {
            ROIPoints.push(roiBar.roi);

            // let datePeriod = date_handler.Format(roiBar.dateFrom) + " - " + date_handler.Format(roiBar.dateTo);
            let datePeriod = date_handler.Format(roiBar.dateTo);
            dateArray.push(datePeriod);

        })

        let dateStart = displayingRoiBars[0].dateFrom
        let dateEnd = displayingRoiBars[displayingRoiBars.length-1].dateTo;

        document.querySelector('[roi-bars-date-1]').innerHTML = date_handler.FormatDMY(dateStart);
        document.querySelector('[roi-bars-date-2]').innerHTML = date_handler.FormatDMY(dateEnd);

        this.DrawRoiBars(ROIPoints, dateArray);
    }

    DrawBalanceLine = (canvasId, balancePoints, labels) => {

        let dataArray = [];
        let positiveTransferDataSet = [];
        let negativeTransferDataSet = [];
        let transfersArray = [];
        let balanceY = [];

        balancePoints.forEach((point, index, array) => {

            balanceY.push(point.balance);
            let masterEmail = point.user_email;


            let dayStartTime = date_handler.GetStartOfTheDay(point.date);
            let dayCumulativeTransfer = transfer_loader.GetCumulativeTransferForTheDayByMasterEmail(masterEmail, dayStartTime);

            if (dayCumulativeTransfer != null && dayCumulativeTransfer != 0 && index<array.length-1) {
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
        })


        balancePoints.forEach((point, index, array) => {
            dataArray.push(date_handler.Format(point.date, 3));
        })

        let maxRoiPoint = Math.max(...balanceY);
        let minRoiPoint = Math.min(...balanceY);
        var maxY = maxRoiPoint;
        var minY = minRoiPoint;
        var topBuffer = Math.abs((maxY) / 100 * 5);
        var bottomBuffer = Math.abs((minY) / 100 * 5);

        //--Display start end dates


        let startDate = date_handler.FormatDMY(balancePoints[0].date);
        let lastDate = date_handler.FormatDMY(balancePoints[balancePoints.length-1].date);

        document.querySelector('[balance-roi-line-date-1]').innerHTML = startDate;
        document.querySelector('[balance-roi-line-date-2]').innerHTML = lastDate;


        // Line chart
        balanceChart = new Chart(document.getElementById(canvasId), {
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
                        backgroundColor: function (context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;

                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getBackgroundGradientGreen(ctx, chartArea, minY, maxY);
                        },
                        borderColor: function (context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;
                            if (!chartArea) {
                                // This case happens on initial chart load
                                return;
                            }
                            return getGradientGreen(ctx, chartArea, minY, maxY);
                        },
                        data: balanceY,
                        pointRadius: 0,
                        borderWidth: 2
                    }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 0
                },
                elements: {
                    point: {
                        radius: 3
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
                    padding: {
                        left: 10,
                        right: 15,
                        bottom: 20
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
                            min: minY - bottomBuffer,
                            max: maxY + topBuffer,
                            display: false
                        },

                    }]
                }
            }
        });
    }

    DrawRoiBars = (daily_roi_points, dateArray) => {
        // Bar chart

        let emptyPoints = [] //Need to correctly display negative bars;
        let labels = [];
        let colors = [];
        let closuredRoiPoint = [];

        daily_roi_points.forEach((dailyRoiPoint) => {
            emptyPoints.push(0);
            labels.push("");
            closuredRoiPoint.push(dailyRoiPoint);
            if(dailyRoiPoint >= 0){
                colors.push("#4bbf73");
            } else {
                colors.push("#d9534f");
            }
        })

        let maxBar = Math.max(...daily_roi_points);
        let minBar = Math.min(...daily_roi_points);
        let maxDistance = Math.max(Math.abs(maxBar), Math.abs(minBar));

        let bgColors = [];

        new Chart(document.getElementById("roi_bars_chart"), {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Daily Roi",
                    // backgroundColor: colors,
                    backgroundColor: function (context) {
                        const chart = context.chart;
                        const {ctx, chartArea} = chart;

                        if (!chartArea) {
                            // This case happens on initial chart load
                            return;
                        }

                        let colors = [];

                        closuredRoiPoint.forEach((roiPoint) => {
                            if(roiPoint >= 0){
                                colors.push(getBackgroundGradient_Profit(ctx, chartArea));
                                bgColors.push(getBackgroundGradient_ProfitHover(ctx, chartArea));
                            } else {
                                colors.push(getBackgroundGradient_Loss(ctx, chartArea))
                                bgColors.push(getBackgroundGradient_LossHover(ctx, chartArea))
                            }
                        })

                        return colors ;
                    },
                    borderColor: window.theme.primary,
                    hoverBackgroundColor:bgColors,
                    hoverBorderColor: window.theme.primary,
                    // data: roiPoints,
                    data: daily_roi_points,
                    barPercentage: 1.1,
                    categoryPercentage: 1.2,
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
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {
                            masterBalanceHistoryLoader.DrawDateTooltip(dateArray[tooltipItem.index], "roi_bars_chart");
                            return "Total " + parseInt(tooltipItem.yLabel * 100) / 100 + "%";
                        }
                    },
                    intersect: false,
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 15,
                        bottom: 20
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
                            min:-maxDistance,
                            max:maxDistance,
                        }
                    }]
                }
            }
        });

    };

    DrawROILine = (canvasId, balancePoints, masterId, displaying_days = 0) => {
        let dataArray = [];
        let ROILabels = [];

        const roiRatioCalculator = new ROI_RatioCalculator(balancePoints);
        let ratioRoiModelArray = roiRatioCalculator.CalculateRatioModel();
        let ROIPoints = roiRatioCalculator.GetRatioRoiPoints();

        ratioRoiModelArray.forEach((ratioModelPoint, index, array) => {
            // let info = " ROI:" + ratioModelPoint.ROI() + " | ratioProfit:" + ratioModelPoint.ratioProfit + " | ratioDep:" + ratioModelPoint.ratioDep;
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

        //-------- Draw dates ---------
        let startDate = date_handler.FormatDMY(ratioRoiModelArray[0].date);
        let lastDate = date_handler.FormatDMY(balancePoints[ratioRoiModelArray.length-1].date);

        document.querySelector('[balance-line-date-1]').innerHTML = startDate;
        document.querySelector('[balance-line-date-2]').innerHTML = lastDate;

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
                responsive: true,
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
                        bottom: 20
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
                        }
                    }]
                }
            }
        });

    }


    DrawROILine_BTC = (canvasId, balancePoints, masterId, displaying_days = 0) => {
        let dataArray = [];

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

            let cumulativeTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay_InBTC(masterEmail, currentPoint.date, startROIBalancePoint.date);
            let pointBalanceDelta = currentPoint.btc_balance - startROIBalancePoint.btc_balance;

            let pointBalanceRoi = ((pointBalanceDelta - cumulativeTransfer) / startROIBalancePoint.btc_balance) * 100; //TODO include transfers
            ROILabels.push("")
            ROIPoints.push(pointBalanceRoi);

            let logData = {
                startDate: startROIBalancePoint.date,
                currentDate: currentPoint.date,
                startBalance: startROIBalancePoint.btc_balance,
                currentBalance: currentPoint.btc_balance,
                totalTransfer: cumulativeTransfer,
                deltaBalance: pointBalanceDelta,
                totalProfit: pointBalanceDelta - cumulativeTransfer,
                roi:pointBalanceRoi
            }

            console.log(logData);
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

        //-------- Draw dates ---------
        let startDate = date_handler.FormatDMY(balancePoints[0].date);
        let lastDate = date_handler.FormatDMY(balancePoints[balancePoints.length-1].date);

        document.querySelector('[balance-line-date-1]').innerHTML = startDate;
        document.querySelector('[balance-line-date-2]').innerHTML = lastDate;

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
                responsive: true,
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
                        bottom: 20
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

    /**
     * @param {Deal} initialDeal
     */

    /**
     *@param {MasterStatistic} statisticModel
     */
    DisplayStatistics = (statisticModel) => {

        let baseAsset = statisticModel.baseAsset;

        document.querySelector('[start_deposit]').innerHTML =  statisticModel.StartDeposit() + " " + statisticModel.baseAsset;
        document.querySelector('[total_transfer]').innerHTML = statisticModel.TotalTransfer() + " " + statisticModel.baseAsset;
        document.querySelector('[total_deposit]').innerHTML = statisticModel.TotalDeposit() + " " + statisticModel.baseAsset;
        document.querySelector('[current_balance]').innerHTML = statisticModel.CurrentBalance() + " " + statisticModel.baseAsset;


        document.querySelector('[total_profit]').innerHTML = statisticModel.roiIndicator.Profit() + " " + baseAsset;
        document.querySelector('[total_roi]').innerHTML = statisticModel.roiIndicator.ROI() + "%";



        document.querySelector('[total_profit]').classList.add("badge")
        document.querySelector('[total_roi]').classList.add("badge")

        if(statisticModel.roiIndicator.ROI() > 0){

            if(this.master_base_asset == "USDT"){
                document.querySelector('[total_roi]').classList.add("badge-soft-success")
            } else if (this.master_base_asset){
                document.querySelector('[total_roi]').classList.add("badge-soft-warning")
            }

        } else {
            document.querySelector('[total_roi]').classList.add("badge-soft-danger")
        }

        if(statisticModel.roiIndicator.Profit() > 0){

            if(this.master_base_asset == "USDT"){
                document.querySelector('[total_profit]').classList.add("badge-soft-success")
            } else if (this.master_base_asset){
                document.querySelector('[total_profit]').classList.add("badge-soft-warning")
            }

        } else {
            document.querySelector('[total_profit]').classList.add("badge-soft-danger")
        }
    }




    DrawDateTooltip = (datePoint, canvasId) => {
        this.dateElement.innerHTML = datePoint;
        this.dateElement.style.display = "";
        document.getElementById(canvasId).parentElement.appendChild(this.dateElement)
    }

    HideDateTooltip = () => {
        this.dateElement.style.display = 'none';
    }
}


GetMasterIDFromURL = () => {
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString)
    return urlParams.get('master-id');
}

const masterBalanceHistoryLoader = new MasterBalanceHistoryLoader(GetMasterIDFromURL());

document.addEventListener("DOMContentLoaded", () => {
    masterBalanceHistoryLoader.DrawBalances();
})

