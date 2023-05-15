


//make transaction coinpayments
Create_total_bill_transaction =async ()=>{
    document.querySelector('#payment_spinner').style.display = "block";
    let amount = parseInt(document.querySelector('[total-bill]').getAttribute('total-bill'));

    if(amount < 0.5){
        alert("Too small balance")
    } else {
        console.log("Proceed Payment:" + amount + " USDT");
        await fetch('https://cunion.io/panel/cabinet/payments/php/coin_payments.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: "user_email=" + user.email + "&amount=" + amount

        }).then((response) => {
            return response.json();
        }).then((data)=>{
            console.log(data)
            let result = data.result;
            console.log(data)
            AddTransactionToDB(result).then((rsp) => {
                if(rsp.status == 'failed'){
                    alert("Some request is wrong")
                } else {
                    DisplayTransaction(result);
                }

            });
        })
    }
}


function DisplayTransaction(data) {
    document.querySelector('#payment_spinner').style.display = "none";
    document.querySelector('[transactoin-data-block]').style.display = "block";
    document.querySelector('[transactoin-data-block] > div > [address]').innerHTML = data.address;
    document.querySelector('[transactoin-data-block] > div > [amount]').innerHTML = data.amount;
    document.querySelector('[transactoin-data-block] > div > [status_url]').innerHTML = "<a target='_blank' href=" + data.status_url + ">Status url</a>";
    document.querySelector('[transactoin-data-block] > div > [txn_id]').innerHTML = "" + data.txn_id;
    let url = data.address;
    QRCode.toCanvas(document.querySelector("#qr"), data.address, function (error) {
        if (error) console.error(error)
        console.log('success!');
    })
}

async function AddTransactionToDB(data){
    const url = "https://cunion.io/panel/cabinet/payments/php/create_coinpayments_transaction.php"
    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then((rsp) => {
        return rsp.json();
    }).then((data) => {
        console.log(data);
        return data;
    });

    return result;
}