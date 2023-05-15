class MasterPopup {

    popupElement;

    canvasBarsBlank;
    canvasPieBlank;

    timer;

    constructor() {
        this.popupElement = document.querySelector("div[master-popup]");

        this.canvasBarsBlank = '<canvas id="popup-bars-canvas" style="width: 100%; height: 100%"> </canvas>';
        this.canvasPieBlank = '<canvas id="popup-pie-canvas" style="width: 70%; height: 70%; margin: 30px auto auto;"> </canvas>';

        this.popupElement.addEventListener("mouseleave", () => {
            this.Hide();
        })


        //On mouse over on pie -> display popup;
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll("[master-template-tr]").forEach((tr_elem) => {
                let masterID = tr_elem.getAttribute("master-id");

                let canvasElement = tr_elem.querySelector("canvas[chart=master_portfolio]")

                canvasElement.addEventListener("mouseover", () => {
                    this.timer = setTimeout(() => {
                        this.Show(masterID)
                    }, 370);
                });

                canvasElement.addEventListener("mouseleave", () => {
                    clearTimeout(this.timer);
                });
                
            })
        })
    }

    Show = (masterId) => {

        //PopupTemplate -> display

        let master_TR_Element = document.querySelector("tr[master-template-tr][master-id='" + masterId + "']");
        let rect = master_TR_Element.getBoundingClientRect();
        let tr_left = rect.left;
        let tr_top = rect.top + window.scrollY;

        this.popupElement.style.display = "block";
        setTimeout(()=>{
            this.popupElement.style.opacity = "1";
        },100)

        this.popupElement.style.left = tr_left + 40 + "px";
        this.popupElement.style.top = tr_top - 50 + "px"


        //Create Canvas for bars graph

        //Create Canvas for pie graph

        //Draw portfolios
        let masterPortfolio = this.GetMasterPortfolioById(masterId);
        let pieData = masterBalanceCashLoader.GetPieExtendedData(masterPortfolio.portfolio);
        let fullData = masterBalanceCashLoader.GetFullPreparedData(masterPortfolio.portfolio);

        //DrawBars

        this.RefreshCanvases();
        this.DrawFullPortfolio('popup-bars-canvas', fullData.assetsValues, fullData.assetsLabels);
        this.DrawExtendedPiePortfolio('popup-pie-canvas', pieData.assetsValues, pieData.assetsLabels);

        //Set onclick Action on popup

    }

    Hide = () => {
        this.popupElement.style.opacity = 0;
        setTimeout(()=>{
            this.popupElement.style.display = "none";
        },300)

    }

    GetMasterPortfolioById(masterId) {
        let portfolio = Object.entries(masterBalanceCashLoader.masters_portfolio).find(([master_id, portfolio]) => {
            if (master_id === masterId) {
                return 1;
            }
        })

        return {
            master_id: portfolio[0],
            portfolio: portfolio[1]
        }
    }

    RefreshCanvases = () => {
        this.popupElement.querySelector("[popup-bars-chart]").innerHTML = this.canvasBarsBlank;
        this.popupElement.querySelector("[popup-pie-chart]").innerHTML = this.canvasPieBlank;

    }

    DrawExtendedPiePortfolio(canvasId, assetsValues, assetLabels) {
        // Pie chart
        new Chart(document.getElementById(canvasId), {
            type: "pie",
            data: {
                labels: ["USDT", "Other"],
                datasets: [{
                    data: assetsValues,
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.danger,
                        "#56e2a3",
                        window.theme.warning,

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

    DrawFullPortfolio(canvasId, assetsValues, assetLabels) {
        // Pie chart

        // Bar chart
        new Chart(document.getElementById(canvasId), {
            type: "bar",
            data: {
                labels: assetLabels,
                datasets: [{
                    label: "Last year",
                    backgroundColor: ComposeColors(assetLabels.length),
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    // hoverBackgroundColor: 'green',
                    // hoverBorderColor: 'red',
                    data: assetsValues,
                    barPercentage: .325,
                    categoryPercentage: .5
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                cornerRadius: 15,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: "black",
                            display: false
                        },
                        ticks:{
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            color: "black"
                        },
                    }]
                }
            }
        });

    }
}

ComposeColors = function (length) {
    let colors = [];
    for (let i = allColors.length; i < length + allColors.length; i++) {
        colors.push(allColors[i % allColors.length])
    }
    return colors;
};

var allColors = ["#3f80ea", "#d9534f", "#4bbf73", "#ec9c13", "#d9534f"];

masterPopup = new MasterPopup();