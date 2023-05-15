SubmitTraderForm = () => {
    event.preventDefault();
    console.log("Submit Trader form")

    // let form = event.target.closest("form");
    // let validationInputs = form.querySelector("[aria-required=true]")
    // let validationResult = true;
    // validationInputs.forEach((input) => {
    //     if(input.value === "" || input.value === null){
    //         validationResult = false;
    //         input.value = "this field is required";
    //     }
    // })
    //

    let form = event.target.closest("form");
    let validationInputs = form.querySelectorAll("[aria-required=true]")
    let validationResult = true;
    validationInputs.forEach((input) => {
        if(input.value === "" || input.value === null){
            if(lng === 'eng'){
                input.placeholder = "This field is required";
            } else {
                input.placeholder = "Обязательное поле";
            }

            input.closest(".input-field").classList.add("input-focused");
            validationResult = false;
        }
    })

    if(validationResult) {

        let traderEmail = document.querySelector("input[name=trader_email]").value;
        let traderTelegram = document.querySelector("input[name=trader_telegram]").value;
        let traderUsingDeposit = document.querySelector("input[name=trader_using_deposit]").value;
        let traderMinRequiredDeposit = document.querySelector("input[name=trader_min_required_deposit]").value;
        let traderMessage = document.querySelector("textarea[name=trader_message]").value;
        let traderType = document.querySelector('[trade-type-select][lng=' + lng + ']').querySelector('select[name=trade_type]').value;
        let traderDealNumber = document.querySelector("input[name=average_deal_count]").value;



        let body = {
            trader_email: traderEmail,
            trader_telegram: traderTelegram,
            trader_using_deposit: traderUsingDeposit,
            trader_min_required_deposit: traderMinRequiredDeposit,
            trader_message: traderMessage,
            trade_type: traderType,
            number_of_trades: traderDealNumber
        }

        console.log(body);

        let url = 'https://cunion.io/front_registration_forms/receive_trader_from_request.php'

        fetch(url, {
            method:'POST',
            mode:"no-cors",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(body)
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log(data);
            if(data.status === "success"){
                document.querySelector("#trader-form").style.display = "none";
                document.querySelector("[thank-msg-trader][lng=" + lng + "]").style.display = "block"
                document.querySelector("[thank-msg-trader][lng=" + lng + "]").scrollIntoView({block: "center", behavior: "smooth"})
                setTimeout(()=>{
                    document.querySelector("[thank-msg-trader][lng=" + lng + "]").style.opacity = "1";
                }, 100)
                return data;
            } else {
                if(lng === "eng"){
                    alert("Some data is wrong. Please try again");
                } else {
                    alert("Данные введены не верно. Пожалуйста проверьте данные");
                }
            }

        })
    }
}


SubmitInvestorForm = () => {
    event.preventDefault();
    console.log("Submit investor form");

    let form = event.target.closest("form");
    let validationInputs = form.querySelectorAll("[aria-required=true]")
    let validationResult = true;
    validationInputs.forEach((input) => {
        if(input.value === "" || input.value === null){
            if(lng == 'eng'){
                input.placeholder = "This field is required";
            } else {
                input.placeholder = "Обязательное поле";
            }
            input.closest(".input-field").classList.add("input-focused");
            validationResult = false;
        }
    })


    if(validationResult){
        let investorEmail = document.querySelector("input[name=investor-email]").value;
        let investorTelegram = document.querySelector("input[name=investor-telegram]").value;
        let investorMessage = document.querySelector("textarea[name=investor-message]").value;

        let body = {
            investor_email: investorEmail,
            investor_telegram: investorTelegram,
            investor_msg: investorMessage
        }

        console.log(body);

        let url = 'https://cunion.io/front_registration_forms/receive_investor_form_request.php'

        fetch(url, {
            method:'POST',
            mode:"no-cors",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(body)
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log(data);
            if(data.status === "success"){
                document.querySelector("#investor-form").style.display = "none";
                document.querySelector("[thank-msg-investor][lng=" + lng + "]").style.display = "block"
                document.querySelector("[thank-msg-investor][lng=" + lng + "]").scrollIntoView({block: "center", behavior: "smooth"})
                setTimeout(()=>{
                    document.querySelector("[thank-msg-investor][lng=" + lng + "]").style.opacity = "1";
                }, 100)
            } else {
                if(lng === "eng"){
                    alert("Some data is wrong. Please try again");
                } else {
                    alert("Данные введены не верно. Пожалуйста проверьте данные");
                }

            }

            return data;
        })

    }
}

