MasterBalanceCashLoader = class {
    masters_portfolio = [];

    Init = async () => {
        this.masters_portfolio = await this.LoadAllMastersPortfolio();
        this.DisplayPiePortfolio();
    };

    LoadAllMastersPortfolio = async () => {
        let url = "https://cunion.io/panel/copy_server_api/kucoin/get_kucoin_masters_portfolio.php"; // TODO
        let result = await fetch(url).then((rsp) => {
            return rsp.json()
        }).then((data) => {
            console.log("Portfolio:" + data);
            return data.masters_portfolio;
        }).catch((err) => {
            console.log("LoadAllMastersPortfolio", err)
        });

        return this.ComposeMastersPortfolios(result);
    };

    ComposeMastersPortfolios = (result) => {

        let portfolios = [];
        result.forEach((record) => {
            if (portfolios[record.user_id] === undefined) {
                portfolios[record.user_id] = {
                    email: record.email,
                    assetsState: []
                }
            }
            portfolios[record.user_id].assetsState[record.asset_name] = record.asset_amount;
        });

        return portfolios;
    };

    GetFullPreparedData = (portfolio) => {

        let assetArray = portfolio.assetsState;

        let assetsValues = [];
        let assetsLabels = [];

        Object.entries(assetArray).forEach(([assetName, assetAmount]) => {
            console.log(assetName, assetAmount);
            if (assetName !== "USDT" || 1) {
                let resultName = assetName;
                //Round masters actives portfolio
                // if(assetName.length > 5){
                //     resultName = assetName.slice(0,4) + ".";
                // }
                assetsLabels.push(resultName);
                assetsValues.push(parseInt(assetAmount*100)/100)
            }
        });

        return {
            assetsValues: assetsValues,
            assetsLabels: assetsLabels
        };
    }

    GetPiePreparedData = (portfolio) => {
        let assetArray = portfolio.assetsState;
        let assetsValues = [];
        let otherCoinsInUSDT = 0;

        Object.entries(assetArray).forEach(([assetName, assetAmount]) => {
            if (assetName === "USDT") {
                assetsValues["USDT"] = (parseInt(assetAmount * 100) / 100)
            } else if(assetName === "BTC"){
                assetsValues["BTC"] = (parseInt(assetAmount * 100) / 100)
            } else {
                otherCoinsInUSDT += parseFloat(assetAmount);
            }
        });

        assetsValues['other'] = (parseInt(otherCoinsInUSDT * 100) / 100);

        return assetsValues;
    }


    GetPieExtendedData = (portfolio) => {
        let assetArray = portfolio.assetsState;

        let assetsValues = [];
        let assetsLabels = [];
        let otherCoinsInUSDT = 0;

        let max1 = 0;
        let labelMax1 = "labelMax1";
        let max2 = 0;
        let labelMax2 = "labelMax2";

        if(Object.entries(assetArray)[0][0] === "USDT"){
            if(Object.entries(assetArray).length >= 2){
                labelMax1 = Object.entries(assetArray)[1][0];
                max1 = Object.entries(assetArray)[1][1];
            } else {
                labelMax1 = "";
                max1 = 0;
            }

            if(Object.entries(assetArray).length >=3){
                labelMax2 = Object.entries(assetArray)[2][0];
                max2 = Object.entries(assetArray)[2][1];
            } else {
                labelMax2 = "";
                max2 = 0;
            }

        } else {
            if(Object.entries(assetArray).length >=2){
                labelMax1 = Object.entries(assetArray)[0][0];
                max1 = Object.entries(assetArray)[0][1];
                labelMax2 = Object.entries(assetArray)[1][0];
                max2 = Object.entries(assetArray)[1][1];
            } else {
                labelMax1 = Object.entries(assetArray)[0][0];
                max1 = Object.entries(assetArray)[0][1];
                labelMax2 = ""
                max2 = 0;
            }

        }

        Object.entries(assetArray).forEach(([assetName, assetAmount]) => {
            console.log(assetName, assetAmount);
            // assetsLables.push(assetName);
            // assetsValues.push(assetAmount)
            if (assetName === "USDT") {
                assetsValues.push(parseInt(assetAmount * 100) / 100)
                assetsLabels.push("USDT");
            } else {
                if(assetName !== labelMax1 && assetName !== labelMax2){
                    otherCoinsInUSDT += parseFloat(assetAmount);
                } else {
                    if(assetName == labelMax1) {
                        assetsValues.push(max1);
                        assetsLabels.push(labelMax1);
                    }
                    if(assetName === labelMax2) {
                        assetsValues.push(max2);
                        assetsLabels.push(labelMax2);
                    }
                }
            }
        });

        assetsValues.push(parseInt(otherCoinsInUSDT * 100) / 100);
        assetsLabels.push("Other");

        return {
            assetsValues: assetsValues,
            assetsLabels: assetsLabels
        };
    }

    DisplayPiePortfolio = () => {
        Object.entries(this.masters_portfolio).forEach(([userId, portfolio]) => {
            let assetsValues = [];
            assetsValues = this.GetPiePreparedData(portfolio);
            let masterCanvas = document.querySelector("[chart = master_portfolio][master-id = '" + userId + "']");
            if (masterCanvas !== null) {
                let canvasId = masterCanvas.id;
                this.DrawPortfolioChart(canvasId, assetsValues);
            }
        })
    };

    DrawPortfolioChart(canvasId, assetsValues) {
        // Pie chart
        new Chart(document.getElementById(canvasId), {
            type: "pie",
            data: {
                labels: ["USDT", "BTC", "Other"],
                datasets: [{
                    data: [assetsValues["USDT"],assetsValues["BTC"], assetsValues["other"]],
                    backgroundColor: [
                        'rgba(75,191,115,0.9)',
                        'rgba(234,140,25,0.9)',
                        'rgba(31,155,207,0.9)'
                    ],
                    borderWidth: 1,
                    borderColor: '#293042'
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                cutoutPercentage: 50,
                legend: {
                    display: false
                }
            }
        });
    }
};



const masterBalanceCashLoader = new MasterBalanceCashLoader();
masterBalanceCashLoader.Init();