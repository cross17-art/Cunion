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
var money;
// getKucoinAccount();
async function getKucoinAccount() {
///142.93.212.88

    var text = {
        email: user.email
    }
    let cryptodata = '';
    cryptodata = await fetch("https://cunion.io:8000/getAccount", {
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
    
    if(user_account.code==='all right') {
        console.log("we get all tickers");
        user_account.balance.balance_USDT = null;
        let msg = [];
        compoz_balance = 0;
        orders_balance = 0;
        USDT_balance = 0;
        console.log()
        user_account.balance.data.forEach(function (data) {
            if (data.currency != 'USDT') {
                var prise_sell = parseFloat(getTickerByName(data.currency));
                if (!(isNaN(prise_sell))) {
                    compoz_balance += parseFloat(data.balance) * prise_sell;
                    orders_balance += parseFloat(data.holds) * prise_sell;
                    msg.push({
                        'total': (parseFloat(data.balance) * prise_sell),
                        'orders': (parseFloat(data.holds) * prise_sell),
                        'available': (parseFloat(data.available) * prise_sell),
                        'ticker': data.currency
                    });
                } else {
                    // console.log("nan", data)
                    //console.log("nan")
                }
            } else if (data.currency == 'USDT') {
                USDT_balance += parseFloat(data.available);
                orders_balance += parseFloat(data.holds);
                compoz_balance += parseFloat(data.balance);
                msg.push({
                    'total': Math.round((parseFloat(data.balance)) * 100) / 100,
                    'orders': Math.round((parseFloat(data.holds)) * 100) / 100,
                    'available': Math.round((parseFloat(data.available)) * 100) / 100,
                    'ticker': data.currency
                });
            }
        })
        user_account.balance.balance_USDT = {
            'msg': msg
        }


        DrawUSDTBalance(compoz_balance, USDT_balance, orders_balance);

        if (GetPageName() === "cabinet_accounts") {
            DisplayTickers();
        }

    }else{
        console.log(user_account.code)
    }
}




window.addEventListener('DOMContentLoaded',function (){
    if (GetPageName() === "cabinet_accounts" && user.connected) {
        setInterval(function () {
            getKucoinAccount();
        }, 10000)
    }
})


function getTickerByName(name) {
    name += "-USDT";
    let tickerSell;
    user_account.allTickers.find(function (ticker) {
        if (ticker.symbol === name) {
            tickerSell = ticker.sell;
            return 0;
        }
    })

    return tickerSell;
}


function DrawUSDTBalance(Total, Available, Orders) {
    if(GetPageName()==="cabinet_accounts") {
    let spiner = document.querySelectorAll('#validation-balance-spinner')
    document.querySelector(".validation-balance-block").style.display = "inline-block";
    spiner[0].style.display='none'
    spiner[1].style.display='none'
    spiner[2].style.display='none'
    spiner[3].style.display='none'



        document.querySelector("#available_total_balance1").style.display = 'block';
        document.querySelector("#available_usdt_balance1").style.display = 'block';
        document.querySelector("#in_orders_usdt_balance1").style.display = 'block';

        document.querySelector("#available_total_balance1").innerHTML = "$" + Math.round(Total * 100) / 100;
        document.querySelector("#available_usdt_balance1").innerHTML = "$" + Math.round(USDT_balance * 100) / 100;
        document.querySelector("#in_orders_usdt_balance1").innerHTML = "$" + Math.round(Orders * 100) / 100;
    }
    else {
        document.querySelector(".validation-balance-block").style.display = "inline-block";
        document.querySelector('#validation-balance-spinner').style.display='none';
    }


    document.querySelector("#available_total_balance").innerHTML = "$" + Math.round(Total * 100) / 100;
    document.querySelector("#available_usdt_balance").innerHTML = "$" + Math.round(USDT_balance * 100) / 100;
    document.querySelector("#in_orders_usdt_balance").innerHTML = "$" + Math.round(Orders * 100) / 100;
}




