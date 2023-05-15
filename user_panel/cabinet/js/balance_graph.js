

function DrawBalanceGraphKucoin(){
    // Line chart
    console.log("Getting history balance...");
    fetch('https://cunion.io/client/copy_server_api/kucoin/get_kucoin_balance_history.php', {
        method: 'GET',
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log("Balance History Response:", data);
        // balance.ComposeHistoryBalance(data);
        balance.kucoinBalanceHistory = data.kucoin_balance_history;
        ApplyBalanceGraphChartJS(balance.kucoinBalanceHistory );
    });
}


function DrawBalanceHistoryGraphBinance(){
        // Line chart
    console.log("Getting history balance...");
    fetch('https://cunion.io/client/cabinet/php_scripts/get_balance_state.php', {
        method: 'GET',
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log("Balance History Response:", data);
        balance.ComposeHistoryBalance(data);
        ApplyBalanceGraphChartJS(balance.history);
    });
}

function ApplyBalanceGraphChartJS(balanceHistory){

    let dateLabels = [];
    let balancePoints = [];

    balanceHistory.forEach((historyPoint, index, array) => {
        const arrayLength = array.length;
        if(index < arrayLength - 1 && arrayLength > 1){
            dateLabels.push(GetDayLabelFromDate(historyPoint.date));
            balancePoints.push(historyPoint.balance);

            let balanceTable = document.querySelector("#balance_hitory_table");
            let trTemplate = document.querySelector("#balance_hitory_table > tbody > tr[balance-history-tr-template]");

            balanceTable.style.display = "inline-table";


            let newTr = trTemplate.cloneNode(true);
            newTr.querySelector("[date]").innerHTML = historyPoint.date;
            newTr.querySelector("[balance]").innerHTML = "$" + historyPoint.balance;

            let ROI = 0;
                let dif = historyPoint.balance - balanceHistory[index+1].balance;
                ROI = dif/(balanceHistory[index+1].balance/100);
                if(ROI > 0){
                    newTr.querySelector("[roi]").innerHTML = "+" + Math.round(ROI*100)/100 + "%"
                }
                if(ROI < 0){
                    newTr.querySelector("[roi]").innerHTML = Math.round(ROI*100)/100 + "%"
                    newTr.querySelector("[roi]").classList.remove("text-success");
                    newTr.querySelector("[roi]").classList.add("text-danger");
                }
                if(ROI === 0){
                    newTr.querySelector("[roi]").innerHTML = 0 + "%"
                    newTr.querySelector("[roi]").classList.remove("text-success");
                    newTr.querySelector("[roi]").classList.add("text-warning");
                }

            newTr.style.display = "";
            balanceTable.querySelector("tbody").appendChild(newTr);
        }
    });




    new Chart(document.getElementById("chartjs-line"), {
        type: "line",
        data: {
            labels: dateLabels.reverse(),
            datasets: [{
                label: "Sales ($)",
                fill: true,
                backgroundColor: "transparent",
                borderColor: window.theme.primary,
                data: balancePoints.reverse()
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                intersect: false
            },
            hover: {
                intersect: true
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [{
                    reverse: true,
                    gridLines: {
                        color: "rgba(0,0,0,0.05)"
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 500
                    },
                    display: true,
                    borderDash: [5, 5],
                    gridLines: {
                        color: "rgba(0,0,0,0)",
                        fontColor: "#fff"
                    }
                }]
            }
        }
    });
}


function GetDayLabelFromDate(date){
    let currentDate = new Date(date);
    let dayOfWeek = currentDate.getDay();
    let dayOfMonth = currentDate.getUTCDate();
    let month = currentDate.getMonth() + 1;
    let dayLabel = "";

    switch (dayOfWeek){
        case 1 :
            dayLabel = "Mon";
            break;
        case 2 :
            dayLabel = "Tue";
            break;
        case 3 :
            dayLabel = "Wed";
            break;
        case 4 :
            dayLabel = "Thu";
            break;
        case 5 :
            dayLabel = "Fri";
            break;
        case 6 :
            dayLabel = "Sat";
            break;
        case 0 :
            dayLabel = "Sun";
            break;

    }

    let fullLabel = dayLabel + " " + dayOfMonth + "/" + month;

    return fullLabel;
}


