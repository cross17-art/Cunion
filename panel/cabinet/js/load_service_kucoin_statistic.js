LoadKucoinStatistics = async () => {


    let usersCount = fetch("https://cunion.io/panel/cabinet/php_scripts/get_total_users_statistics.php").then((rsp) => {
        return rsp.json();
    }).then((data) => {
        return data;
    })

    //
    let statistics_result = await fetch('https://cunion.io:2083/', { //TODO rebind the ip to https-front 8001 https://64.227.182.112:2083
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({statistic_request: {}})
    }).then((rsp) => {
        return rsp.json();
    }).then(async (data) => {
        console.log(data)
        let successRate = data.statistics[0].success_rate;

        let totalTrades = data.total_trades[0]["COUNT(*)"];
        let tradesPerDay = data.total_trades_per_day;

        let totalFunds = data.statistics[0].total_funds;
        let funds_30_days = data.statistics[0].funds_30_days;

        let averageDelay = data.statistics[0].average_delay;
        let allDelays = JSON.parse(data.statistics[0].last_delays);

        let users = await usersCount;

        FillTheTrades(totalTrades, tradesPerDay);
        FillTheFunds(totalFunds, funds_30_days);
        FillTheDelays(allDelays, averageDelay);
        FillUsers(users);

        return data;
    })
}


document.addEventListener("DOMContentLoaded", function () {
    LoadKucoinStatistics();
});

function FillTheTrades(totalTrades, tradesPerDay) {
    document.querySelector("[total_trades]").innerHTML = numberWithCommas(totalTrades) + " Trades";
    document.querySelector("[today_total_trades]").innerHTML = "+" + tradesPerDay[0]["COUNT(id)"] + " Trades";
    document.querySelector("[last_day_total_trades]").innerHTML = "+" + tradesPerDay[1]["COUNT(id)"] + " Trades";

}

function FillTheFunds(totalFunds, funds_30_days) {
    document.querySelector("[total_transaction_funds]").innerHTML = "$" + numberWithCommas(parseInt(totalFunds) + 188000);
    document.querySelector("[funds_30_days]").innerHTML = "$" + numberWithCommas(parseInt(funds_30_days));
}


FillTheDelays = (delayArray, averageDelay) => {

    let icon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clock align-middle me-2\" style=\"\n" + "    margin-right: 4px !important; width: 9px; height: 9px; margin-top: -2px;\n" + "\"><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><polyline points=\"12 6 12 12 16 14\"></polyline></svg>"

    document.querySelector("[average_delay]").innerHTML = icon + parseInt(averageDelay) / 1000 + " sec";

    let initialElement = document.querySelector("[delay]");
    // let initialElement2 = document.querySelector("[delay-2]");
    delayArray.forEach((delay, index) => {
        if (index < 3) {
            let delayElem = document.querySelector("[delay]").cloneNode(true);
            delayElem.innerHTML = icon + parseInt(delay) / 1000 + " sec";
            document.querySelector("[delay-1-row]").appendChild(delayElem);
        }
        // if(index >= 3){
        //     let delayElem = document.querySelector("[delay]").cloneNode(true);
        //     delayElem.innerHTML = icon + parseInt(delay)/1000 + " sec";
        //     document.querySelector("[delay-2-row]").appendChild(delayElem);
        // }
    })
    document.querySelector("[delay-1-row]").removeChild(initialElement);
    // document.querySelector("[delay-2-row]").removeChild(initialElement2);

}


function FillUsers(users) {
    document.querySelector("[total_users]").innerHTML = "<i class=\"align-middle me-2 fas fa-fw fa-users\"></i>" + users.total_users ;
    document.querySelector("[traders]").innerHTML = "<i class=\"align-middle me-2 fas fa-fw fa-user-check\" style='margin-left: 5px;'></i>" +  users.masters
    document.querySelector("[investors]").innerHTML = "<i class=\"align-middle me-2 fas fa-fw fa-user-cog\" style='margin-left: 5px;'></i>" + users.followers
}


function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


