var user_balance = {

    allTickers: "",
    allSymbols: "",
    fiatPrice: null,
    balance: [],
    id: "",
    email: "",
    total: 0,
    holds: 0,
    available_usdt: 0,

    GetData: () => {
        // console.log(user_balance.id)
        // console.log("try to get user balance from server")
        fetch('https://cunion.io:2087/getAccount_balance', {
            method: 'POST',
            body: JSON.stringify({id: user_balance.id})
        }).then((response) => {
            return response.json();
        }).then((data) => {
            user_balance.allTickers = null
            user_balance.allTickers = data.allTickers;
            user_balance.allSymbols = data.symbols.data;
            user_balance.fiatPrice = data.fiatPrice;
            user_balance.balance = []
            parse_data_USDT(data.balance.data)
        })
    }
}

parse_data_USDT = (data) => {
    data.forEach((row) => {
        let sale_price = parseFloat(getTickerByName_user_balance(row.currency))
        let balance_fiat = GetFiatPriceByName(row.currency, user_balance.fiatPrice);

        // console.log(isNaN(sale_price) + "<----------->" + row)
        if (row.balance !== '0') {
            if (row.type === 'trade' && row.currency !== 'USDT') {


                let available_FIAT = balance_fiat != undefined ? row.available * balance_fiat : 0;
                let balance_FIAT = balance_fiat != undefined ? row.balance * balance_fiat : 0;
                let holds_FIAT = balance_fiat != undefined ? row.holds * balance_fiat : 0;
                let sale_to;
                if (isNaN(sale_price) && available_FIAT === 0  && balance_FIAT === 0 && holds_FIAT===0) {
                    sale_to = "No price";
                } else if (isNaN(sale_price)) {
                    sale_to = "BTC"
                } else {
                    sale_to = "USDT";
                }
                //isNaN(sale_price) ? 'BTC' : 'USDT'
                let ready_row = {
                    nameTicker: row.currency,
                    balance: parseFloat(row.balance),
                    available: parseFloat(row.available),
                    holds: parseFloat(row.holds),
                    balance_USDT: 0,
                    available_USDT: 0,
                    holds_USDT: 0,
                    available_FIAT: available_FIAT,
                    balance_FIAT: balance_FIAT,
                    holds_FIAT: holds_FIAT,
                    sale_to: sale_to
                }
                user_balance.balance.push(ready_row)
                // console.log('ready row --->', ready_row)

            } else if (row.currency === 'USDT' && row.type === 'trade') {

                let available_FIAT = balance_fiat != undefined ? row.available * balance_fiat : 0;
                let balance_FIAT = balance_fiat != undefined ? row.balance * balance_fiat : 0;
                let holds_FIAT = balance_fiat != undefined ? row.holds * balance_fiat : 0;

                let ready_row = {
                    nameTicker: row.currency,
                    balance: parseFloat(row.balance),
                    available: parseFloat(row.available),
                    holds: parseFloat(row.holds),
                    balance_USDT: row.balance,
                    available_USDT: row.available,
                    holds_USDT: row.holds,
                    available_FIAT: available_FIAT,
                    balance_FIAT: balance_FIAT,
                    holds_FIAT: holds_FIAT,
                }
                user_balance.balance.push(ready_row)
                // console.log('ready row --->', ready_row)
            }
            // else if (row.type === 'trade' && row.currency !== 'USDT'){
            //     let balance_fiat = GetFiatPriceByName(row.currency, user_balance.fiatPrice);
            //     let available_FIAT = balance_fiat!=0?row.available * balance_fiat:0;
            //     let balance_FIAT = balance_fiat!=0?row.balance * balance_fiat:0;
            //     let holds_FIAT = balance_fiat!=0?row.holds * balance_fiat:0;
            //
            //     let ready_row = {
            //         nameTicker: row.currency,
            //         balance: row.balance,
            //         available: row.available,
            //         holds: row.holds,
            //         available_FIAT: available_FIAT,
            //         balance_FIAT: balance_FIAT,
            //         holds_FIAT: holds_FIAT,
            //         balance_USDT: 0,
            //         available_USDT: 0,
            //         holds_USDT: 0
            //     }
            //     user_balance.balance.push(ready_row)
            // }

        }
    })
    calculate_hat()

    if (GetPageName() === 'cabinet_accounts') {
        Display_balance_table();
        placePie_balance()
    }


}

parse_data_fiat = (data) => {

    data.forEach((row) => {

    })

}

calculate_hat = () => {
    user_balance.total = 0;
    user_balance.holds = 0;
    user_balance.available_usdt = 0;

    for (var i = 0; i < user_balance.balance.length; i++) {
        if (user_balance.balance[i].nameTicker === 'USDT') {
            user_balance.available_usdt += (parseFloat(user_balance.balance[i].available_USDT))
            user_balance.total += ((parseFloat(user_balance.balance[i].balance_USDT)))
            user_balance.holds += ((parseFloat(user_balance.balance[i].holds_USDT)))
        } else {
            user_balance.total += (((user_balance.balance[i].balance_FIAT)))
            user_balance.holds += (((user_balance.balance[i].holds_FIAT)))
        }
        // available_usdt+=(parseFloat(user_balance.balance[i].available_USDT))
    }


    Draw_hat()
}
GetFiatPriceByName = (assetName, prices) => {
    let price = prices[assetName];
    if (price != undefined) {
        return parseFloat(price);
    } else {
        console.log("Can not find fiat price for asset:" + assetName);
        return undefined;
    }
}


Display_balance_table = () => {
    var eventPairElement_0 = document.getElementById("tr_tickers").cloneNode(true);

    remove_rows_table();

    for (let i = 0; i < user_balance.balance.length; i++) {
        let link_id = search_image(user_balance.balance[i].nameTicker);


        let eventPairElement = eventPairElement_0.cloneNode(true)
        eventPairElement.style.display = ''
        let closeElement = eventPairElement.querySelector("#kucoin_close_action > div > [kucoin_close_button]");

        eventPairElement.querySelector("#td_id").innerHTML = (i + 1);

        let image = new Image()
        image.src = (link_icon[link_id].currentSRC);
        image.width = 30;
        image.height = 30;
        eventPairElement.querySelector("#coin").innerHTML = '<img style="margin-left: 5px" class = "coin_icon" src="' + image.src + '">';

        eventPairElement.querySelector("#coin").innerHTML += user_balance.balance[i].nameTicker;

        if (user_balance.balance[i].available_FIAT != 0 || user_balance.balance[i].holds_FIAT != 0 || user_balance.balance[i].balance_FIAT != 0) {
            eventPairElement.querySelector("#amount>sub").innerHTML = '&#x2248;' + Math.round(user_balance.balance[i].available_FIAT * 100) / 100 + ' USD';
            eventPairElement.querySelector("#total>sub").innerHTML = '&#x2248;' + Math.round(user_balance.balance[i].balance_FIAT * 100) / 100 + ' USD';
            eventPairElement.querySelector("#orders>sub").innerHTML = '&#x2248;' + Math.round(user_balance.balance[i].holds_FIAT * 100) / 100 + ' USD';
        } else if (user_balance.balance[i].available_USDT != 0 || user_balance.balance[i].balance_USDT != 0 || user_balance.balance[i].holds_USDT != 0) {
            eventPairElement.querySelector("#amount>sub").innerHTML = '&#x2248;' + Math.round(user_balance.balance[i].available_USDT * 100) / 100 + ' USDT';
            eventPairElement.querySelector("#total>sub").innerHTML = '&#x2248;' + Math.round(user_balance.balance[i].balance_USDT * 100) / 100 + ' USDT';
            eventPairElement.querySelector("#orders>sub").innerHTML = '&#x2248;' + Math.round(user_balance.balance[i].holds_USDT * 100) / 100 + ' USDT';
        }else{
            eventPairElement.querySelector("#amount>sub").innerHTML = '&#x2248;' + ' No price';
            eventPairElement.querySelector("#total>sub").innerHTML = '&#x2248;'  + ' No price';
            eventPairElement.querySelector("#orders>sub").innerHTML = '&#x2248;' + ' No price';

        }


        eventPairElement.querySelector("#total>div").innerHTML = user_balance.balance[i].balance < 0.000001 ? user_balance.balance[i].balance * 100 : user_balance.balance[i].balance;
        eventPairElement.querySelector("#amount>div").innerHTML = user_balance.balance[i].available < 0.000001 ? user_balance.balance[i].available * 100 : user_balance.balance[i].available;
        eventPairElement.querySelector("#orders>div").innerHTML = user_balance.balance[i].holds < 0.000001 ? user_balance.balance[i].holds * 100 : user_balance.balance[i].holds;


        painting_row_table(eventPairElement, closeElement, i);


        // console.log('elem ->', elem.eventPairElement)
        // console.log('elem ->', elem.closeElement)
        document.getElementById("tbodytikers").appendChild(eventPairElement);
        document.getElementById("tbodytikers").style.display = ''

    }
    document.querySelector(".spinner-border.text-primary.me-2").style.display = 'none';

}
painting_row_table = (eventPairElement, closeElement, i) => {

    let symbol = user_balance.balance[i].nameTicker + '-USDT'

    let minlot = parseFloat(getMinlotByName_user_balance(symbol));
    //0.3


    if (parseFloat(user_balance.balance[i].balance) < minlot && user_balance.balance[i].nameTicker != 'USDT') {
        eventPairElement.querySelector("#total").style.color = "#cc8b36";
        eventPairElement.querySelector("#amount").style.color = "#cc8b36";
        eventPairElement.querySelector("#orders").style.color = "#cc8b36";
        eventPairElement.querySelector("#coin").style.color = "#cc8b36";
        eventPairElement.querySelector("#td_id").style.color = "#cc8b36";

        // if (closeElement != undefined) {
        closeElement.style.display = "none";
        // }

        eventPairElement.querySelector("#kucoin_close_action > div ").innerHTML = "DUST";

        let span = document.createElement('span')
        span.style.fontSize = '0.7em';
        span.innerText =
            'Пылью можно назвать небольшое количество монет или токенов которые остались на торговом аккаунте после исполнение торговых ордеров.'
        span.classList.add('trd_tooltiptext')
        // span.style.fontSize='1em !important'
        span.style.setProperty('font-size', '1em', 'important');
        span.style.width = '200px'

        eventPairElement.querySelector("#kucoin_close_action > div ").appendChild(span)
        //  eventPairElem.querySelector("#kucoin_close_action > div span").classList.add('trd_tooltiptext');
        eventPairElement.querySelector("#kucoin_close_action > div").style.color = "#cc8b36";


        // dust.push({
        //     "ticker": user_balance.balance[i].nameTicker,
        //     "total": user_balance.balance[i].available
        // });
    } else {
        let assetName = user_balance.balance[i].nameTicker;
        let assetAmount = user_balance.balance[i].available;
        let sale_to = user_balance.balance[i].sale_to;
        // if(closeElement !=undefined) {
        closeElement.setAttribute("asset_name", assetName)
        closeElement.setAttribute("asset_amount", assetAmount);
        closeElement.setAttribute("sale_to", sale_to);
        closeElement.style.width = "120px"
        closeElement.style.margin = "auto";

        // closeElement.setAttribute("index", i);
        // }
    }


    open_or_close_closElemet(closeElement, i)
    // if (user_balance.balance[i].nameTicker === 'USDT') {
    //     // if (closeElement != undefined) {
    //         closeElement.style.display = 'none'
    //     // }
    //     //document.querySelector(".trd_tooltip span").remove()
    //
    // } else {
    //     // if (closeElement != undefined) {
    //         closeElement.style.display = 'block'
    //     // }
    // }
    let elem = {
        closeElement: closeElement,
        eventPairElement: eventPairElement
    }
    return elem
}


open_or_close_closElemet = (closeElement, i) => {
    let sale_to = closeElement.getAttribute('sale_to');
    if (user.email != 'wydebinance@gmail.com') {
        closeElement.style.display = 'block'
    }

    if (user_balance.balance[i].nameTicker === 'USDT') {
        closeElement.style.display = 'none'
        //document.querySelector(".trd_tooltip span").remove()
    } else if (sale_to === "BTC") {
        closeElement.innerText = "Sell to BTC"
        //    #f6931a
        closeElement.classList.remove("btn-danger")
        closeElement.style.backgroundColor = "#f6931a"
        closeElement.style.color = "white"

    } else if (sale_to === "USDT") {
        closeElement.innerText = "Sell to USDT"
        // #26a17b
        closeElement.classList.remove("btn-danger")
        closeElement.style.backgroundColor = "#26a17b"
        closeElement.style.color = "white"
    } else {
        closeElement.innerText = "No price"
        closeElement.style.display = 'none'
    }
}

remove_rows_table = () => {
    let len = document.getElementById("tbodytikers").children.length
    for (let i = 1; i < len; i++) {
        document.getElementById("tbodytikers").children[1].remove();
    }
}

//new
function Draw_hat() {

    if (GetPageName() === "cabinet_accounts") {


        let spiner = document.querySelectorAll('#validation-balance-spinner')
        document.querySelector(".validation-balance-block").style.display = "inline-block";
        spiner[0].style.display = 'none'
        spiner[1].style.display = 'none'
        // spiner[2].style.display = 'none'
        // spiner[3].style.display = 'none'


        document.querySelector("#available_total_balance1").style.display = 'block';
        document.querySelector("#available_usdt_balance1").style.display = 'block';
        document.querySelector("#in_orders_usdt_balance1").style.display = 'block';

        document.querySelector("#available_total_balance1").innerHTML = "$" + Math.round(user_balance.total * 100) / 100;
        document.querySelector("#available_usdt_balance1").innerHTML = "$" + Math.round(user_balance.available_usdt * 100) / 100;
        document.querySelector("#in_orders_usdt_balance1").innerHTML = "$" + Math.round(user_balance.holds * 100) / 100;

    } else {
        document.querySelector(".validation-balance-block").style.display = "inline-block";
        document.querySelector('#validation-balance-spinner').style.display = 'none';
    }


    document.querySelector("#available_total_balance").innerHTML = "$" + Math.round(user_balance.total * 100) / 100;
    document.querySelector("#available_usdt_balance").innerHTML = "$" + Math.round(user_balance.available_usdt * 100) / 100;
    document.querySelector("#in_orders_usdt_balance").innerHTML = "$" + Math.round(user_balance.holds * 100) / 100;
}


function placePie_balance() {

    var labls = [];
    var another = [];

    let usdtIndex;
    let btcIndex;

    let usdtColor = "#4bbf73";
    let usdtBgColor = "rgba(75,191,115,0.8)"
    let btcColor = "#ec9c13";
    let btcBgColor = "rgba(236,156,19,0.8)";

    for (var i = 0; i < user_balance.balance.length; i++) {
        let availableInFiat = user_balance.balance[i].available_FIAT;
        if(availableInFiat > 0.1){
            labls.push(user_balance.balance[i].nameTicker)
            another.push(user_balance.balance[i].available_FIAT)
            if(user_balance.balance[i].nameTicker === "USDT"){
                usdtIndex = i;
            }
            if(user_balance.balance[i].nameTicker === "BTC"){
                btcIndex = i;
            }
        }
    }

    let colors = ComposeColors(labls.length)
    colors[usdtIndex] = usdtColor;
    colors[btcIndex] = btcColor;

    let backGroundColors = ComposeBackgroundColors(labls.length);
    backGroundColors[usdtIndex] = usdtBgColor;
    backGroundColors[btcIndex] = btcBgColor;


    var chart = new Chart(document.querySelector("#forcake"), {
        type: "pie",
        data: {
            labels: labls,
            datasets: [{
                label: "Last year",
                backgroundColor: colors,
                //borderColor: window.theme.primary,
                hoverBackgroundColor: backGroundColors,
                // hoverBorderColor: window.theme.primary,
                borderColor: '#293042',
                borderWidth: 0,
                data: another,
            }],
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 40,
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                            return labls[tooltipItem.index] + ": $" + parseInt(another[tooltipItem.index] * 100) / 100;
                    }
                },
                intersect: false,
            },
        }
    });
}

ComposeColors = function (length) {
    let colors = [];
    for (let i = allColors.length; i < length + allColors.length; i++) {
        colors.push(allColors[i % allColors.length])
    }
    return colors;
};

ComposeBackgroundColors = function (length){
    let colors = [];
    for (let i = allBGColors.length; i < length + allBGColors.length; i++) {
        colors.push(allBGColors[i % allBGColors.length])
    }
    return colors;
}

//end new


function getMinlotByName_user_balance(name) {
    let a = user_balance.allSymbols.find((symbol) => {
        if (symbol.symbol === name)
            return symbol.baseMinSize;
    })
    return a === undefined ? 0.3 : a.baseMinSize;
}

function getTickerByName_user_balance(name) {
    name += "-USDT";
    let tickerSell;
    let current_ticker;
    user_balance.allTickers.find(function (ticker) {
        if (ticker.symbol === name) {
            tickerSell = ticker.sell;
            current_ticker = ticker
            return 0;
        }
    })

    return tickerSell;
}

// function search_image(ticker) {
//     var result = 0;
//     ticker = ticker.toLowerCase();
//     for (var i = 0; i < link_icon.length; i++) {
//         link_icon[i].name = link_icon[i].name.toLowerCase()
//         result = link_icon[i].name.indexOf(ticker);
//         if (result >= 0) {
//             return i;
//         }
//     }
//     return 0;
// }

setInterval(() => {
    if (user_balance.id != "" && user_balance.email != "" && user.connected != false) {
        user_balance.GetData();
    }

}, 15000)


// var link_icon = [
//     {
//         "currentSRC": "https://cunion.io/panel/cabinet/img/empty_img.jpg",
//         "name": "empty_img"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34ba0db892b0006d7b0ec_USDT.png",
//         "name": "USDT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8a90db892b0006d73786_BTC.png",
//         "name": "BTC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8fc3db892b0006d73894_DOGE.png",
//         "name": "DOGE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf91f78afb0a00068efef7_ETH.png",
//         "name": "ETH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74375db892b0006d819a9_KCS.png",
//         "name": "KCS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88298afb0a00068efd5d_AOA.png",
//         "name": "AOA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6196181fb26db300061312bd_Logo%20color.png",
//         "name": "1EARTH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf85728afb0a00068efcf6_1INCH.png",
//         "name": "1INCH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60e41b724916a50006c0aa92_2Crazy.png",
//         "name": "2CRZ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf858b8afb0a00068efcf9_AAVE.png",
//         "name": "AAVE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618a349db26db30006530362_AAVE3L.png",
//         "name": "AAVE3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618a3495b26db30006530357_aave3s.png",
//         "name": "AAVE3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b88198db892b0006d63218_ABBC%20Logo.png",
//         "name": "ABBC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf85bbdb892b0006d736ce_ACAT.png",
//         "name": "ACAT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c0cbf9db892b0006d76192_KakaoTalk_20210425_131016497_03.png",
//         "name": "ACE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf865edb892b0006d736f0_ACOIN.png",
//         "name": "ACOIN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8672db892b0006d736f1_ACT.png",
//         "name": "ACT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf86838afb0a00068efd1d_ADA.png",
//         "name": "ADA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61921b64b26db3000650a5f1_ada3l.png",
//         "name": "ADA3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183a1cb8d6d9e00068e6dd2_ada3S.png",
//         "name": "ADA3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf86ad8afb0a00068efd23_ADB.png",
//         "name": "ADB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61933b163b4d8400062b125f_photo_2021-11-15%2009.38.20.jpeg",
//         "name": "ADX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf86e08afb0a00068efd2b_AERGO.png",
//         "name": "AERGO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf87088afb0a00068efd36_AGI.png",
//         "name": "AGIX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6167d6448917e40006598eda_MicrosoftTeams-image%20%281%29.png",
//         "name": "AGLD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c037fedb892b0006d74cda_AI-mark-full-color-rgb-1000px%40300ppi.png",
//         "name": "AI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf87298afb0a00068efd3c_AION.png",
//         "name": "AION"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c81c5b8afb0a00068ffe84_AIOZ_logo.png",
//         "name": "AIOZ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf873edb892b0006d7370a_AKRO.png",
//         "name": "AKRO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf874edb892b0006d7370b_ALBT.png",
//         "name": "ALBT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf875f8afb0a00068efd42_ALEPH.png",
//         "name": "ALEPH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf877f8afb0a00068efd43_ALGO.png",
//         "name": "ALGO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c15b6fceb6400072fb3ab_MyNeighborAlice%20%28ALICE%29.png",
//         "name": "ALICE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf87948afb0a00068efd48_ALPA.png",
//         "name": "ALPA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c19353db892b0006d77acc_Alpaca.png",
//         "name": "ALPACA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6170c547279aeb000629afdf_MicrosoftTeams-image%20%282%29.png",
//         "name": "ALPHA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf87b3db892b0006d7371a_AMB.png",
//         "name": "AMB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5dbf91dc25325400087a6776_logo-A.png",
//         "name": "AMPL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88058afb0a00068efd57_ANC.png",
//         "name": "ANC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88188afb0a00068efd5c_ANKR.png",
//         "name": "ANKR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6192234f3b4d8400067d3018_MicrosoftTeams-image%20%281%29.png",
//         "name": "ANT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf883b8afb0a00068efd5e_API3.png",
//         "name": "API3"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf884fdb892b0006d7372a_APL.png",
//         "name": "APL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61765c92fceb64000624a864_AR%20png_%E7%94%BB%E6%9D%BF%201.png",
//         "name": "AR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61b0879d6e4f1d0006e8bc71_arker.png",
//         "name": "ARKER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88638afb0a00068efd61_ARPA.png",
//         "name": "ARPA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6169383afceb6400072ec32f_111%20%281%29.png",
//         "name": "ARRR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8883db892b0006d73737_ARX.png",
//         "name": "ARX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60d93794486fc5000611a67d_ASD%E9%BB%91%E8%89%B2.png",
//         "name": "ASD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b567db26db30006439ae9_Automata%20Network%20%28ATA%29.png",
//         "name": "ATA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88958afb0a00068efd73_ATOM.png",
//         "name": "ATOM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9548d6d9e0006008aa7_atom3l.png",
//         "name": "ATOM3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9e38d6d9e0006008af2_atom3s.png",
//         "name": "ATOM3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618a305db26db3000652fdd0_audius-footer.png",
//         "name": "AUDIO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617a41d8db9c2c0006e1dd19_Logo_FullScreen.png",
//         "name": "AURY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88a9db892b0006d73744_AVA.png",
//         "name": "AVA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88c58afb0a00068efd78_AVAX.png",
//         "name": "AVAX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619464fdb26db3000611a447_AVAX3L.png",
//         "name": "AVAX3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619464f63b4d8400062c296f_AVAX3S.png",
//         "name": "AVAX3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60ee8c0f486fc50006a14942_AXIA_Coin_Decal_Blue-01.png",
//         "name": "AXC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88dddb892b0006d7374b_AXE.png",
//         "name": "AXE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88ebdb892b0006d7374f_AXPR.png",
//         "name": "AXPR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60f0f6ca486fc50006a1a84a_MicrosoftTeams-image.png",
//         "name": "AXS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e0a68d6d9e00068eb7e4_axs3l.png",
//         "name": "AXS3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9fc8d6d9e0006008af9_axs3s.png",
//         "name": "AXS3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6170d636fceb64000659fb14_MicrosoftTeams-image%20%281%29.png",
//         "name": "BADGER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6194b3ad3b4d8400062c5289_logo%20%281%29.png",
//         "name": "BAKE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61308826f1150200068c805c_f179d0f6-9afa-4faf-b47a-9fd7c3ddaafb.jpg",
//         "name": "BAL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c15c4279aeb000627c3f0_Band%20Protocol%20%28BAND%29.png",
//         "name": "BAND"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617a1e3e8d6d9e0006883369_1-3.Token%20Icon.png",
//         "name": "BASIC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf88fadb892b0006d73750_BAT.png",
//         "name": "BAT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf890e8afb0a00068efd7f_BAX.png",
//         "name": "BAX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8929db892b0006d73753_BCD.png",
//         "name": "BCD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8948db892b0006d7375a_BCH.png",
//         "name": "BCH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f8d98d6d9e0006008a69_BCH3L.png",
//         "name": "BCH3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185fa1e8d6d9e0006008b0d_BCH3S.png",
//         "name": "BCH3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf89798afb0a00068efd8f_BCHA.png",
//         "name": "BCHA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8a7e8afb0a00068efdb9_BSV.png",
//         "name": "BSV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf899adb892b0006d73767_BEPRO.png",
//         "name": "BEPRO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf89b48afb0a00068efd96_BLOC.png",
//         "name": "BLOC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61551b68c60b2e000633a551_Artboard%2011%20copy.png",
//         "name": "BLOK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a084a4d09f0b00066cfd0b_logo%20-%2064x64.png",
//         "name": "BMON"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf89c28afb0a00068efd99_BNB.png",
//         "name": "BNB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e1b8db9c2c0006a90401_bnb3l.png",
//         "name": "BNB3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e1c18d6d9e00068eb92a_bnb3s.png",
//         "name": "BNB3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf89dbdb892b0006d7376d_BNS.png",
//         "name": "BNS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/612f4ddcf1150200068c2ff0_ca94e3bb-f955-49e8-9827-ff379e15933e.jpg",
//         "name": "BNT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8a008afb0a00068efda7_BOA.png",
//         "name": "BOA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8a118afb0a00068efdaa_BOLT.png",
//         "name": "BOLT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60de7578486fc500061231df_MicrosoftTeams-image.png",
//         "name": "BOND"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61b0c84437b6c5000677f9a8_BondlyTokenLogo%403x.png",
//         "name": "BONDLY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8a2fdb892b0006d7377c_BOSON.png",
//         "name": "BOSON"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8a67db892b0006d73781_BRG.png",
//         "name": "BRG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f87e8d6d9e0006008a35_BTC3L.png",
//         "name": "BTC3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f888db9c2c0006a717f6_BTC3S.png",
//         "name": "BTC3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8abedb892b0006d73790_BTCP.png",
//         "name": "BTCP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8adb8afb0a00068efdc1_BTM.png",
//         "name": "BTM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8b018afb0a00068efdc5_BTT.png",
//         "name": "BTT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8b128afb0a00068efdc6_BU.png",
//         "name": "BU"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619cb04e6db64a0006b4ee43_BURGER.png",
//         "name": "BURGER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60fd7b76486fc5000615adc5_CoinBurp%20-%20Logo%20-%20Black%20-%20500x500.png",
//         "name": "BURP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8b1edb892b0006d73799_BUX.png",
//         "name": "BUX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8b2e8afb0a00068efdc9_BUY.png",
//         "name": "BUY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6178ef0b279aeb00060434f7_logo%20%281%29.png",
//         "name": "BZRX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6153c5c5c60b2e0006335824_MicrosoftTeams-image.png",
//         "name": "C98"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5ec2328cd83f760008758536_cadh-v-light.png",
//         "name": "CADH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8b6c8afb0a00068efdd1_CAKE.png",
//         "name": "CAKE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8b868afb0a00068efdd6_CAPP.png",
//         "name": "CAPP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8b9b8afb0a00068efdd7_CARD.png",
//         "name": "CARD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8baadb892b0006d737b8_CARR.png",
//         "name": "CARR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8bc18afb0a00068efde0_CAS.png",
//         "name": "CAS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617fa27edb9c2c0006153c2d_Icon%20for%20Black%20bg.png",
//         "name": "CBC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8bef8afb0a00068efde8_CELO.png",
//         "name": "CELO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6188b6a48d6d9e0006331714_b561ffe7-18e5-4470-b9df-bfd0619a1094.png",
//         "name": "CERE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60d2d833db892b0006084bb3_cEUR.png",
//         "name": "CEUR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60ee8874486fc50006a14873_CFG%201.jpg",
//         "name": "CFG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8bff8afb0a00068efde9_CGG.png",
//         "name": "CGG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8c368afb0a00068efdfa_CHR.png",
//         "name": "CHR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8c488afb0a00068efdfe_CHSB.png",
//         "name": "CHSB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8c598afb0a00068efe03_CHZ.png",
//         "name": "CHZ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6119c092f115020006056edb_cirus%20logo.png",
//         "name": "CIRUS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8c668afb0a00068efe06_CIX100.png",
//         "name": "CIX100"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8c73db892b0006d737e7_CKB.png",
//         "name": "CKB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60f1121c486fc50006a1ac53_photo_2021-07-16_12.58.25-removebg-preview.png",
//         "name": "CLV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8c8a8afb0a00068efe0c_COFI.png",
//         "name": "COFI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8c9d8afb0a00068efe13_COMB.png",
//         "name": "COMB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8caedb892b0006d737f3_COMP.png",
//         "name": "COMP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8cbedb892b0006d737f4_COS.png",
//         "name": "COS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8ccddb892b0006d737f7_COTI.png",
//         "name": "COTI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8cdcdb892b0006d737fc_COV.png",
//         "name": "COV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8cebdb892b0006d737ff_CPC.png",
//         "name": "CPC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6179045d279aeb00060442e9_2021-10-27%2015.48.12.jpg",
//         "name": "CPOOL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c89904db892b0006d84743_Covalent_Logomark_Three%20Color_Circle.png",
//         "name": "CQT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619e0a2dc6f62c000695d8bb_cream%20logo.png",
//         "name": "CREAM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61af34886e4f1d0006d5d400_logo-icon.png",
//         "name": "CREDI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8cfc8afb0a00068efe1a_CRO.png",
//         "name": "CRO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d0fdb892b0006d73803_CRPT.png",
//         "name": "CRPT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d1edb892b0006d73807_CRV.png",
//         "name": "CRV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d2e8afb0a00068efe22_CS.png",
//         "name": "CS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d40db892b0006d7380d_CSP.png",
//         "name": "CSP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d4fdb892b0006d73810_CTI.png",
//         "name": "CTI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c15a9fceb6400072fb3aa_Cartesi%20%28CTSI%29.png",
//         "name": "CTSI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d608afb0a00068efe2d_CUDOS.png",
//         "name": "CUDOS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d6edb892b0006d73817_cUSD.png",
//         "name": "cUSD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d84db892b0006d7381c_CV.png",
//         "name": "CV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8d94db892b0006d7381e_CVC.png",
//         "name": "CVC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618bc5483b4d840006da777f_icon-transparent.png",
//         "name": "CWAR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8da38afb0a00068efe37_CWS.png",
//         "name": "CWS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8de08afb0a00068efe44_CXO.png",
//         "name": "CXO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8df0db892b0006d73838_DACC.png",
//         "name": "DACC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8e05db892b0006d7383d_DAG.png",
//         "name": "DAG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8e118afb0a00068efe49_DAI.png",
//         "name": "DAI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8e218afb0a00068efe4b_DAO.png",
//         "name": "DAO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8e348afb0a00068efe4e_DAPPT.png",
//         "name": "DAPPT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c0cc7f8afb0a00068f280b_DAPPX.png",
//         "name": "DAPPX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8e50db892b0006d73842_DASH.png",
//         "name": "DASH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61824761db9c2c0006e6a745_Streamr%20%28DATA%29_logo.png",
//         "name": "DATA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8e66db892b0006d7384a_DATX.png",
//         "name": "DATX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8e7ddb892b0006d73852_DBC.png",
//         "name": "DBC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8ea9db892b0006d73860_DCR.png",
//         "name": "DCR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8ec28afb0a00068efe6c_DEGO.png",
//         "name": "DEGO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8ed5db892b0006d7386f_DENT.png",
//         "name": "DENT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f02db892b0006d73878_DERO.png",
//         "name": "DERO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c15e3fceb6400072fb3ba_DeXe%20%28%20DEXE%29.png",
//         "name": "DEXE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f16db892b0006d7387b_DFI.png",
//         "name": "DFI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60ebabe8486fc5000613ee01_DFYN%20logo%20final%20RGB-06.png",
//         "name": "DFYN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f258afb0a00068efe7d_DGB.png",
//         "name": "DGB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f328afb0a00068efe82_DGTX.png",
//         "name": "DGTX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f538afb0a00068efe87_DIA.png",
//         "name": "DIA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614aa69eddf89900063afaab_dino%20token1.png",
//         "name": "DINO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f62db892b0006d7388a_DIVI.png",
//         "name": "DIVI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c81c02db892b0006d8366b_logo-DT-square.png",
//         "name": "DLTA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f728afb0a00068efe88_DMG.png",
//         "name": "DMG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6145885fddf8990006395755_Logo%20%28RGB%29.png",
//         "name": "DMTR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8f868afb0a00068efe89_DOCK.png",
//         "name": "DOCK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8fb3db892b0006d73891_DODO.png",
//         "name": "DODO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9368d6d9e0006008a98_doge3l.png",
//         "name": "DOGE3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185fa6c8d6d9e0006008b30_doge3s.png",
//         "name": "DOGE3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8fd78afb0a00068efe95_DON.png",
//         "name": "DON"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b6fc91db892b0006d5e308_8800.png",
//         "name": "DORA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8fe5db892b0006d73896_DOT.png",
//         "name": "DOT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183de3b8d6d9e00068eb556_dotl3l.png",
//         "name": "DOT3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9bedb9c2c0006a7187f_dot3s.png",
//         "name": "DOT3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61010288cdb62c0006b9317e_Logo%20Game.png",
//         "name": "DPET"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf8ff3db892b0006d73897_DPI.png",
//         "name": "DPI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618cb0d63b4d840006b1bb4c_deeper%20logo%20Twitter.png",
//         "name": "DPR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617f870c8d6d9e0006245a0e_photo_2021-11-01_14.18.47-removebg-preview.png",
//         "name": "DREAMS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90038afb0a00068efe9a_DRGN.png",
//         "name": "DRGN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90118afb0a00068efe9d_DSLA.png",
//         "name": "DSLA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614d38bc8917e40007187a2f_photo_2021-09-22_21.29.53-removebg-preview.png",
//         "name": "DVPN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf902b8afb0a00068efeaa_DX.png",
//         "name": "DX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6138ba6cddf8990006155f6d_didi.png",
//         "name": "DYDX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf903a8afb0a00068efeaf_DYP.png",
//         "name": "DYP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6195c81f3b4d840006d70bd7_photo_2021-11-18%2011.26.57.jpeg",
//         "name": "EDG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90568afb0a00068efeb6_EDN.png",
//         "name": "EDN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf9074db892b0006d738a5_EFX.png",
//         "name": "EFX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/613eeedcddf89900066f251a_Elrond%20Mark%20Black.png",
//         "name": "EGLD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf9095db892b0006d738a7_ELA.png",
//         "name": "ELA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90badb892b0006d738ad_ELF.png",
//         "name": "ELF"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90cadb892b0006d738ae_ELON.png",
//         "name": "ELON"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90d8db892b0006d738b4_ENJ.png",
//         "name": "ENJ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90e68afb0a00068efec9_ENQ.png",
//         "name": "ENQ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b449f3b4d840006d9d450_%E4%B8%8B%E8%BD%BD.png",
//         "name": "ENS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf90f98afb0a00068efecb_EOS.png",
//         "name": "EOS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f8cb8d6d9e0006008a63_EOS3L.png",
//         "name": "EOS3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185fa128d6d9e0006008b06_EOS3S.png",
//         "name": "EOS3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf917bdb892b0006d738d6_EOSC.png",
//         "name": "EOSC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a840604eabd90006e6c2b2_epik%20logo_icon%28cmyk%29.png",
//         "name": "EPIK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/www/coin/pc/EPRX.png",
//         "name": "EPRX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61824700db9c2c0006e6a6dd_Ellipsis%20%28EPS%29_logo.png",
//         "name": "EPS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/613975c3f115020006c5a0ca_EQX-Token-Icon-Color.png",
//         "name": "EQX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf91908afb0a00068efee4_EQZ.png",
//         "name": "EQZ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6109fcc6cdb62c0006bed7d1_ERG.png",
//         "name": "ERG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6188dfdfdb9c2c00077d73fa_Ethernity%20Chain%20%28ERN%29.png",
//         "name": "ERN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf91a78afb0a00068efeea_ERSDL.png",
//         "name": "ERSDL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf91c68afb0a00068efeef_ETC.png",
//         "name": "ETC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf91d7db892b0006d738df_ETF.png",
//         "name": "ETF"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf920bdb892b0006d738e5_ETH2.png",
//         "name": "ETH2"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f8b0db9c2c0006a71805_ETH3L.png",
//         "name": "ETH3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f8b8db9c2c0006a71807_ETH3S.png",
//         "name": "ETH3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b77e44db892b0006d5f62e_ETHOlogo.png",
//         "name": "ETHO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf923adb892b0006d738f2_ETN.png",
//         "name": "ETN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf9250db892b0006d738f7_EWT.png",
//         "name": "EWT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60d42ddf486fc5000611330a_EXRD.png",
//         "name": "EXRD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf9267db892b0006d738fc_FCL.png",
//         "name": "FCL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf9275db892b0006d73900_FEAR.png",
//         "name": "FEAR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf928f8afb0a00068eff0f_FET.png",
//         "name": "FET"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf929ddb892b0006d73906_FIL.png",
//         "name": "FIL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf92a8db892b0006d73907_FKX.png",
//         "name": "FKX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6167f061c60b2e0006632e4e_IMG_0860.PNG",
//         "name": "FLAME"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c155f279aeb000627c3bf_FLOW.png",
//         "name": "FLOW"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf92c88afb0a00068eff1f_FLUX.png",
//         "name": "FLUX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6194aca2b26db3000611c99b_FLY_logo_symbol_%D0%BA%D0%B2%D0%B0%D0%B4%D1%80%D0%B0%D1%82_200_200.png",
//         "name": "FLy"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf92e38afb0a00068eff26_FORESTPLUS.png",
//         "name": "FORESTPLUS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60cadf46db892b0006d89e9c_FORM.png",
//         "name": "FORM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf92ee8afb0a00068eff29_FORTH.png",
//         "name": "FORTH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf930adb892b0006d73916_FRM.png",
//         "name": "FRM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93178afb0a00068eff2f_FRONT.png",
//         "name": "FRONT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618a31ea3b4d840006d3df1c_FANTOMGO-mark-color-transparent.png",
//         "name": "FTG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93248afb0a00068eff33_FTM.png",
//         "name": "FTM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e005db9c2c0006a90259_ftm3l.png",
//         "name": "FTM3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9f08d6d9e0006008af6_ftm3s.png",
//         "name": "FTM3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c15d4279aeb000627c3f2_FTT%20logo.png",
//         "name": "FTT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf9333db892b0006d7391d_FX.png",
//         "name": "FX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b56c5b26db30006439b30_fraxlogo.png",
//         "name": "FXS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61163335ddf8990007f0276d_logo",
//         "name": "GALAX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a72a3ac3456600064bec70_galax3l.png",
//         "name": "GALAX3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a72a444eabd90006e61f14_galax3s.png",
//         "name": "GALAX3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93478afb0a00068eff34_GAS.png",
//         "name": "GAS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60cac6ed8afb0a00069063ea_GENS_logo.png",
//         "name": "GENS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf935b8afb0a00068eff39_GGC.png",
//         "name": "GGC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61779aa7fceb6400068f9df1_ghst-01.png",
//         "name": "GHST"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf9366db892b0006d73924_GHX.png",
//         "name": "GHX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60adbad28afb0a00068c0026_Glitch-logo_blank%20background%20%20copy.png",
//         "name": "GLCH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6194ab133b4d8400062c4c3c_logo.png",
//         "name": "GLM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93728afb0a00068eff3c_GLQ.png",
//         "name": "GLQ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf937cdb892b0006d73926_GMB.png",
//         "name": "GMB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf2267db892b0006d72962_gmee-800x800.png",
//         "name": "GMEE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93908afb0a00068eff45_GO.png",
//         "name": "GO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/www/coin/pc/GOD.png",
//         "name": "GOD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619f2cedc6f62c000697060d_logo--gods-unchained-icon.png",
//         "name": "GODS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93a1db892b0006d73930_GOM2.png",
//         "name": "GOM2"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93afdb892b0006d73931_GOVI.png",
//         "name": "GOVI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34c6ddb892b0006d7b118_GRIN.png",
//         "name": "GRIN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93cadb892b0006d73936_GRT.png",
//         "name": "GRT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60ec0383486fc5000613f970_GSPI_Token.webp",
//         "name": "GSPI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c1535279aeb000627c3b7_GTC.png",
//         "name": "GTC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf93ebdb892b0006d7393b_GZIL.png",
//         "name": "GZIL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c03e36db892b0006d74d76_HAI.png",
//         "name": "HAI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/611283e4cdb62c0006c04019_MicrosoftTeams-image.png",
//         "name": "HAKA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60cafe018afb0a00069069dc_Artboard%208-8.png",
//         "name": "HAPI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a5e17c4eabd90006e56bcc_Kava-Lend-Token-256px%20%281%29.png",
//         "name": "HARD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61405119ddf89900066f832f_111-removebg-preview.png",
//         "name": "HBAR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6188dfabdb9c2c00077d73b9_Hegic%20%28HEGIC%29.png",
//         "name": "HEGIC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617a444cdb9c2c0006e1de59_icon200x200.png",
//         "name": "HERO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c03e788afb0a00068f1365_HORD.png",
//         "name": "HORD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c03ed88afb0a00068f136d_HOTCROSS.png",
//         "name": "HOTCROSS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c03f3bdb892b0006d74d8b_HPB.png",
//         "name": "HPB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c03f088afb0a00068f1374_HT.png",
//         "name": "HT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c03f1ddb892b0006d74d86_HTR.png",
//         "name": "HTR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c740c9db892b0006d81952_HYDRA.png",
//         "name": "HYDRA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74108db892b0006d81956_HYVE.png",
//         "name": "HYVE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74125db892b0006d81957_ICP.png",
//         "name": "ICP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74140db892b0006d8195b_IDEA.png",
//         "name": "IDEA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619de7d8c6f62c000695b7ab_ILA.png",
//         "name": "ILA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614b3189f115020007f82c8e_MicrosoftTeams-image%20%283%29.png",
//         "name": "ILV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a03f0eac7ba40006205758_IMX_colour_400x400.png",
//         "name": "IMX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616e6aff279aeb0006288fda_MicrosoftTeams-image%20%283%29.png",
//         "name": "INJ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c0debbdb892b0006d76430_IOI%20logo.png",
//         "name": "IOI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74269db892b0006d81979_IOST.png",
//         "name": "IOST"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c742928afb0a00068fe18c_IOTX.png",
//         "name": "IOTX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618a5296b26db30006427a3f_MicrosoftTeams-image%20%28119%29.png",
//         "name": "ISP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61371eeaddf899000614eb81_IXS%20Helmet%20White.png",
//         "name": "IXS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c742ee8afb0a00068fe194_J8T.png",
//         "name": "J8T"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7430cdb892b0006d81989_JAR.png",
//         "name": "JAR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617907c9279aeb000604455f_MicrosoftTeams-image.png",
//         "name": "JASMY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c743278afb0a00068fe1a3_JST.png",
//         "name": "JST"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/615fe51d8917e40006bd799c_JUP%20LOGO%20500X500.png",
//         "name": "JUP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7434ddb892b0006d8199c_KAI.png",
//         "name": "KAI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60f6aba7486fc50006a26794_KAR1.png",
//         "name": "KAR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74360db892b0006d819a3_KAT.png",
//         "name": "KAT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619b03c13b4d84000659d1c4_Kava-Token-256%20%281%29.png",
//         "name": "KAVA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7438b8afb0a00068fe1b6_KDA.png",
//         "name": "KDA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a9b5f16e4f1d0006bc5d62_DON%20Logo%202.png",
//         "name": "KDON"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c158e279aeb000627c3da_Keep%20Network%20%28KEEP%29.png",
//         "name": "KEEP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c743a0db892b0006d819b0_KEY.png",
//         "name": "KEY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a4a3a6c3456600064a6dae_kin_icon_160_160_Purple.png",
//         "name": "KIN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61aee2807d2d04000631f222_Klaytn-%28KLAY%29logo.png",
//         "name": "KLAY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c743d38afb0a00068fe1c2_KLV.png",
//         "name": "KLV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a064a7d09f0b00066cf09c_calamari-dark.png",
//         "name": "KMA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60ee98564916a50006c22fb0_KMD.png",
//         "name": "KMD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c743eddb892b0006d819b7_KNC.png",
//         "name": "KNC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b881568afb0a00068dfaee_KOK%20logo.png",
//         "name": "KOK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74404db892b0006d819bf_KONO.png",
//         "name": "KONO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c744188afb0a00068fe1c8_KRL.png",
//         "name": "KRL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7442a8afb0a00068fe1ca_KSM.png",
//         "name": "KSM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5f6c835544c2e7000655f64f_126B5DFE-61BB-42EA-BF86-113748C55152.png",
//         "name": "KTSt"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74467db892b0006d819d0_LABS.png",
//         "name": "LABS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61b1b72b6e4f1d0006e93a9e_Coin%20logo.png",
//         "name": "LACE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c744888afb0a00068fe1ce_LAYER.png",
//         "name": "LAYER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619b317eb26db30006722cbe_LIKE%20logo.png",
//         "name": "LIKE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61af010a7d2d04000631fa37_Linear-%28LINA%29logo.png",
//         "name": "LINA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c744a2db892b0006d819d4_LINK.png",
//         "name": "LINK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183dda18d6d9e00068eb49f_link3l.png",
//         "name": "LINK3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f97adb9c2c0006a71865_link3s.png",
//         "name": "LINK3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619b31d4b26db30006722d04_LIT.png",
//         "name": "LIT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6108e459dcbfec0006859f22_thumbnail.png",
//         "name": "LITH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c744d1db892b0006d819d9_LNCHX.png",
//         "name": "LNCHX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7450adb892b0006d819e2_LOC.png",
//         "name": "LOC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7452bdb892b0006d819e6_LOCG.png",
//         "name": "LOCG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c75945db892b0006d81d0a_OXEN.png",
//         "name": "OXEN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c745748afb0a00068fe1e4_LOL.png",
//         "name": "LOL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74593db892b0006d819eb_LON.png",
//         "name": "LON"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c745aedb892b0006d819f2_LOOM.png",
//         "name": "LOOM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b72cb6db892b0006d5e7fe_LPOOL%20icon.png",
//         "name": "LPOOL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60da98694916a50006bfa065_3640.png",
//         "name": "LPT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c745c3db892b0006d819f3_LRC.png",
//         "name": "LRC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c745d98afb0a00068fe1eb_LSK.png",
//         "name": "LSK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b47fabdb892b0006d57ba5_LSS.png",
//         "name": "LSS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c745f2db892b0006d819f8_LTC.png",
//         "name": "LTC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b829e3b4d840006da10ad_LTC3L.png",
//         "name": "LTC3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b82a7b26db3000643c7bf_LTC3S.png",
//         "name": "LTC3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6178c6c1fceb6400060e1a61_photo_2021-10-26%2016.33.54.png",
//         "name": "LTO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c746038afb0a00068fe1ec_LTX.png",
//         "name": "LTX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c746168afb0a00068fe1ef_LUNA.png",
//         "name": "LUNA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183dc5cdb9c2c0006a8fe54_luna3l.png",
//         "name": "LUNA3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185fa5f8d6d9e0006008b29_luna3s.png",
//         "name": "LUNA3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7462bdb892b0006d819fd_LYM.png",
//         "name": "LYM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7463c8afb0a00068fe1fa_LYXe.png",
//         "name": "LYXe"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74650db892b0006d81a01_MAHA.png",
//         "name": "MAHA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/612855d7f1150200068aa090_twitterlogo.jpeg",
//         "name": "MAKI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74665db892b0006d81a03_MAN.png",
//         "name": "MAN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74677db892b0006d81a0b_MANA.png",
//         "name": "MANA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619464943b4d8400062c292a_MANA3L.png",
//         "name": "MANA3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619464893b4d8400062c291e_MANA3S.png",
//         "name": "MANA3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7468d8afb0a00068fe20c_MAP.png",
//         "name": "MAP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/602dc5c895d4bc000652b404_Lounge%20M%20Symbol.png",
//         "name": "LZM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c822538afb0a00068fff1b_img_circle.png",
//         "name": "MARSH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c746a1db892b0006d81a14_MASK.png",
//         "name": "MASK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c746b38afb0a00068fe215_MATIC.png",
//         "name": "MATIC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e12ddb9c2c0006a90379_matic3l.png",
//         "name": "MATIC3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e1398d6d9e00068eb874_matic3s.png",
//         "name": "MATIC3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6151dae08917e4000719b031_90Matter.png",
//         "name": "MATTER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c746cddb892b0006d81a1e_MCT.png",
//         "name": "MCT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a715a5d09f0b0006704632_Mdex%20%28MDX%29.png",
//         "name": "MDX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c817fcdb892b0006d835cd_MEM.png",
//         "name": "MEM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619b31f3b26db30006722d1a_Hifi%20Finance%20%28MFT%29%20.png",
//         "name": "MFT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c746f9db892b0006d81a25_MHC.png",
//         "name": "MHC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c747698afb0a00068fe22e_MIR.png",
//         "name": "MIR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c749a5db892b0006d81a88_MITX.png",
//         "name": "MITX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74a0c8afb0a00068fe279_MKR.png",
//         "name": "MKR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74a388afb0a00068fe283_MLK.png",
//         "name": "MLK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c157d279aeb000627c3d1_Enzyme%28MLN%29.png",
//         "name": "MLN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a5c1254eabd90006e55c69_MINE_Network_logo-final-06.png",
//         "name": "MNET"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2c6ce8afb0a00068f685f_9679.png",
//         "name": "MNST"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b602e3b4d840006d9eba6_MicrosoftTeams-image.png",
//         "name": "MNW"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60cb1f2bdb892b0006d8a7c0_modefi_icon_light_bg_250.png",
//         "name": "MODEFI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6195ce4b3b4d840006d70ffd_Moni-Coin-Logo.png",
//         "name": "MONI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/612e0547ddf8990007f5fe00_Moonriver_logo_200x200-removebg-preview.png",
//         "name": "MOVR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74a5e8afb0a00068fe28e_MSWAP.png",
//         "name": "MSWAP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74a71db892b0006d81aab_MTC.png",
//         "name": "MTC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c1503fceb6400072fb35e_Metal%20%28MTL%29logo%20.png",
//         "name": "MTL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617f947b8d6d9e0006246382_MTRG-dark-Blue-rgb-256x256px.png",
//         "name": "MTRG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74b48db892b0006d81ad0_MTV.png",
//         "name": "MTV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74e268afb0a00068fe34a_MXW.png",
//         "name": "MXW"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6167d4fe8917e40006598e56_2021-10-14%2014.21.20.jpg",
//         "name": "NAKA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74e3fdb892b0006d81b5b_NANO.png",
//         "name": "NANO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61358c52f1150200068e01c0_NDUA.png",
//         "name": "NDAU"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60e6c45d4916a50006c11714_near_icon.png",
//         "name": "NEAR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e2188d6d9e00068eb989_near3l.png",
//         "name": "NEAR3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e22c8d6d9e00068eb997_near3s.png",
//         "name": "NEAR3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74e548afb0a00068fe350_NEBL.png",
//         "name": "NEBL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74ed3db892b0006d81b66_NEO.png",
//         "name": "NEO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c334c58afb0a00068f749b_NFT.png",
//         "name": "NFT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616eec1cfceb640006591806_NFTb%20logo.png",
//         "name": "NFTB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a5c6224eabd90006e55e6c_Coin%20icon%20%281%29.png",
//         "name": "NGC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a9ca2d6e4f1d0006bc64dc_10265-removebg-preview.png",
//         "name": "NGL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a6e12cac7ba4000623a71e_e-Money-AquaGreen.png",
//         "name": "NGM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619470ab3b4d8400062c2efa_photo_2021-11-17_11.01.38-removebg-preview.png",
//         "name": "NIF"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74efe8afb0a00068fe35c_NIM.png",
//         "name": "NIM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c156f279aeb000627c3cd_NKN%28NKN%291.png",
//         "name": "NKN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c1524279aeb000627c3b2_NMR.png",
//         "name": "NMR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74f4b8afb0a00068fe367_NOIA.png",
//         "name": "NOIA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bf0b608afb0a00068eebd0_NORD.png",
//         "name": "NORD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c74f7d8afb0a00068fe36d_NRG.png",
//         "name": "NRG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6165612d8917e4000658ab84_111.png",
//         "name": "NTVRK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a5d316d09f0b00066f927a_nucypher-nu-logo.png",
//         "name": "NU"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c75148db892b0006d81bc1_NULS.png",
//         "name": "NULS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6194ad3e3b4d8400062c4d84_NUM%20icon-200x200.png",
//         "name": "NUM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7516ddb892b0006d81bc4_NVT.png",
//         "name": "NVT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/603f3eb2d04a880006ea8638_Logo%20transp.png",
//         "name": "NWC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7519ddb892b0006d81bc6_OCEAN.png",
//         "name": "OCEAN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/611c7710f115020006c7084b_img_circle.png",
//         "name": "ODDZ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c757ae8afb0a00068fe49d_OGN.png",
//         "name": "OGN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c757c4db892b0006d81cc8_OLT.png",
//         "name": "OLT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61936556b26db30006da8d35_logo%20%281%29.png",
//         "name": "OM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c757d88afb0a00068fe4a0_OMG.png",
//         "name": "OMG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c758348afb0a00068fe4aa_ONE.png",
//         "name": "ONE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c75848db892b0006d81cda_ONG.png",
//         "name": "ONG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7586adb892b0006d81ce6_ONION.png",
//         "name": "ONION"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c75886db892b0006d81ced_ONT.png",
//         "name": "ONT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60eaa166486fc5000613cad3_OOE%20Kucoin%E9%80%82%E9%85%8D%E7%89%88.png",
//         "name": "OOE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c758998afb0a00068fe4be_OPCT.png",
//         "name": "OPCT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c758acdb892b0006d81cf6_OPEN.png",
//         "name": "OPEN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c896c48afb0a0006900f39_Blue_Icon.png",
//         "name": "OPS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c758c2db892b0006d81cfb_OPT.png",
//         "name": "OPT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614af88cf115020007f818f0_MicrosoftTeams-image.png",
//         "name": "OPUL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c758ebdb892b0006d81cfe_ORAI.png",
//         "name": "ORAI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60d2f0578afb0a000691440f_3835.png",
//         "name": "ORBS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c75917db892b0006d81d06_ORN.png",
//         "name": "ORN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c7592fdb892b0006d81d07_OUSD.png",
//         "name": "OUSD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/613f1743f115020006c72501_MicrosoftTeams-image.png",
//         "name": "OXT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2ffda8afb0a00068f6dfe_PAL.png",
//         "name": "PAL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fff5db892b0006d7a6c7_PAX.png",
//         "name": "PAX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618a300e3b4d840006d3dcd7_PAX%20Gold%20%28PAXG%29.png",
//         "name": "PAXG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6191fa41b26db3000650854d_symbol_500x500.png",
//         "name": "PBR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61693870fceb6400072ec34d_111%20%282%29.png",
//         "name": "PBX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2feb5db892b0006d7a69a_PCX.png",
//         "name": "PCX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fed78afb0a00068f6dd8_PDEX.png",
//         "name": "PDEX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61adda6d37b6c5000676c2d0_glyph-2x.png",
//         "name": "PEL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6177b83e279aeb000629d440_logo.png",
//         "name": "PERP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fe8bdb892b0006d7a699_PHA.png",
//         "name": "PHA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2feed8afb0a00068f6ddc_PHNX.png",
//         "name": "PHNX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fcf68afb0a00068f6db7_PIVX.png",
//         "name": "PIVX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c300298afb0a00068f6e04_PLAY.png",
//         "name": "PLAY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fe5c8afb0a00068f6dca_PLU.png",
//         "name": "PLU"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fd73db892b0006d7a685_PMGT.png",
//         "name": "PMGT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61010806dcbfec00068481fb_logo-pmon%402x.png",
//         "name": "PMON"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fdb98afb0a00068f6dbe_PNK.png",
//         "name": "PNK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/611dc966ddf8990007f20959_pTokens-icon-white-eye.png",
//         "name": "PNT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fd408afb0a00068f6db8_POL.png",
//         "name": "POL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a4906eac7ba400062237e6_photo_2021-11-29_10.16.35-removebg-preview.png",
//         "name": "POLC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fe9e8afb0a00068f6dd5_POLK.png",
//         "name": "POLK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b77ea98afb0a00068dbefc_icon-circle.png",
//         "name": "POLS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2ff098afb0a00068f6de7_POLX.png",
//         "name": "POLX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a715134eabd90006e615f4_marlin%20Token%20logo.png",
//         "name": "POND"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c30066db892b0006d7a6d6_POWR.png",
//         "name": "POWR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3007fdb892b0006d7a6da_PPT.png",
//         "name": "PPT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fd8b8afb0a00068f6dbd_PRE.png",
//         "name": "PRE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61693be4279aeb000626d39b_prometeuslabs_logo.png",
//         "name": "PROM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fe73db892b0006d7a694_PROPS.png",
//         "name": "PROPS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2ff1ddb892b0006d7a6ae_PRQ.png",
//         "name": "PRQ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2fec5db892b0006d7a69f_PUNDIX.png",
//         "name": "PUNDIX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6163f08b8917e40006bf0880_photo_2021-10-09_15-50-30.jpg",
//         "name": "PUSH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c2ff348afb0a00068f6de8_PYR.png",
//         "name": "PYR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/613b0dc1f115020006c610b4_qi_on_light.png",
//         "name": "QI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c344248afb0a00068f7717_QKC.png",
//         "name": "QKC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3440b8afb0a00068f7711_QNT.png",
//         "name": "QNT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614401b0ddf899000638e894_thumbnail.png",
//         "name": "QRDO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c344588afb0a00068f771e_QTUM.png",
//         "name": "QTUM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617f9e36db9c2c000615386b_QuickSwap_logo.png",
//         "name": "QUICK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3486ddb892b0006d7b043_REV.png",
//         "name": "REV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c344788afb0a00068f7720_RBTC.png",
//         "name": "RBTC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c344fadb892b0006d7afc2_REAP.png",
//         "name": "REAP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616d0d81fceb6400073003aa_MicrosoftTeams-image%20%282%29.png",
//         "name": "REEF"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3453bdb892b0006d7afc4_REN.png",
//         "name": "REN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/612f3ec5f1150200068c2b75_802627E9-2903-41DF-A78A-F28490D5EEB2.png",
//         "name": "REP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34890db892b0006d7b04a_REQ.png",
//         "name": "REQ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34527db892b0006d7afc3_REVV.png",
//         "name": "REVV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c344968afb0a00068f7728_RFOX.png",
//         "name": "RFOX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c344ea8afb0a00068f773a_RFUEL.png",
//         "name": "RFUEL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c344878afb0a00068f7723_RIF.png",
//         "name": "RIF"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6139a9e5f115020006c5ab48_token-1%20%281%29.svg",
//         "name": "RLC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c345b1db892b0006d7afd7_RLY.png",
//         "name": "RLY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6151226a8917e40007197af9_rmrk_symbol.png",
//         "name": "RMRK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34552db892b0006d7afcb_RNDR.png",
//         "name": "RNDR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c4c9428afb0a00068fa337_5028.png",
//         "name": "ROAD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5da68ea238300c2b63f8bd2a_Skype_Picture_2019_10_16T03_23_56_133Z.jpeg",
//         "name": "ROOBEE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3537ddb892b0006d7b21d_ROSE.png",
//         "name": "ROSE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bdd7df8afb0a00068ec307_9783.png",
//         "name": "ROSN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60f52c9d4916a50006c317fb_Logo_icon.png",
//         "name": "ROUTE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619e10686db64a000666714c_RSR.png",
//         "name": "RSR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/615167228917e400071988ec_MicrosoftTeams-image%20%281%29.png",
//         "name": "RUNE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c356418afb0a00068f7a18_SAND.png",
//         "name": "SAND"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619dfae96db64a0006665a50_sand3l.png",
//         "name": "SAND3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619dfaf36db64a0006665a57_SAND3S.png",
//         "name": "SAND3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c353508afb0a00068f799a_SATT.png",
//         "name": "SATT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6177b6e2279aeb000629d363_Logo%20Circle_8x.png",
//         "name": "SCLP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61358e74f1150200068e024a_SDAO.jpg",
//         "name": "SDAO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/612ca24eddf8990007f5aa3c_logo.jpg",
//         "name": "SDN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35cdf8afb0a00068f7b32_SDT.png",
//         "name": "SDT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34fd78afb0a00068f7904_SENSO.png",
//         "name": "SENSO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6062f63795d4bc000657e21f_sero.png",
//         "name": "SERO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619c880ac6f62c0006c8c15e_SFP.png",
//         "name": "SFP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c072b9db892b0006d753da_Seedify.fund%20256x256%20round-05.png",
//         "name": "SFUND"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c353098afb0a00068f798f_SHA.png",
//         "name": "SHA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60e67659486fc50006133291_TOKEN-Gradient.png",
//         "name": "SHFT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c356b18afb0a00068f7a2c_SHIB.png",
//         "name": "SHIB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6188c347db9c2c00077d5408_SHILL%20Token%20Logo.png",
//         "name": "SHILL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c353668afb0a00068f799d_SHR.png",
//         "name": "SHR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616938a5279aeb000626d294_111%20%283%29.png",
//         "name": "SIENNA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35627db892b0006d7b298_SKEY.png",
//         "name": "SKEY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c1515279aeb000627c3a9_SKLlogo%20svg.png",
//         "name": "SKL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614fdcfc8917e40007192e43_photo_2021-09-26_09.56.33-removebg-preview.png",
//         "name": "SKU"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61945f403b4d8400062c2674_Solanium-Icon-DarkGradient160x160.png",
//         "name": "SLIM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c14da279aeb000627c388_smooth-love-potion.png",
//         "name": "SLP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35a9edb892b0006d7b34a_SNT.png",
//         "name": "SNT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3533bdb892b0006d7b215_SNTVT.png",
//         "name": "SNTVT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34933db892b0006d7b083_SNX.png",
//         "name": "SNX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/610924a5dcbfec000685ab54_exchange-white.png",
//         "name": "SOL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183dd03db9c2c0006a8fef2_sol3l.png",
//         "name": "SOL3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f96fdb9c2c0006a7185b_sol3s.png",
//         "name": "SOL3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/615edfbac60b2e0007cd699d_Solrazr-Logomark-Color-500_500.png",
//         "name": "SOLR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6143120ff115020006c83cbe_IMAGE%202021-09-16%2010%3A56%3A51.jpg",
//         "name": "SOLVE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35aba8afb0a00068f7adb_SOUL.png",
//         "name": "SOUL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61528cd48917e4000719dbb2_Sovryn_logo_200_200.png",
//         "name": "SOV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60d196c7db892b0006d955b4_photo_2021-06-21%2018.52.23.jpeg",
//         "name": "SPHRI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60ec04814916a50006c1d14a_SPI_Token.webp",
//         "name": "SPI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34e928afb0a00068f78c6_SPRK.png",
//         "name": "SPRK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35605db892b0006d7b295_SRK.png",
//         "name": "SRK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a48ad6d09f0b00066ebf4d_Serum%20%28SRM%29%20token.png",
//         "name": "SRM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c356bd8afb0a00068f7a2d_STC.png",
//         "name": "STC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34fc78afb0a00068f7902_STEEM.png",
//         "name": "STEEM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60dd1b26486fc50006120e7c_STMX.png",
//         "name": "STMX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c597d7db892b0006d7ec0d_1891623562013_.pic.jpg",
//         "name": "STND"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61309183ddf8990007f69ad3_d24c98f7-1682-417f-b7c9-a09174adcd5d.jpg",
//         "name": "STORJ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c349afdb892b0006d7b0a0_STQ.png",
//         "name": "STQ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c356768afb0a00068f7a20_STRK.png",
//         "name": "STRK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c353b4db892b0006d7b228_STRONG.png",
//         "name": "STRONG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5fa3669ef7b4c20006fb26ef_Stacks%20Logo.png",
//         "name": "STX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c352ff8afb0a00068f798e_SUKU.png",
//         "name": "SUKU"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60e2a316486fc5000612a13b_MicrosoftTeams-image.png",
//         "name": "SUN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6178eb0dfceb6400060e2ac4_logo.png",
//         "name": "SUPER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/605dbfd895d4bc00065755f2_2927.png",
//         "name": "SUSD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3539b8afb0a00068f79a4_SUSHI.png",
//         "name": "SUSHI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e29a8d6d9e00068eba05_sushi3l.png",
//         "name": "SUSHI3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183e2b48d6d9e00068eba2e_sushi3s.png",
//         "name": "SUSHI3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34fa4db892b0006d7b18a_SUTER.png",
//         "name": "SUTER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617d53d8db9c2c0006130b69_Swash%20logo%20icon.png",
//         "name": "SWASH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c356168afb0a00068f7a0c_SWINGBY.png",
//         "name": "SWINGBY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618e22bab26db30006b50003_Kava-Swap-Coin-256px.png",
//         "name": "SWP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5d8b06a6c29cc63d8433b32c_Swipe-logo-circle%20-%20Cha%20Whale.png",
//         "name": "SXP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34ff1db892b0006d7b1a2_SYLO.png",
//         "name": "SYLO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35dfb8afb0a00068f7b55_TARA.png",
//         "name": "TARA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c356958afb0a00068f7a25_TCP.png",
//         "name": "TCP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3611a8afb0a00068f7beb_TEL.png",
//         "name": "TEL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35cd08afb0a00068f7b31_TFUEL.png",
//         "name": "TFUEL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35cb28afb0a00068f7b28_THETA.png",
//         "name": "THETA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616e6812279aeb0006288e92_Final%20_%20icon.png",
//         "name": "TIDAL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34a408afb0a00068f780c_TIME.png",
//         "name": "TIME"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6180f49bdb9c2c00061673dd_Toko%20Token%28TKO%29_logo.png",
//         "name": "TKO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c361828afb0a00068f7c05_TKY.png",
//         "name": "TKY"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c15f3fceb6400072fb3c3_Alien%20Worlds%20%28TLM%29.png",
//         "name": "TLM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/611df3a9f115020006c75194_TLOS%20200.png",
//         "name": "TLOS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60cac5478afb0a00069063b7_TOKO%20logo1%20%281%29.png",
//         "name": "TOKO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5e5c854bf816040008d35f59_Asset_token.png",
//         "name": "TOMO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5f9696b48972bb00065dae44_TONE%20%281%29.jpg",
//         "name": "TONE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616d0e85279aeb000628147e_MicrosoftTeams-image.png",
//         "name": "TORN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614a8d73f115020007f7fb2c_photo_2021-09-22_09.55.57-removebg-preview.png",
//         "name": "TOWER"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34a88db892b0006d7b0c7_TRAC.png",
//         "name": "TRAC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6195fca3b26db3000612f894_Color.png",
//         "name": "TRADE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61370651ddf899000614e304_spaces_-MDuZIVVaKM65WSDT94C_avatar-1596565095853.png",
//         "name": "TRB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c355e6db892b0006d7b28f_TRIAS.png",
//         "name": "TRIAS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6125ad65ddf8990007f41964_TRIBE.png",
//         "name": "TRIBE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35bc6db892b0006d7b372_TRTL.png",
//         "name": "TRTL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617f9e61db9c2c0006153893_TrueFi%20%28TRU%29_logo.png",
//         "name": "TRU"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61b064c2b0aeb80006388a78_2021-12-06%2012.31.56.jpg",
//         "name": "TRVL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34b5fdb892b0006d7b0dd_TRX.png",
//         "name": "TRX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35beddb892b0006d7b374_TT.png",
//         "name": "TT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34b6c8afb0a00068f7839_TUSD.png",
//         "name": "TUSD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616e6ab8fceb64000658d927_MicrosoftTeams-image%20%281%29.png",
//         "name": "TVK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61935ceab26db30006da85fa_MicrosoftTeams-image%20%281%29.png",
//         "name": "TWT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/611a25a9ddf8990007f13ced_TXA_black_sm.png",
//         "name": "TXA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c362f2db892b0006d7b4ca_UBX.png",
//         "name": "UBX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35372db892b0006d7b21a_UBXT.png",
//         "name": "UBXT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5f86d52e25cce60006d9a645_Hyprr%20png.png",
//         "name": "UDOO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c363048afb0a00068f7c57_UMA.png",
//         "name": "UMA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/614af627ddf89900063b125b_UMB.png",
//         "name": "UMB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/619470ea3b4d8400062c2f19_7672-removebg-preview.png",
//         "name": "UNFI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3532edb892b0006d7b210_UNI.png",
//         "name": "UNI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9468d6d9e0006008a9d_uni3l.png",
//         "name": "UNI3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9d68d6d9e0006008aef_uni3s.png",
//         "name": "UNI3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a70e274eabd90006e61308_MicrosoftTeams-image%20%283%29.png",
//         "name": "UNIC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c362bddb892b0006d7b4ba_UNO.png",
//         "name": "UNO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35346db892b0006d7b217_UOS.png",
//         "name": "UOS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c362e2db892b0006d7b4c8_UQC.png",
//         "name": "UQC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5cfdbab438300c4320a531ec_usdc-icon.png",
//         "name": "USDC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35316db892b0006d7b207_USDJ.png",
//         "name": "USDJ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35004db892b0006d7b1a7_USDN.png",
//         "name": "USDN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3538c8afb0a00068f79a3_UST.png",
//         "name": "UST"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34bd8db892b0006d7b0f7_UTK.png",
//         "name": "UTK"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6116313bf115020006046ef6_111-removebg-preview.png",
//         "name": "VAI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60b0b17fdb892b00064dd895_VEED-iconlogo.png",
//         "name": "VEED"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61728591fceb64000623192a_bw-icon-558px-removebg-preview.png",
//         "name": "VEGA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c363348afb0a00068f7c59_VELO.png",
//         "name": "VELO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/613b133af115020006c61285_VET.png",
//         "name": "VET"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b8287b26db3000643c79d_VET3L.png",
//         "name": "VET3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b828fb26db3000643c7aa_VET3s.png",
//         "name": "VET3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5f59a22825cce60006d9359e_Group%20373%20%281%29.png",
//         "name": "VI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5d638c3038300c2b63f7e8a2_VideoCoin_token.png",
//         "name": "VID"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5d916f97134ab727b23a89d5__V-ID%28VIDT%29-token-logo-.png",
//         "name": "VIDT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6195ff43b26db3000612faf1_velas%20symbol%20color%201.png",
//         "name": "VLX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/www/coin/pc/VNX.png",
//         "name": "VNX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35c0b8afb0a00068f7b0c_VOL.png",
//         "name": "VOL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61ad73b87d2d040006315bba_MicrosoftTeams-image.png",
//         "name": "VR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5dfca70e4a338000093e0d8f_Verasity%20Logo%2096%20x%2096.png",
//         "name": "VRA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c359cc8afb0a00068f7ab3_VSYS.png",
//         "name": "VSYS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34bf68afb0a00068f7859_VTHO.png",
//         "name": "VTHO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618cac663b4d840006b1b790_Hex_whitebg.png",
//         "name": "VXV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c363778afb0a00068f7c60_WAN.png",
//         "name": "WAN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c352d9db892b0006d7b203_WAVES.png",
//         "name": "WAVES"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3638bdb892b0006d7b4e2_WAXP.png",
//         "name": "WAXP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5ff7ffd4860ac800068a0236_WBTC.png",
//         "name": "WBTC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c352ce8afb0a00068f7989_WEST.png",
//         "name": "WEST"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c363d28afb0a00068f7c6e_WGP.png",
//         "name": "WGP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/612c7bafddf8990007f5a0f0_WWLogo_TransparentBG.png",
//         "name": "WILD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c363c58afb0a00068f7c6c_WIN.png",
//         "name": "WIN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c3535ddb892b0006d7b218_WIS.png",
//         "name": "WIS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6142f2d8ddf89900063899e0_NCG_CI_2x.png",
//         "name": "WNCG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6192062ab26db300065090a4_MicrosoftTeams-image%20%282%29.png",
//         "name": "WNXM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35d658afb0a00068f7b41_WOM.png",
//         "name": "WOM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/612cecc4ddf8990007f5bfe3_61375ee3-369a-463a-ad03-f1d7c834fe8d.jpg",
//         "name": "WOO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6180b26fdb9c2c00061647fc_WazirX%20%28WRX%29_logo.png",
//         "name": "WRX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616938cbfceb6400072ec361_111%20%283%29.png",
//         "name": "WSIENNA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c36246db892b0006d7b4a2_WTC.png",
//         "name": "WTC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35c1ddb892b0006d7b37c_WXT.png",
//         "name": "WXT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c0316d8afb0a00068f11f7_Logo%20%282%29.png",
//         "name": "XAVA"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c36064db892b0006d7b42b_XCAD.png",
//         "name": "XCAD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616c14ec279aeb000627c394_chia_logo.png",
//         "name": "XCH"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35e0e8afb0a00068f7b5a_XCUR.png",
//         "name": "XCUR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34fe5db892b0006d7b1a1_XDB.png",
//         "name": "XDB"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c360038afb0a00068f7bb7_XDC.png",
//         "name": "XDC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61b0920137b6c5000677de92_10791.png",
//         "name": "XEC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617a581bdb9c2c0006e1ea90_Exeedme_Icon.png",
//         "name": "XED"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c363fb8afb0a00068f7c79_XEM.png",
//         "name": "XEM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c35db58afb0a00068f7b4c_XHV.png",
//         "name": "XHV"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34c268afb0a00068f7867_XLM.png",
//         "name": "XLM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5c86109438300c31d25f7040_monero-token.png",
//         "name": "XMR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/613afce3ddf89900066e1592_Chronicle%20Logo-1600x1600-Transparent.png",
//         "name": "XNL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61223cbfddf8990007f31a5d_XPR-Icon-200x200.png",
//         "name": "XPR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/613eeea8f115020006c7198e_XPRT.png",
//         "name": "XPRT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34c418afb0a00068f786d_XRP.png",
//         "name": "XRP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6185f9018d6d9e0006008a83_xrp3L.png",
//         "name": "XRP3L"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6183a7228d6d9e00068e73ab_xrp3s.png",
//         "name": "XRP3S"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c350118afb0a00068f790f_XSR.png",
//         "name": "XSR"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/61a4ab464eabd90006e4aa73_xHashtag%20%28XTAG%29.png",
//         "name": "XTAG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/618b35bc3b4d840006d9c709_XTM.png",
//         "name": "XTM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34ea68afb0a00068f78c7_XTZ.png",
//         "name": "XTZ"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617670c8fceb64000624b31f_logo-%282%29.png",
//         "name": "XVS"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c356328afb0a00068f7a11_XYM.png",
//         "name": "XYM"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34c50db892b0006d7b111_XYO.png",
//         "name": "XYO"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60cac746db892b0006d89c27_Logo-YFDAI-Icon-Blue%20%282%29.png",
//         "name": "YFDAI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5f5b1b2525cce60006d93b74_yfi-192x192.png",
//         "name": "YFI"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/6131c63ff1150200068cdb28_Ygg_Icon.png",
//         "name": "YGG"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/616528b38917e40006589443_Logo-Yield-Bittrex.png",
//         "name": "YLD"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c36477db892b0006d7b4f6_YOP.png",
//         "name": "YOP"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60bdd03f8afb0a00068ec241_0Aji5pVm.png",
//         "name": "ZCX"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/5d1b330ac29cc606c485e20e_Zcash-%28ZEC%29-token-logo-.png",
//         "name": "ZEC"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c355f5db892b0006d7b294_ZEE.png",
//         "name": "ZEE"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c364aa8afb0a00068f7c9c_ZEN.png",
//         "name": "ZEN"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c364c58afb0a00068f7ca1_ZIL.png",
//         "name": "ZIL"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/617655a7279aeb000628fdb4_MicrosoftTeams-image.png",
//         "name": "ZKT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60e549f24916a50006c0d8b1_zortlogo.png",
//         "name": "ZORT"
//     },
//     {
//         "currentSRC": "https://assets-currency.kucoin.com/60c34c5edb892b0006d7b115_ZRX.png",
//         "name": "ZRX"
//     }
// ]
