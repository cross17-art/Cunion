
var email;
var pass;
function RegisterTester(){

    <!--Pixel Vk API retargeting-->
    try {
        VK.Retargeting.Init('VK-RTRG-1208681-amnbC')
        VK.Retargeting.Hit();
        VK.Goal('complete_registration')
        let pixel = new VK.Pixel('VK-RTRG-1208681-amnbC');
        pixel.Goal('complete_registration');
        console.log("VK Pixel Sended")
    }catch (err){
        console.log(err)
    }
    ym(87462220,'reachGoal','registration');
    //--------------------------

    console.log("Register");
    RunLoader();

    let email = document.querySelector("#Email").value;
    let pass = document.querySelector("#Password").value;
    let telegram = document.querySelector("#Telegram").value;
    let refUserId = ref_handler.GetRefUserIdFromCookie();

    if(email.length !=0 && pass.length >= 4 && !(email.includes('\'')) ){

        if(validateEmail(email)){
            SendRegistrationRequest(email, pass, telegram, refUserId);

        }else{
            notify("warning","Invalid mail")
            StopLoader();
        }

    }
    else{
        if(email.length !=0){
            notify("danger","Fill in the fields")
        }else{
            notify("danger","The password must consist of at least 4 characters")

        }
        StopLoader();
    }


}

function SendRegistrationRequest(testerEmail, testerPass, testertelegramm, refUserId){


    fetch('https://cunion.io/panel/php_scripts/register_tester.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "user_email=" + testerEmail + "&user_pass=" + testerPass + "&user_telegram=" + testertelegramm + "&ref_user_id=" + refUserId
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
        if(data.status === 'reg_success'){
            document.querySelector("#registration_block").style.display = 'none';
            email = testerEmail;
            LoginByEmailPass(testerEmail, testerPass);
        } else {
            if(data.message === 'User already exist'){
                alert("user already exist by this email");
                StopLoader()
            } else {
                alert("Something is wrong");
                StopLoader()
            }
        }
    });
}

function LoginByEmailPass(email, pass) {


    console.log("try to login via email:" + email + ", pass:" + pass);

    document.querySelector(".alert-danger").style.display = "none";
    document.querySelector(".alert-success").style.display = "none";


    fetch('https://cunion.io/panel/php_scripts/log_in.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "user_email=" + email + "&user_pass=" + pass
    }).then((response) => {
        return response.json();
    }).then((data) => {
        if(data.code === 1){
            ShowWelcomeBlock();
        }
    });
}


function RunLoader() {
    document.querySelector(".spinner-border").style.display = "inline-block";
}
function StopLoader() {
    document.querySelector(".spinner-border").style.display = "none";
}

function RedirectToCabinet() {
    location.href = "https://cunion.io/panel/cabinet/cabinet"
}

function ShowWelcomeBlock(){
    document.querySelector("#welcome_block").style.display = "block";
    document.querySelector("#user_email").innerHTML = email;
}

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

notify = (type, mes) => {
    var message = mes;
    var type = type
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