document.querySelectorAll(".form-check-input").forEach((item) => {
    item.addEventListener('change', (event) => {
        let checkBox = event.target;
        let state = event.target.checked
        console.log(state);

        let masterTR = checkBox.closest('[master-template-tr]');
        let scaleInput = masterTR.querySelector('[scale_coefficient]')

        let scaleCoefficient = scaleInput.value;
        let masterEmail = checkBox.getAttribute('master_email');

        if (state === true) {
            EnableBot(masterEmail, scaleCoefficient);
        } else {
            DisableBot(masterEmail);
        }
    })
});


async function EnableBot(masterEmail) {

    let button = event.target;

    let scaleCoefficient = button.closest(".modal-dialog").querySelector("[scale_coefficient]").value;

    if (isNaN(parseFloat(scaleCoefficient))) {
        ShowScaleNotification("Please check the scale coefficient it should be a number")
    } else {
        if (parseFloat(scaleCoefficient) <= 0) {
            ShowScaleNotification("Please check the scale coefficient it should more then zero")
        } else {
            console.log("Enabling bot");


            let info_window  = event.target.closest(".modal-dialog").querySelector('[subscription_info_window]');
            let await_window  = event.target.closest(".modal-dialog").querySelector('[subscription_await_window]');
            let close_button = event.target.closest(".modal-dialog").querySelector("[close_subscribe]");
            let countDown = event.target.closest(".modal-dialog").querySelector("[connection_timer]")

            info_window.style.display = "none";
            await_window.style.display = "block";
            countDown.innerHTML = "10";

            console.log({
                masterEmail: masterEmail,
                scale: scaleCoefficient
            })

            let url = 'https://cunion.io/client/copy_server_api/kucoin/add_kucoin_connection.php';

            await fetch(url, {

                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    master_email: masterEmail,
                    scale: scaleCoefficient,
                })

            }).then((rsp) => {
                return rsp.json()
            }).then((data) => {


                let countdownTimer = setInterval(() => {
                    let time = parseInt(countDown.innerHTML);
                    time--;
                    countDown.innerHTML = time.toString();
                }, 1000)

                let timer = setTimeout(async function CheckConnection(){
                    if(await IsConnectedToMaster(masterEmail)){
                        console.log("user is connected");
                        ShowConnectedNotification("You were successfully connected to master")
                        clearTimeout(timer);
                        clearInterval(countdownTimer);

                        setTimeout(()=>{
                            location.reload();
                        }, 2000)
                    } else {
                        console.log("user is not connectd");
                        timer = setTimeout(CheckConnection, 2000)
                    }
                },2000)

                console.log(data);
            }).catch((err) => {
                console.log("Some error while connection the user");
                console.log(err)
            })
        }
    }
}


async function DisableBot(masterEmail) {

    console.log("Disabling Bot " + masterEmail);

    let info_window  = event.target.closest(".modal-dialog").querySelector('[unsubscription_info_window]');
    let await_window  = event.target.closest(".modal-dialog").querySelector('[unsubscription_await_window]');
    let close_button = event.target.closest(".modal-dialog").querySelector("[close_unsubscribe]");
    let countDown = event.target.closest(".modal-dialog").querySelector("[disconnection_timer]")

    info_window.style.display = "none";
    await_window.style.display = "block";

    countDown.innerHTML = "10";

    let url = 'https://cunion.io/client/copy_server_api/kucoin/remove_kucoin_connection.php';

    await fetch(url, {

        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            master_email: masterEmail,
        })

    }).then((rsp) => {
        return rsp.json()
    }).then((data) => {

        let countdownTimer = setInterval(() => {
            let time = parseInt(countDown.innerHTML);
            time--;
            countDown.innerHTML = time.toString();
        }, 1000)

        let timer = setTimeout(async function CheckConnection(){
            if(await IsConnectedToMaster(masterEmail)){
                console.log("user is connected");
                timer = setTimeout(CheckConnection, 2000)
            } else {
                console.log("user is not connectd");

                ShowDisconnectedNotification("You were successfully disconnected from master")
                clearTimeout(timer);
                clearInterval(countdownTimer);

                setTimeout(()=>{
                    location.reload();
                }, 2000)
            }
        },2000)

        console.log(data);
    }).catch((err) => {
        console.log("Some error while connectin the user");
        console.log(err)
    })
}


IsConnectedToMaster = async (masterEmail) => {
    let url = "https://cunion.io/client/copy_server_api/kucoin/check_follower_to_master_connection.php";
    let result = await fetch(url,{
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json'
        },
        body: JSON.stringify({master_email:masterEmail})
    }).then((response)=>{
        return response.json();
    }).then((data) => {
        console.log(data);
        if(data.status === 'success'){
            return data.msg === 'connection_exist';
        } else {
            return false;
        }
    })

    return await result;
}



function ShowScaleNotification(msg) {
    let message = msg
    let type = "danger"
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



function ShowDisconnectedNotification(msg) {
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



function ShowConnectedNotification(msg) {
    let message = msg
    let type = "success"
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


