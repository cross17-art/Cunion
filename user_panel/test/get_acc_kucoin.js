//  const fetch = require("node-fetch");
// const crypto = require('crypto')

// const config = {
//     apiKey: '6113a931e895f300069b5a2d',
//     secretKey: '1e331894-5968-4e59-9ad7-d3b140ca4cb6',
//     passphrase: 'zxcvb24081963',
//     environment: 'live',
//
// }
var user_account = null;
var USDT_balance = 0.0;
var compoz_balance = 0.0;
var orders_balance = 0.0;

async function getAccounts() {
///142.93.212.88

    var text = {
        email: user.email
        // email: "h77ps@protonmail.com",
    }
    let cryptodata = '';
    cryptodata = await fetch("http://142.93.212.88:953", {
        method: "POST",

        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: JSON.stringify(text),

    }).then((response) => {
        // return response.json();
        return response.json();
    }).then((data) => {
        //cryptodata=data;
        return data;
    }).catch((err) => {
        console.log(err)
    })

    user_account = cryptodata;
    DisplayTickers();


    user_account.balance.data.forEach(function (data) {
        if (data.currency!='USDT') {
            var prise_sell =parseFloat(getTickerByName(data.currency));
            if(prise_sell!=undefined){
                compoz_balance+=parseFloat(data.balance)*prise_sell;
                orders_balance+=parseFloat(data.holds)*prise_sell;
            }



        }
        else if(data.currency=='USDT'){
            USDT_balance+=parseFloat(data.available);
            orders_balance+=parseFloat(data.holds);
            compoz_balance+=parseFloat(data.balance);
        }

    })
    DrawUSDTBalance(compoz_balance,USDT_balance,orders_balance);

}



function getTickerByName(name) {
    name += "-USDT";
    let tickerSell;
    user_account.allTickers.data.ticker.find(function (ticker) {
        if (ticker.symbolName === name) {
            tickerSell = ticker.sell;
            return 0;
        }
    })
    return tickerSell;
}


function DrawUSDTBalance(Total,Available,Orders) {
    document.getElementById('validation-balance-spinner').style.display='none'
    document.querySelector(".validation-balance-block").style.display = "inline-block";
    document.querySelector("#available_total_balance").innerHTML = "$" + Math.round(Total * 100) / 100;
    document.querySelector("#available_usdt_balance").innerHTML = "$" + Math.round(USDT_balance * 100) / 100;
    document.querySelector("#in_orders_usdt_balance").innerHTML = "$" + Math.round(Orders * 100) / 100;

}





