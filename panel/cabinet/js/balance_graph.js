console.log();

function DrawBalanceGraphKucoin() {
    // Line chart
    console.log("Getting history balance...");
    fetch('https://cunion.io/panel/copy_server_api/kucoin/get_kucoin_balance_history.php', {
        method: 'GET',
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log("Balance History Response:", data);
        // balance.ComposeHistoryBalance(data);
        balance.kucoinBalanceHistory = data.kucoin_balance_history;
        ApplyBalanceGraphChartJS(balance.kucoinBalanceHistory);
    });
}


function DrawFullBalanceGraphKucoin() {
    console.log("Getting history balance...");
    fetch('https://cunion.io/panel/copy_server_api/kucoin/get_user_kucoin_balance_history.php', {
        method: 'GET',
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log("Balance History Response:", data);
        // balance.ComposeHistoryBalance(data);
        balance.kucoinBalanceHistory = data.full_kucoin_balance_history;
        ApplyFullBalanceGraphKucoinChartJS(balance.kucoinBalanceHistory);
    });
}

function DrawBalanceHistoryGraphBinance() {
    // Line chart
    console.log("Getting history balance...");
    fetch('https://cunion.io/panel/cabinet/php_scripts/get_balance_state.php', {
        method: 'GET',
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log("Balance History Response:", data);
        balance.ComposeHistoryBalance(data);
        ApplyBalanceGraphChartJS(balance.history);
    });
}

function ApplyBalanceGraphChartJS(balanceHistory) {

    let dateLabels = [];
    let balancePoints = [];

    //Add the latest actual point into the balance array
    if (balanceHistory.length > 1) {
        let dateString = GetFormatedDataFromDate(new Date())

        // let currentPoint = {date: dateString, balance: parseInt(compoz_balance * 1000) / 1000};
        // balanceHistory.splice(0, 0, currentPoint);

        balanceHistory.forEach((historyPoint, index, array) => {
            const arrayLength = array.length;
            if (index < arrayLength - 1 && arrayLength > 1) {
                dateLabels.push(GetDayLabelFromDate(historyPoint.date));
                if (historyPoint.balance !== 0) {
                    balancePoints.push(historyPoint.balance);
                }
                let balanceTable = document.querySelector("#balance_hitory_table");
                let trTemplate = document.querySelector("#balance_hitory_table > tbody > tr[balance-history-tr-template]");

                balanceTable.style.display = "inline-table";


                let newTr = trTemplate.cloneNode(true);
                newTr.querySelector("[date]").innerHTML = GetFormatedDataFromDate(new Date(historyPoint.date));
                newTr.querySelector("[balance]").innerHTML = "$" + historyPoint.balance;

                let ROI = 0;
                let dif = historyPoint.balance - balanceHistory[index + 1].balance;
                ROI = dif / (balanceHistory[index + 1].balance / 100);
                if (ROI > 0) {
                    newTr.querySelector("[roi]").innerHTML = "+" + Math.round(ROI * 100) / 100 + "%"
                }
                if (ROI < 0) {
                    newTr.querySelector("[roi]").innerHTML = Math.round(ROI * 100) / 100 + "%"
                    newTr.querySelector("[roi]").classList.remove("text-success");
                    newTr.querySelector("[roi]").classList.add("text-danger");
                }
                if (ROI === 0) {
                    newTr.querySelector("[roi]").innerHTML = 0 + "%"
                    newTr.querySelector("[roi]").classList.remove("text-success");
                    newTr.querySelector("[roi]").classList.add("text-warning");
                }

                newTr.style.display = "";
                balanceTable.querySelector("tbody").appendChild(newTr);
            }
        });
    } else {
        document.querySelector("#roi_table_p1").style.display = ''
        document.querySelector("#roi_table_p2").style.display = ''
    }

    new Chart(document.getElementById("chartjs-line"), {
        type: "line",
        data: {
            labels: dateLabels.reverse(),
            datasets: [{
                label: "USDT ($)",
                fill: false,
                backgroundColor: "#4bbf73",
                borderColor: '#4bbf73',
                data: balancePoints.reverse()
            }]
        },
        options: {
            responsive:true,
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
                        display:false,
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

function ApplyFullBalanceGraphKucoinChartJS(balanceHistory) {
    let balancePoints = [];
    let labels = [];

    balanceHistory.forEach((balancePoint) => {
        balancePoints.push(balancePoint.balance);
        let formatDate = GetDayLabelFromDate(balancePoint.date)
        labels.push(formatDate);
    })

    // balancePoints.push(parseInt(compoz_balance * 1000) / 1000);
    // labels.push(GetDayLabelFromDate(new Date()));

    new Chart(document.getElementById("kucoin-full-balance-history-canvas-line-chart"), {
        type: "line",
        data: {
            labels: labels,
            datasets: [{
                label: "USDT($)",
                fill: false,
                backgroundColor: "#4bbf73",
                borderColor: "#4bbf73",
                data: balancePoints
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

function GetDayLabelFromDate(date) {
    let currentDate = new Date(date);
    let dayOfWeek = currentDate.getDay();
    let dayOfMonth = currentDate.getUTCDate();
    let month = currentDate.getMonth() + 1;
    let dayLabel = "";

    switch (dayOfWeek) {
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
    let fullLabel = (month < 10 ? "0" + month : month) + "/" + (dayOfMonth < 10 ? "0" + dayOfMonth : dayOfMonth);


    return fullLabel;
}


function GetFormatedDataFromDate(date) {
    return date.getFullYear() + "-" +
        (date.getMonth() >= 9 ? (date.getMonth() + 1) : "0" + (date.getMonth() + 1)) + "-" +
        (date.getDate() >= 10 ? date.getDate() : "0" + date.getDate()) + " " +
        (date.getHours() >= 10 ? date.getHours() : "0" + date.getHours()) + ":" +
        (date.getMinutes() >= 10 ? date.getMinutes() : "0" + date.getMinutes()) + ":" +
        (date.getSeconds() >= 10 ? date.getSeconds() : "0" + date.getSeconds());
}

