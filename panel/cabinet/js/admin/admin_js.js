

async function EnableUser(userEmail){

    if(await CheckAdminPass()){
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
    } else {
        alert("incorrect admin pass");
    }
}

async function DisableUser(userEmail){

    if(await CheckAdminPass()){
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
    } else {
        alert("incorrect admin pass");
    }
}


var adminPass = "";
async function CheckAdminPass(){
    let url = 'https://cunion.io/panel/copy_server_api/admin/check_admin_pass.php'
    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            server_key: "trd_admin_key",
            admin_pass:adminPass

        })
    }).then((rsp) => {
        return rsp.json();
    }).then((response) =>{
        console.log(response)
        if(response.status === 'success'){
            return true;
        } else {
            return  false;
        }
    }).catch((err) => {
        console.log(err);
    })

    return result;
}


async function ApproveReferralTransaction(referralTransactionId){
    console.log("approve referral transaction");
    let url = 'https://cunion.io/panel/copy_server_api/admin/admin_controller.php'
    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action:'approve_referral_transaction',
            server_key: "trd_admin_key",
            referral_transaction_id:referralTransactionId

        })
    }).then((rsp) => {
        return rsp.json();
    }).then((response) =>{
        console.log(response)
        if(response.status == 'success'){
            location.reload();
        }else {
            alert("Something is wrong")
        }
    }).catch((err) => {
        console.log(err);
    })

}

async function  ApproveTraderTransaction(traderTransactionId){
    console.log("approve referral transaction");
    let url = 'https://cunion.io/panel/copy_server_api/admin/admin_controller.php'
    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action:'approve_trader_transaction',
            server_key: "trd_admin_key",
            trader_transaction_id:traderTransactionId

        })
    }).then((rsp) => {
        return rsp.json();
    }).then((response) =>{
        console.log(response)
        if(response.status == 'success'){
            location.reload();
        } else {
            alert("Something is wrong")
        }
    }).catch((err) => {
        console.log(err);
    })
}



async function SetAdminPass(pass){

        let url = 'https://cunion.io/panel/copy_server_api/admin/check_admin_pass.php'
        let result = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                server_key: "trd_admin_key",
                admin_pass:pass
            })
        }).then((rsp) => {
            return rsp.json();
        }).then((response) =>{
            console.log(response)
            if(response.status === 'success'){
                return true;
            } else {
                return  false;
            }
        }).catch((err) => {
            console.log(err);
        })

        return result;
}

async function SendDebtorNotifications(){
    let url = 'https://cunion.io/panel/cabinet/php_scripts/debt-notifications.php'
    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
    }).then((rsp) => {
        return rsp.text();
    }).then((response) =>{
        console.log(response)
        alert(response);
        // if(response.status === 'success'){
        //     return true;
        // } else {
        //     return  false;
        // }
    }).catch((err) => {
        console.log(err);
    })

    return result;
}



