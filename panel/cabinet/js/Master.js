class Master{

    masterId;
    masterEmail;
    balancePoints;
    DOM_TR_Element

    constructor(masterId, masterEmail = undefined) {
        this.masterId = masterId;
        this.balancePoints = masterBalanceHistoryLoader.masters[this.masterId];
        this.DOM_TR_Element = this.GetDom_TRElement();
    }


    Select = () => {
        this.TransformTableElement();
        this.DrawInfo();
    }


    TransformTableElement = () => {
        document.querySelectorAll('[master-template-tr][master-id]').forEach((element) => {
            element.classList.remove("selected");
        })
        this.DOM_TR_Element.classList.add("selected");
    }

    DrawInfo = () => {
        this.DrawPortfolioPopup();
        this.DrawBalances();
        this.DrawStatistics();
    }

    DrawPortfolioPopup = () => {
        // DrawMAsterPopup MakeDisplay true;
        // masterPopup -> appendToMasterTRBLock
    //    master_popup

    }

    DrawBalances = () => {
        //TODO rewrite DrawRoiLine refactor;
        masterBalanceHistoryLoader.DrawROILine("master-roi-week-" + this.masterId,  this.balancePoints, this.masterId, 7)
        masterBalanceHistoryLoader.DrawROILine("master-roi-month-" + this.masterId,  this.balancePoints, this.masterId, 30)
        masterBalanceHistoryLoader.DrawROILine("master-roi-3-month-" + this.masterId,  this.balancePoints, this.masterId, 90)
    }

    DrawStatistics = () => {
        // new MasterStatistic(startDeposit, totalTransfer, currentBalance, this.masterBalancesHistory)
    }


    GetDom_TRElement(masterId){
        return document.querySelector(['[master-template-tr][master-id="'+ this.masterId +'"]']) // TODO
    }
}


document.addEventListener("DOMContentLoaded", ()=>{
    console.log("admin show info event add");
    if(user.email == 'Wyde90@gmail.com'){
    }
})
