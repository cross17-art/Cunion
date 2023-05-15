
SubmitMasterSpecification = async () => {
    let telegram = document.querySelector("#telegram").value;
    let reqDeposit = document.querySelector("#req_deposit").value;
    let baseAsset = document.querySelector("#base_asset").value;
    let tradeType =  document.querySelector("#trade_type").value;
    let tradeDirection = document.querySelector("#trade_direction").value;
    let shortDescription  = document.querySelector("#short_dsr").value

    if(user_balance.total < 5){
        trd_notification('warning', 'Balance is too low')
    } else {
        if (!FormValidation() ) {
            ShowNotification("Please enter all required fields");
        } else {
            let body = {
                using_deposit:0,
                req_deposit: reqDeposit,
                telegram: telegram,
                base_asset: baseAsset,
                trade_type: tradeType,
                trade_direction: tradeDirection,
                average_trades: 0,
                dsr: shortDescription
            }

            console.log("Sending to server:", body);

            let url = 'https://cunion.io/panel/copy_server_api/kucoin/submit_kucoin_master_specifications.php';

            let result = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            }).then((rsp) => {
                return rsp.json()
            }).then((data) => {
                console.log(data);
                if(data.status == 'failed'){
                    trd_notification("warning", 'Trader submission failed');
                    if(data.msg == 'thread_exist'){
                        trd_notification("danger", 'Thread found in request');
                    }
                } else if(data.status == 'success') {
                    trd_notification("success", 'Success become Trader');
                    setTimeout(()=>{
                        location.reload();
                    }, 1500)

                }

                return data;
            }).catch((err) => {
                console.log(err);
            })
        }
    }


}

function ShowNotification(msg) {
    let message = msg
    let type = "warning"
    let duration = "5000"
    let ripple = true
    let dismissible = false
    let positionX = "right"
    let positionY = "top"
    window.notyf.open({
        type,
        message,
        duration,
        ripple,
        dismissible,
        position: {
            x: positionX,
            y: positionY
        }
    });
}

StopMaster = (masterID) => {
    console.log("Drop master:" + masterID);
    let url;
    url = 'https://cunion.io/panel/copy_server_api/kucoin/drop_kucoin_master.php';
    fetch(url).then((rsp) => {
        return rsp.json()
    }).then((data) => {
        
        console.log(data);
        location.reload();
    })
}

function SwitchBaseAsset(baseAsset){
    let minDepInput = document.querySelector('#req_deposit');
    let minDepLabelSpan = document.querySelector('[min-dep-label-span]');
    let min_dep_input = document.querySelector("#req_deposit");
    if(baseAsset === "USDT"){
        minDepInput.placeholder = "Minimum Required Deposit USDT";
        minDepLabelSpan.innerHTML = "$";
        min_dep_input.removeAttribute('disabled')
    } else if(baseAsset === "BTC"){
        minDepInput.placeholder = "Minimum Required Deposit BTC";
        minDepLabelSpan.innerHTML = "₿";
        min_dep_input.removeAttribute('disabled')
    } else if(baseAsset == 'none'){
        minDepInput.placeholder = "Minimum Required Deposit";
        minDepLabelSpan.innerHTML = "";
        min_dep_input.value = "";
        min_dep_input.setAttribute('disabled', 'true');
    }
    console.log("Asset switched");
}

function OnChange(){
    console.log(event.target);
    let value = event.target.value;
    if(value == 'none'){
        event.target.parentElement.querySelector('.input-group-text').classList.remove("badge-soft-success")
    } else {
        event.target.parentElement.querySelector('.input-group-text').classList.add("badge-soft-success")
        event.target.parentElement.querySelector('.input-group-text').classList.remove("badge-soft-danger")
    }
}

function MinDepInput() {
    let symbol = event.key;
    //
    // let symbolRegexp = /[ $!()#-&@;\'"`<>?@()]/g
    // let workRegExpRus =/[а-яА-Я]/g
    // let workRegExpEng =/[a-zA-Z]/g

    if(!event.target.value.includes('.') && symbol === '.'){

    } else {
        if (
            (event.keyCode >= 65 && event.keyCode <= 90) ||
            (event.keyCode >= 106 && event.keyCode <= 111) ||
            (event.keyCode >= 186) || (event.shiftKey == true)
        ) {
            event.preventDefault();
        }
    }
}



document.addEventListener("DOMContentLoaded", ()=>{
    document.querySelectorAll('[highliting]').forEach((formElem) => {
        formElem.addEventListener("change", OnChange);
    })
})




function FormValidation(){

    let result = true;
    document.querySelectorAll('[required="true"]').forEach((requiredInput) => {
        let value = requiredInput.value;
        if (value == null || value == 'none' || (requiredInput.id == "req_deposit" && value <= 0)){
            HighlightDanger(requiredInput);
            result = false;
        }
    })
    return result;
}

function HighlightDanger(inputElem){
    let label = inputElem.parentElement.querySelector('.input-group-text')
    label.classList.remove("badge-soft-success");
    label.classList.add("badge-soft-danger");
}