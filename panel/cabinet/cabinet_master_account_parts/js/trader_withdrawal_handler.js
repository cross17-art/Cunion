
class TraderWithdrawalHandler {

    async ProceedTraderWithdrawal(){
        let withdrawalAmount = document.querySelector('[name=trader_withdrawal_amount]').value;
        let withdrawalAddress = document.querySelector('[name=trader_withdrawal_address]').value;

        let url = "https://cunion.io/panel/cabinet/php_scripts/create_trader_withdrawal_transaction.php" // TODO

        if(withdrawalAmount > 25){
            await fetch(url, {
                method: 'POST',
                body: JSON.stringify({
                    trader_withdrawal_amount: withdrawalAmount,
                    trader_withdrawal_address: withdrawalAddress,
                })

            }).then((rsp) => {
                return rsp.json();
            }).then((data) => {
                if(data.status == 'success'){
                    trd_notification("success", "Withdrawal request was received by our server. We will contact you asap.");
                    setTimeout(()=>{
                        window.location.reload();
                    },1000)
                } else if (data.status == 'failed'){
                    trd_notification('warning', 'Transaction Creation Failed')
                    if(data.msg == 'thread_exist'){
                        trd_notification('danger', 'Thread found in request');
                    }
                }
                return data
            }).catch((err) => {
                alert("something is wrong")
            })
        } else {
            trd_notification('warning', 'Minimum withdrawal amount is 25 USDT')
        }
    }
}

trader_withdrawal_handler = new TraderWithdrawalHandler();
