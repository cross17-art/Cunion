SubmitTraderForm = () => {
    event.preventDefault();
    console.log("Submit Trader form")


    let traderEmail = document.querySelector("input[name=trader_email]").value;
    let traderTelegram = document.querySelector("input[name=trader_telegram]").value;
    let traderUsingDeposit = document.querySelector("input[name=trader_using_deposit]").value;
    let traderMinRequiredDeposit = document.querySelector("input[name=trader_min_required_deposit]").value;
    let traderMessage = document.querySelector("textarea[name=trader_message]").value;

    let body = {
        trader_email: traderEmail,
        trader_telegram: traderTelegram,
        trader_using_deposit: traderUsingDeposit,
        trader_min_required_deposit: traderMinRequiredDeposit,
        trader_message: traderMessage
    }


    let url = 'https://cunion.io/panel/php_scripts/receive_trader_from_request.php'

    fetch(url, {
        method:'POST',
        mode:"no-cors",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(body)
    }).then((rsp) => {
        return rsp.text();
    }).then((data) => {
        console.log(data);
        return data;
    })

    console.log(body);

}

SubmitInvestorForm = () => {
    event.preventDefault();
    console.log("Submit investor form")
}

