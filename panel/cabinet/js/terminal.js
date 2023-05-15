
document.getElementById("buy_button").addEventListener("click", function(event){
    event.preventDefault()
});


document.getElementById("sell_button").addEventListener("click", function(event){
    event.preventDefault()
});

console.log("Preparing the terminal...");

function Buy() {

    console.log("Buy pressed...");

    let data = {
        lotSize: 0,
        symbol: ""
    }

    data.lotSize = document.querySelector("input[name=lot_size]").value;
    data.symbol = document.querySelector("input[name=symbol]").value;

    fetch('https://cunion.io/panel/cabinet/binance_api/terminal_api/buy_market.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body:JSON.stringify(data)
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
    });
}

function Sell(){
    console.log("Sell pressed...");

    let data = {
        lotSize: 0,
        symbol: ""
    }

    data.lotSize = document.querySelector("input[name=lot_size]").value;
    data.symbol = document.querySelector("input[name=symbol]").value;



    fetch('https://cunion.io/panel/cabinet/binance_api/terminal_api/sell_market.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body:JSON.stringify(data)
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
    });
}

function ShowAllDeals(){
    console.log("Show all deals by symbol");
}

function ShowAllOrders(){
    console.log("Show all orders by symbol") ;
    console.log("Sell pressed...");

    let data = {
        lotSize: 0,
        symbolsArray: ""
    }

    data.symbolsArray = document.querySelector("input[name=symbol]").value;

    console.log("sending data", JSON.stringify(data));

    fetch('https://cunion.io/panel/cabinet/binance_api/terminal_api/get_all_orders_by_symbol.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body:JSON.stringify(data)
    }).then((response) => {
        return response.json();
    }).then((data) => {
        debugger;
        console.log(data);
    });
}