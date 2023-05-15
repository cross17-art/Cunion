

async function EnableUser(userEmail){
    let url = 'https://cunion.io/panel/copy_server_api/admin/admin_controller.php'
    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action:'enable_user',
            server_key: "trd_admin_key",
            user_email:userEmail})
    }).then((rsp) => {
        return rsp.json();
    }).then((response) =>{
        console.log(response)
        if(response.status == 'success'){
            location.reload();
        }
    }).catch((err) => {
        console.log(err);
    })
}

async function DisableUser(userEmail){
    let url = 'https://cunion.io/panel/copy_server_api/admin/admin_controller.php'
    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action:'disable_user',
            server_key: "trd_admin_key",
            user_email:userEmail

        })
    }).then((rsp) => {
        return rsp.json();
    }).then((response) =>{
        console.log(response)
        if(response.status == 'success'){
            location.reload();
        }
    }).catch((err) => {
        console.log(err);
    })
}



async function ApproveReferralTransaction($referralTransactionId){
    console.log("approve referral transaction");
    debugger;

}

async function  ApproveTraderTransaction($traderTransactionId){
    console.log("approve referral transaction");
    debugger;
}


