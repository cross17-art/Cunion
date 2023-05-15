class ReferralWithdrawalHandler {

    async ProceedReferralWithdrawal(){
        let withdrawalAmount = document.querySelector('[name=ref_withdrawal_amount]').value;
        let withdrawalAddress = document.querySelector('[name=ref_withdrawal_address]').value;

        let url = "https://cunion.io/panel/cabinet/php_scripts/create_referral_withdrawal_transaction.php"

        if(withdrawalAmount > 25){
            await fetch(url, {
                method: 'POST',
                body: JSON.stringify({
                    ref_withdrawal_amount: withdrawalAmount,
                    ref_withdrawal_address: withdrawalAddress,
                })

            }).then((rsp) => {
                return rsp.json();
            }).then((data) => {

                if(data.status == 'success'){
                    trd_notification("success", "Withdrawal request was received by our server. We will contact you asap.");
                    setTimeout(()=>{
                        window.location.reload();
                    },1000)
                } else if(data.status == 'failed'){
                    trd_notification('warning', 'failed to create the transaction');
                    if(data.msg == 'thread_exist'){
                        trd_notification('danger', 'thread found in request');
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

referral_withdrawal_handler = new ReferralWithdrawalHandler();