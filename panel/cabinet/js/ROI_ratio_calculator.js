class ROI_RatioModel {
    ratioProfit;
    ratioDep;
    date;

    constructor(profit, dep, date) {
        this.ratioProfit = profit;
        this.ratioDep = dep;
        this.roi = this.ROI();
        this.date = date;
    }

    ROI(){
        return this.ratioProfit/this.ratioDep*100;
    }

}


class ROI_RatioCalculator{

    balancePoints = [];
    masterEmail;
    ratioModelPoints = [];

    constructor(initial_balance_points) {
        this.balancePoints = initial_balance_points;
        this.masterEmail = this.balancePoints[0].user_email;
    }

    CalculateRatioModel(x_days = 0){
        let ratioModelArray = [];

        let currentRatioProfit = 0;
        let currentRatioDep = parseFloat(this.balancePoints[0].balance);
        let newRatioModelPoint = new ROI_RatioModel(currentRatioProfit, currentRatioDep, this.balancePoints[0].date)
        ratioModelArray.push(newRatioModelPoint);

        for(let i=1; i<this.balancePoints.length; i++){
            let dateFrom = this.balancePoints[i].date;
            let dateTo = this.balancePoints[i-1].date;
            let cumulativeTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay(this.masterEmail, dateFrom, dateTo);

            if(cumulativeTransfer == 0){
                currentRatioProfit += parseFloat(this.balancePoints[i].balance) - parseFloat(this.balancePoints[i-1].balance)
                // currentRatioProfit = parseFloat(this.balancePoints[i].balance) - currentRatioDep;

            } else {

                let profitRatioMultiplier = currentRatioProfit / this.balancePoints[i-1].balance;
                let depRatioMultiplier = currentRatioDep / this.balancePoints[i-1].balance;

                currentRatioProfit = currentRatioProfit + cumulativeTransfer * profitRatioMultiplier
                currentRatioDep =  currentRatioDep + cumulativeTransfer * depRatioMultiplier;

                let realDalyProfit = parseFloat(this.balancePoints[i].balance) - parseFloat(this.balancePoints[i-1].balance) - cumulativeTransfer;

                currentRatioProfit = currentRatioProfit + realDalyProfit;
            }


            newRatioModelPoint = new ROI_RatioModel(currentRatioProfit, currentRatioDep, this.balancePoints[i].date);
            ratioModelArray.push(newRatioModelPoint);

        }

        this.ratioModelPoints = ratioModelArray;
        return ratioModelArray;
    }

    GetRatioRoiPoints = () => {
        let roiPoints = [];
        for(let i=0; i<this.ratioModelPoints.length; i++){
            roiPoints.push(this.ratioModelPoints[i].ROI());
        }
        return roiPoints;
    }

    GetTotalRoi(){
        return this.ratioModelPoints[this.ratioModelPoints.length-1].ROI();
    }
}