

LoadKucoinStatistics = async () => {
    let statistics_result = await fetch('http://167.71.227.107:3000/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({statistic_request: {}})
    }).then((rsp) => {
        return rsp.json();
    }).then((data) => {
        console.log(data)
        let totalTrades = data.total_trades[0]["COUNT(*)"];
        let averageDelay = data.statistics[0].average_delay;
        let successRate = data.statistics[0].success_rate;

        document.querySelector("#total_trades").innerHTML = totalTrades + " trades";
        document.querySelector("#success_rate").innerHTML = `${parseInt(successRate * 100) / 100}%`;
        document.querySelector("#average_delay").innerHTML = parseInt(averageDelay)/1000 + " sec";
        return data;
    })
}


document.addEventListener("DOMContentLoaded", function (){
    LoadKucoinStatistics();
});