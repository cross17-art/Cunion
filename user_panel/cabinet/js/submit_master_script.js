
SubmitMasterSpecification = async () => {
    let telegram = document.querySelector("#telegram").value;
    let usingDeposit = document.querySelector("#using_deposit").value;
    let reqDeposit = document.querySelector("#req_deposit").value;
    let tradeType =  document.querySelector("#trade_type").value;
    let averageTrades = document.querySelector("#average_trades").value;
    let baseAsset = document.querySelector("#base_asset").value;

    if (telegram === "" || usingDeposit === "" || reqDeposit === "" || tradeType === "" || averageTrades === "" || baseAsset === "") {
        ShowNotification("Please enter all fields");
    } else {
        let body = {
            using_deposit:usingDeposit,
            req_deposit: reqDeposit,
            telegram: telegram,
            trade_type: tradeType,
            average_trades: averageTrades,
            base_asset: baseAsset
        }

        console.log("Sending to server:", body);

        let url = 'https://cunion.io/client/copy_server_api/kucoin/submit_kucoin_master_specifications.php';

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
            location.reload();
            return data;
        }).catch((err) => {
            console.log(err);
        })
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
    url = 'https://cunion.io/client/copy_server_api/kucoin/drop_kucoin_master.php';
    fetch(url).then((rsp) => {
        return rsp.json()
    }).then((data) => {
        console.log(data);
        location.reload();
    })
}

