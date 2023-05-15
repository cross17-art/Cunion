Kucoin_ClosePosition = async (event) => {
    console.log("Closing kucoin position");
    console.log(event);

    let elem = event.target;

    let assetName = elem.getAttribute('asset_name');
    let assetAmount = elem.getAttribute('asset_amount');
    //let index=elem.getAttribute('index');

    let url = "https://cunion.io:8000/sell_kucoin?key=1";
    //let url = "trd_nodejs/kucoin/sell?src=key";
//https://cunion.io:8000/sell
    let result = await fetch(url, {
        method: 'POST',
      

        body: JSON.stringify({
            asset_name: assetName,
            asset_amount: assetAmount, //Perhaps close all // TODO
            email: user.email
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

    if(result.code=='200000'){
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
    }
    else{
         console.log(result)
    }

    let position=search_position(assetName);
    user_account.balance.balance_USDT.msg.splice(position,1);
   // document.getElementById("tbodytikers").children[index].remove();
   //DisplayTickers()
}
function search_position(ticker){
    for(var i =0 ;i<user_account.balance.balance_USDT.msg.length;i++){
        let position=user_account.balance.balance_USDT.msg[i].ticker.indexOf(ticker);
        if(position!=-1){
            return i
        }
    }
}
