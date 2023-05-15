console.log("Social inputs enabled");


function SubmitSocials() {
    console.log("Submitting socials");

    let telegram = document.querySelector('input[name=telegram]').value;
    let twitter = document.querySelector('input[name=twitter]').value;
    let vk_id = document.querySelector('input[name=vk_id]').value;


    fetch('https://cunion.io/panel/php_scripts/set_socials.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            telegram: telegram,
            twitter: twitter,
            vk_id: vk_id
        })
    }).then((response) => {
        return response.json();// TODO json
    }).then((data) => {
        console.log(data);
        ProceedSocialResponse(data);

    });
}


function ProceedSocialResponse(response) {
    if (response.status === 'success') {
        let tgResult = response.tg_result;
        let twResult = response.tw_result;
        let vkResult = response.vk_result;
        ShowNotificationForSocialResponse(tgResult);
        ShowNotificationForSocialResponse(twResult);
        ShowNotificationForSocialResponse(vkResult);


        if (tgResult.status === 'success' && twResult.status === 'success' && vkResult.status === 'success') {
            setTimeout(() => {
                location.reload()
            }, 2000);
        }
    } else {
        notify("danger", "Some Critical Error on the server. Please contact support")
    }
}


function ShowNotificationForSocialResponse(socialResult) {
    let status = socialResult.status;
    let socialTitle = socialResult.social_title;
    let social_id = socialResult.social_id;

    if (status === 'success') {
        let notifyMsg = socialTitle + " has been set successfully to:" + social_id
        notify('success', notifyMsg);
    } else if (status === 'failed') {
        let notifyMsg = "Can not save " + social_id + ". " + socialResult.msg;
        if (socialResult.msg === "record_exist_in_other_user") {
            notifyMsg += "\n Record already exist";
        }
        notify('danger', notifyMsg);
    }
}
