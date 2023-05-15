MasterBalanceCashLoader = class {
    masters_portfolio = [];

    Init = async () => {
        this.masters_portfolio = await this.LoadAllMastersPortfolio();
        this.DisplayPiePortfolio();
    };

    LoadAllMastersPortfolio = async () => {
        let url = "https://cunion.io/client/copy_server_api/kucoin/get_kucoin_masters_portfolio.php"; // TODO
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
            if (assetName !== "USDT") {
                let resultName = assetName;
                if(assetName.length > 5){
                    resultName = assetName.slice(0,4) + ".";
                }
                assetsLabels.push(resultName);
                assetsValues.push(parseFloat(assetAmount*100)/100)
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
            console.log(assetName, assetAmount);
            // assetsLables.push(assetName);
            // assetsValues.push(assetAmount)
            if (assetName === "USDT") {
                assetsValues.push(parseInt(assetAmount * 100) / 100)
            } else {

                otherCoinsInUSDT += parseFloat(assetAmount);
            }
        });

        assetsValues.push(parseInt(otherCoinsInUSDT * 100) / 100);

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
            labelMax1 = Object.entries(assetArray)[1][0];
            max1 = Object.entries(assetArray)[1][1];
            labelMax2 = Object.entries(assetArray)[2][0];
            max2 = Object.entries(assetArray)[2][1];
        } else {
            labelMax1 = Object.entries(assetArray)[0][0];
            max1 = Object.entries(assetArray)[0][1];
            labelMax2 = Object.entries(assetArray)[1][0];
            max2 = Object.entries(assetArray)[1][1];
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
            console.log(userId, portfolio);
            let userEmail = portfolio.email;

            let assetsLables = ["USDT", "Other"];
            let assetsValues = [];
            assetsValues = this.GetPiePreparedData(portfolio);

            let inUSDT = 0;
            let otherCoinsInUSDT = 0;

            console.log(userId, userEmail, inUSDT, otherCoinsInUSDT)
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
                labels: ["USDT", "Other"],
                datasets: [{
                    data: assetsValues,
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        // window.theme.danger,
                        // "#E8EAED"
                    ],
                    borderWidth: 1,
                    borderColor: window.theme.white
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