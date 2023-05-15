class RoiIndicator{
    title;
    daysPeriod;
    initialBalancePoints;
    masterEmail;

    domElement;
    upperArrowDomElement;
    downArrowDomElement;
    roiDomElement;
    tooltip;

    parentElement;

    profit;
    roi;
    fullState;



    constructor(title, days_period, initial_balance_points, master_email, templateElement = null, toolTip = null) {
        this.title = title;
        this.daysPeriod = days_period;
        this.initialBalancePoints = initial_balance_points;
        this.masterEmail = master_email;
        this.tooltip = toolTip;
        if(templateElement != null){
            this.domElement = templateElement.cloneNode(true);
            this.domElement.style.display = "block";
            this.parentElement = templateElement.parentElement;
        }
    }

    Init(){
        let dayCount = this.daysPeriod;
        let Days = this.initialBalancePoints.slice(0, dayCount+1);
        let day_start = Days[0].balance;
        let date_start = Days[0].date;
        let day_end = Days[Days.length - 1].balance;
        let date_end = Days[Days.length - 1].date;
        let totalTransferSum = transfer_loader.GetSumTransferByMasterEmailFromToDay(this.masterEmail, date_end, date_start);
        let Profit = (day_end - day_start  - totalTransferSum);

        const roi_bar_calculator = new RoiBarCalculator();
        roi_bar_calculator.Init(this.masterEmail, this.initialBalancePoints);
        let cumulativeRoi = roi_bar_calculator.CalculateCumulativeRoiForLastXDays(dayCount);
        let Roi = cumulativeRoi;

        this.profit = Profit;
        this.roi = Roi;

        if(this.domElement != null){
            this.domElement.querySelector('[indicator-tooltip]').innerHTML = this.tooltip;
            this.domElement.querySelector('[indicator-title]').innerHTML = this.title;
        }
    }


    Display(){
        this.domElement.querySelector('[indicator-profit]').innerHTML = this.State();
        if(this.roi >= 0){
            this.domElement.querySelector('[indicator]').classList.add("profitable");
        } else {
            this.domElement.querySelector('[indicator]').classList.add('marginal');
        }
        this.parentElement.appendChild(this.domElement);
    }

    SetAsSortCriteria(){
        this.domElement.querySelector('[indicator-profit]').setAttribute('sort_stat', this.roi);
    }


    Profit(decimals = 100){
        return parseInt(this.profit * decimals) / decimals;
    }

    ROI(decimals = 100){
        return parseInt(this.roi * decimals) / decimals;
    }
    State(){
        return  '<span style="margin-right: 2px;">$</span>' + parseInt(this.ROI() * 10) + " (" + this.ROI() + "%)";
    }
}

class RoiIndicator_BTC{
    title;
    daysPeriod;
    initialBalancePoints;
    masterEmail;


    domElement;
    upperArrowDomElement;
    downArrowDomElement;
    roiDomElement;
    tooltip;

    parentElement;


    profit;
    roi;
    fullState;



    constructor(title, days_period, initial_balance_points, master_email, templateElement, toolTip) {
        this.title = title;
        this.daysPeriod = days_period;
        this.initialBalancePoints = initial_balance_points;
        this.masterEmail = master_email;
        this.tooltip = toolTip;
        if(templateElement != null){
            this.domElement = templateElement.cloneNode(true);
            this.domElement.style.display = "block";
            this.parentElement = templateElement.parentElement;
        }
    }

    Init(){

        let dayCount = this.daysPeriod;
        let Days = this.initialBalancePoints.slice(0, dayCount+1);
        let day_start = Days[0].btc_balance;
        let date_start = Days[0].date;
        let day_end = Days[Days.length - 1].btc_balance;
        let date_end = Days[Days.length - 1].date;
        let totalTransferSum = transfer_loader.GetSumTransferByMasterEmailFromToDay_InBTC(this.masterEmail, date_start, date_end);
        let Profit = (day_start - day_end - totalTransferSum);
        let Roi = (Profit / day_end * 100);

        this.profit = Profit;
        this.roi = Roi;

        if(this.domElement != null){
            this.domElement.querySelector('[indicator-tooltip]').innerHTML = this.tooltip;
            this.domElement.querySelector('[indicator-title]').innerHTML = this.title;
        }
    }


    Display(){
        this.domElement.querySelector('[indicator-profit]').innerHTML = this.State();
        if(this.profit >= 0){
            this.domElement.querySelector('[indicator]').classList.add("profitable");
        } else {
            this.domElement.querySelector('[indicator]').classList.add('marginal');
        }
        this.parentElement.appendChild(this.domElement);
    }

    SetAsSortCriteria(){
        this.domElement.querySelector('[indicator-profit]').setAttribute('sort_stat', this.roi);
    }


    Profit(decimals = 100000){
        return parseInt(this.profit * decimals) / decimals;
    }

    ROI(decimals = 100){
        return parseInt(this.roi * decimals) / decimals;
    }

    ROIPerFixedBTC(decimals = 1000){
        let fixedBTC = 0.1;
        return parseInt(fixedBTC * this.ROI()/100 * decimals)/decimals;
    }

    State(){
        return  '<span style="margin-right: 2px;font-family: \'Poppins\';">₿</span>' + (this.ROIPerFixedBTC(100000) ) + " (" + this.ROI() + "%)";
    }
}