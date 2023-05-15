var iconUp = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-up align-middle me-2\"><polyline points=\"23 6 13.5 15.5 8.5 10.5 1 18\"></polyline><polyline points=\"17 6 23 6 23 12\"></polyline></svg>";
var iconDown = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-down align-middle me-2\"><polyline points=\"23 18 13.5 8.5 8.5 13.5 1 6\"></polyline><polyline points=\"17 18 23 18 23 12\"></polyline></svg>";
var coinIcon = "<i class=\"align-middle me-2 fas fa-fw fa-coins\"></i>";
var dollarCoin = "<i style=\" margin: 0 !important; padding: 0 !important; width: 10px\" class=\"align-middle me-2 fas fa-fw fa-dollar-sign\"></i>";
var clockIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clock align-middle me-2\"><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><polyline points=\"12 6 12 12 16 14\"></polyline></svg>"

class KucoinCopyHistoryLoader {

    nicknamesArray;

    LoadHistory = async () => {

        console.log("--> Start loading the transactions history ");

        console.log("collecting the history")
        let historyResult = await fetch('https://cunion.io:2083', { //TODO rebind the ip to https-front 8001 https://64.227.182.112:2083
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({history_request: {followerEmail: user.email}})
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("---> History received...");
            return data;
        })

        return await historyResult
    }

    LoadNicknames = async () => {
        let url = "https://cunion.io/panel/cabinet/php_scripts/get_user_nicks_pairs.php";
        this.nicknamesArray = await fetch(url).then((rsp) => {
            return rsp.json();
        }).then((data) =>{
            // console.log('\x1b[36m', "nicknames:", data, '\x1b[0m');
            if(data.status === "success"){
                return data.nicknames;
            } else {
                return null
            }
        }).catch((err) => {
            console.log('x1b[31m', "Some error while getting the nicknames");
            throw err;
        })

        return this.nicknamesArray;
    }

    GetUser = (email) => {
        return this.nicknamesArray.find((userData)=>{
            if(userData.email === email){
                return userData;
            }
        })
    }

    appendTradeAttemptToTable = (table, trade_attempt) => {

        let date = trade_attempt.date;
        let from = trade_attempt.email_from;

        let masterId = -1;
        let masterNickname = "undefined";

        if(this.GetUser(from) !== undefined){
            masterNickname = this.GetUser(from).nickname;
            masterId = this.GetUser(from).id;
        }

        let status = trade_attempt.status;

        let masterOrder = JSON.parse(trade_attempt.master_order);
        let symbol = masterOrder.symbol;
        let side = masterOrder.side;
        let qty = masterOrder.filledSize;
        let masterTime = masterOrder.ts / 1000000;

        let resultEvent = JSON.parse(trade_attempt.result_event);
        let followerTime = 0;

        let time = new Date(date);

        let formatTime = date_handler.Format(time);

        let followerOrderId;
        let msg;
        let orderSize = "";
        let dealFunds = "";
        let fee = "";
        let delay = 0
        let profit = parseFloat(trade_attempt.profit);

        if ('followerOrderID' in resultEvent) {
            followerOrderId = resultEvent.followerOrderID
            // msg = "ID:" + followerOrderId;
            msg = "";
            let orderInfo = JSON.parse(trade_attempt.follower_order_statistics);
            if(orderInfo != null){
                orderSize = orderInfo.size;
                dealFunds = orderInfo.dealFunds;
                followerTime = orderInfo.createdAt;
                delay = parseInt(followerTime) - parseInt(masterTime);
            } else {
                orderSize = -1
                dealFunds = -1;
                followerTime = -1;
                delay = -1;
            }

        } else {
            msg = resultEvent.msg;
        }

        let trTemplate = table.querySelector("tbody > [kucoin-history-tr-template]");
        let newTr = trTemplate.cloneNode(true);
        newTr.style.display = "table-row";

        newTr.querySelector('[date]').innerHTML = formatTime;
        if(masterId !== -1){
            newTr.querySelector('[from]').innerHTML = '<a href="https://cunion.io/panel/cabinet/cabinet_master_page?master-id=' + masterId + '">' + (masterNickname == null ? "no_name" : masterNickname) + '</a>';
        } else {
            newTr.querySelector('[from]').innerHTML = "undef";
        }
        newTr.querySelector('[symbol]').innerHTML = symbol;
        let icon1 = link_icon[search_image(symbol.split("-")[0])];
        let icon2 = link_icon[search_image(symbol.split("-")[1])];
        newTr.querySelector(".quote-asset").setAttribute('src', icon1 == undefined ? "" : icon1.currentSRC);
        newTr.querySelector(".base-asset").setAttribute('src', icon2 == undefined ? "" : icon2.currentSRC);

        // let quoteIcon = GetDupplIconBySymbol(symbol).quoteIcon;
        // let baseIcon = GetDupplIconBySymbol(symbol).baseIcon;
        // newTr.querySelector('[symbol]').appendChild(quoteIcon);
        // newTr.querySelector('[symbol]').appendChild(baseIcon);



        if (side === 'buy') {
            newTr.querySelector('[side]').style.color = '#4bbf73'
            newTr.querySelector('[side]').innerHTML = 'Buy ' + iconUp;
        } else {
            newTr.querySelector('[side]').innerHTML = 'Sell ' + iconDown;
            newTr.querySelector('[side]').style.color = '#d9534f '
        }

        if(status === 'equalizer_sell_success'){
            newTr.querySelector('[qty]').innerHTML = '<span class="badge bg-info">absent</span>';
        } else {
            newTr.querySelector('[qty]').innerHTML = qty;
        }


        if(status === 'equalizer_buy_success' || status === 'equalizer_sell_success'){
            newTr.querySelector('[status]').innerHTML = '<span class="badge bg-info">equalized</span>';
        } else {
            newTr.querySelector('[status]').innerHTML = '<span class="badge ' + (status === 'failed' ? 'bg-warning' : 'bg-success') + '">' + status + '</span>';
        }

        // newTr.querySelector('[msg]').innerHTML = msg;

        newTr.querySelector('[follower_order_size]').innerHTML = orderSize === "" ? "" :  coinIcon + orderSize;

        if (symbol.includes("-USDT")) {
            newTr.querySelector('[deal-funds]').innerHTML = dealFunds !== "" ? dollarCoin + " " + parseInt(dealFunds * 100) / 100 : "";
        } else {
            newTr.querySelector('[deal-funds]').innerHTML = dealFunds !== "" ? parseInt(dealFunds * 100) / 100 : "";
        }


        if(status === 'equalizer_buy_success' || status === 'equalizer_sell_success'){
            newTr.querySelector('[delay]').innerHTML = "--";
        } else {
            if(delay === 0){
                newTr.querySelector('[delay]').innerHTML = msg;
            } else {
                newTr.querySelector('[delay]').innerHTML = delay === 0 ? " - " : clockIcon + delay + " ms";
            }
        }


        newTr.querySelector('[deal-profit]').innerHTML = trade_attempt.profit == null ? "..." : (profit > 0 ? "+" + parseInt(profit*1000)/1000 + '$' : parseInt(profit*1000)/1000 + '$');
        if(trade_attempt.profit != null){
            newTr.querySelector('[deal-profit]').style.color = profit >=0 ? "#4bbf73" : "#d9534f";
        }

        table.querySelector("tbody").appendChild(newTr);
    }
}

//---------------------

var tradeHistory;
const kucoin_copy_history_loader = new KucoinCopyHistoryLoader();

LoadKucoinHistory = async () => {

    let nickNamesPromise = new Promise((resolve, reject) => {
        kucoin_copy_history_loader.LoadNicknames().then((data) => {
            resolve(data)
        }).catch((err)=>{
            reject(err);
        })
    })

    tradeHistory = await kucoin_copy_history_loader.LoadHistory().then((history) => {
        return history.history
    });

    // console.log(tradeHistory);
    let nicknames = await nickNamesPromise;

    console.log("----> Preparing the transactions history html--->")
    tradeHistory.forEach((trade_attempt) => {
        // console.log(trade_attempt);
        let table = document.querySelector("#kucoin_copy_history_table");
        kucoin_copy_history_loader.appendTradeAttemptToTable(table, trade_attempt);
    })
    
    // $("#kucoin_copy_history_table").DataTable({
    //     pageLength: 50,
    //     lengthChange: false,
    //     bFilter: false,
    //     autoWidth: false,
    //     order: [[ 1, "desc" ]]
    // });
    console.log("-----> Transactions history render ended.")

}

GetDupplIconBySymbol = (symbol) => {

    let quoteAsset = symbol.split("-")[0];
    let baseAsset = symbol.split("-")[1]

    let quoteIcon = document.createElement("img");
    let baseIcon = document.createElement("img");

    quoteIcon.setAttribute('src', link_icon[search_image(quoteAsset)].currentSRC);
    baseIcon.setAttribute('src', link_icon[search_image(baseAsset)].currentSRC);

    quoteIcon.classList.add("quote-icon");
    baseIcon.classList.add("base-icon");

    return {
        quoteIcon: quoteIcon,
        baseIcon: baseIcon
    }
}
