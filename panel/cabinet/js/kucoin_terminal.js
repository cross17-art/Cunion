Kucoin_ClosePosition = async (event) => {
    console.log("Closing kucoin position");
    console.log(event);

    let elem = event.target;

    let assetName = elem.getAttribute('asset_name');
    let assetAmount = elem.getAttribute('asset_amount');
    let sale_to = elem.getAttribute('sale_to');
    //let index=elem.getAttribute('index');

    let url = "https://cunion.io:2087/sell_kucoin";
    //let url = "trd_nodejs/kucoin/sell?src=key";
//http://159.89.169.146 :3000/sell
//     0.00673034
//     STRONG

    let result = await fetch(url, {
        method: 'POST',


        body: JSON.stringify({
            asset_name: assetName,
            asset_amount: assetAmount, //Perhaps close all // TODO
            sale_to: sale_to,
            user_id: user.id
        })

    }).then((rsp) => {
        return rsp.json();
    }).then((data) => {
        //TODO remove element from table.
        console.log(data.code);
        return data
    }).catch((err) => {
        console.log({
            msg: "something is wrong while closing the possition",
            err: err
        })
    })

    if (result.code == '200000') {
        elem.parentElement.parentElement.parentElement.remove()

        var message = "Coin " + assetName + " was sold. Amount:" + assetAmount;
        var type = "default"
        var duration = "5000"
        var ripple = true
        var dismissible = false
        var positionX = "right"
        var positionY = "top"
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


        console.log("all ok")
    } else {

        var message = 'Order size below the minimum required';
        var type = "warning"
        var duration = "5000"
        var ripple = true
        var dismissible = false
        var positionX = "right"
        var positionY = "top"
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

    let position = search_position(assetName);
    user_balance.balance.splice(position, 1);
    // document.getElementById("tbodytikers").children[index].remove();
    //DisplayTickers()
}

function search_position(ticker) {
    for (var i = 0; i < user_balance.balance.length; i++) {
        let position = user_balance.balance[i].nameTicker.indexOf(ticker);
        if (position != -1) {
            console.log(i)
        }
        // for(var i =0 ;i<user_account.balance.balance_USDT.msg.length;i++){
        //     let position=user_account.balance.balance_USDT.msg[i].ticker.indexOf(ticker);
        //     if(position!=-1){
        //         return i
        //     }
        // }
    }
}
