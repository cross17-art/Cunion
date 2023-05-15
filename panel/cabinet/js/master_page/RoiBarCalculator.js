class RoiBarCalculator {

    masterEmail;

    balancePoints = [];
    roiBars = []
    roiBarsModel = [];
    cumulativeRoiPoints = [];

    constructor() {

    }

    Init(master_email, balance_points){
        this.masterEmail = master_email;
        this.balancePoints = balance_points;
    }

    CalculateRoiBars(){
        let roiBars = [];

        for(var i=1; i<this.balancePoints.length; i++){

            let dayCumulativeTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay(this.masterEmail, this.balancePoints[i].date, this.balancePoints[i-1].date);

            let dateStart = this.balancePoints[i-1].date;
            let dateEnd = this.balancePoints[i].date;
            let dayStartBalance = parseFloat(this.balancePoints[i-1].balance);
            let dayEndBalance = parseFloat(this.balancePoints[i].balance);

            let dailyProfit = dayEndBalance - dayStartBalance - dayCumulativeTransfer;
            let dailyRoi = dailyProfit / (dayStartBalance + dayCumulativeTransfer) * 100;
            roiBars.push(dailyRoi);
        }

        this.roiBars = roiBars;
        return roiBars;
    }


    CalculateRoiBars_Model(){ //return array of roiBars Models
        let roiBarsModel = [];

        for(var i=1; i<this.balancePoints.length; i++){

            let cumulativeTransfer = transfer_loader.GetSumTransferByMasterEmailFromToDay(this.masterEmail, this.balancePoints[i].date, this.balancePoints[i-1].date);
            let dateFrom = this.balancePoints[i-1].date;
            let dateTo = this.balancePoints[i].date;
            let startBalance = parseFloat(this.balancePoints[i-1].balance);
            let endBalance = parseFloat(this.balancePoints[i].balance);
            let profit = endBalance - startBalance - cumulativeTransfer;
            let roi = profit / (startBalance + cumulativeTransfer) * 100;

            let newRoiBarModel = new RoiBarModel(dateFrom, dateTo, startBalance, endBalance, cumulativeTransfer, profit, roi)
            roiBarsModel.push(newRoiBarModel);
        }

        this.roiBarsModel = roiBarsModel;
        return roiBarsModel;
    }


    CalculateCumulativeRoiPoints(){

        let cumulativeRoiPoints = [];
        let roiSum = 0;

        if(this.roiBars.length == 0){
            this.CalculateRoiBars();
        }

        for (let i=0; i<this.roiBars.length; i++){
            roiSum += this.roiBars[i];
            cumulativeRoiPoints.push(roiSum);
        }

        this.cumulativeRoiPoints = cumulativeRoiPoints;
        return cumulativeRoiPoints;
    }

    CalculateCumulativeRoiForLastXDays(last_x_day){
        let roiSum = 0;

        if(this.roiBars.length == 0){
            this.CalculateRoiBars();
        }

        let roiStartIndex = last_x_day >= this.roiBars.length ? 0 : this.roiBars.length - last_x_day -1; // -1 need because today day is in the game

        for (let i=roiStartIndex; i<this.roiBars.length; i++){
            roiSum += this.roiBars[i];
        }

        return roiSum;
    }
}


class RoiBarModel{

    dateFrom;
    dateTo;
    startBalance;
    endBalance;
    cumulativeTransfer;
    roi;
    profit;

    constructor(date_from, date_to, start_balance, end_balance, cumulative_transfer, profit, roi) {
        this.dateFrom = date_from;
        this.dateTo = date_to;
        this.startBalance = start_balance;
        this.endBalance = end_balance;
        this.cumulativeTransfer = cumulative_transfer;
        this.profit = profit;
        this.roi = roi;
    }
}

