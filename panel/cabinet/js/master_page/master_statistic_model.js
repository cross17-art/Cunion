class MasterStatistic{

    startDeposit;
    totalTransfer;
    totalDeposit;
    currentBalance;

    totalProfit;
    totalRoi;
    roiIndicator;
    baseAsset;
    masterEmail;

    constructor(_startDeposit, _totalTransfer,  _currentBalance, balancePoints) {

        this.masterEmail = balancePoints[0].user_email;
        let baseAsset = balancePoints[0].master_base_asset;
        this.baseAsset = balancePoints[0].master_base_asset;

        //TODO is to provide different calculation for BTC and USDT traders
        //TODO need to calculate base parameters based on balance Points insteaad of sd tf cb

        this.startDeposit = parseFloat(_startDeposit);
        this.totalTransfer = parseFloat(_totalTransfer);
        this.currentBalance = parseFloat(_currentBalance);



        let date_from = balancePoints[balancePoints.length-1].date;
        let date_to = balancePoints[0].date

        if(baseAsset == "USDT"){
            this.startDeposit = parseFloat(balancePoints[0].balance);
            this.totalTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay(this.masterEmail, date_from, date_to)
            this.currentBalance = parseFloat(balancePoints[balancePoints.length-1].balance);
            this.roiIndicator = new RoiIndicator('', balancePoints.length, balancePoints, this.masterEmail);

        } else if (baseAsset == "BTC"){
            this.startDeposit = parseFloat(balancePoints[0].btc_balance);
            this.currentBalance = parseFloat(balancePoints[balancePoints.length-1].btc_balance);
            this.totalTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay_InBTC(this.masterEmail, date_from, date_to)
            this.roiIndicator = new RoiIndicator_BTC('', balancePoints.length, balancePoints, this.masterEmail);
        }
        this.totalDeposit = this.startDeposit + this.totalTransfer;
        this.roiIndicator.Init();

        const roiRatioCalculator = new ROI_RatioCalculator(balancePoints);
        roiRatioCalculator.CalculateRatioModel();

        this.roiIndicator.roi = roiRatioCalculator.GetTotalRoi();

    }


    StartDeposit = () => {
        let decimals;
        if(this.baseAsset === "USDT"){
            decimals = 100;
        } else if (this.baseAsset === "BTC"){
            decimals = 100000;
        }
        return parseInt(this.startDeposit * decimals)/decimals;
    }

    TotalTransfer = () => {
        let decimals;
        if(this.baseAsset === "USDT"){
            decimals = 100;
        } else if (this.baseAsset === "BTC"){
            decimals = 100000;
        }

        return parseInt(this.totalTransfer * decimals)/decimals;
    }


    TotalDeposit = () => {
        let decimals;
        if(this.baseAsset === "USDT"){
            decimals = 100;
        } else if (this.baseAsset === "BTC"){
            decimals = 100000;
        }

        return parseInt(this.totalDeposit * decimals)/decimals;
    }


    CurrentBalance = () => {
        let decimals;
        if(this.baseAsset === "USDT"){
            decimals = 100;
        } else if (this.baseAsset === "BTC"){
            decimals = 100000;
        }

        return parseInt(this.currentBalance * decimals)/decimals;
    }

}