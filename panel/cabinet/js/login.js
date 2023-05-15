// var QRCode = require('js/node_modules/qrcode');

console.log("Hello from login js 2");

var secret = null;
var id = null;

async function ver_authentication_secret () {


    let token = document.querySelector("#verify_token").value;
    if (secret != null && token !== '') {
        let end = await fetch('https://cunion.io:2096/first_ver', {
            method: 'POST',
            body: JSON.stringify({id: user.id, token: token, secret: secret})
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data)
            return data
        })

        if (end.data.code === 9061) {
            notify("success", 'You have successfully activated your account')
            document.querySelector('#recive_token').style.display = 'none';
            document.querySelector('.card-body p').style.display = 'none';
            document.querySelector('#token_2af').style.display = 'none';
            document.querySelector('#header_2af').innerText = 'Google Authentication'
            document.querySelector('#qr').style.display = 'none'
            location.reload()
        } else if (end.data.code === 1609) {
            notify('danger', 'This account already has an authentication key, please contact support.')
        } else if (end.data.code === 2412) {
            notify('warning', 'Wrong token, please try again.')
        }

    }

    //need make callback

    // if (end.ver) {
    //     document.querySelector('#recive_token').style.display = ''
    //     location.reload();
    // }


}

off_or_on_Authenticator_window = async (event) => {

    let ver = event.target.checked
    console.log(ver)

    document.querySelector('#on_off_auth_div').style.display = ''
    document.querySelector("#on_off_ver").style.display = 'block'

    document.querySelector("#on_off_ver").setAttribute('ver', ver)
    document.querySelector('#on_off_ver').addEventListener('click', async (event) => {
        let ver = document.querySelector('#on_off_ver').getAttribute('ver')
        console.log('click function ', ver)
        let token = document.querySelector('#verify_token_on_off').value;
        let end = await fetch('https://cunion.io:2096/off_on_Authenticator', {
            method: 'POST',
            body: JSON.stringify({id: user.id, token: token, v: ver})
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data)
            return data
        })
        if (end.data === 9061) {
            debugger;
            notify("success", 'You have successfully activated your account')
            location.reload()
        } else if (end.data === 1609) {
            notify('danger', 'This account already has an authentication key, please contact support.')
        } else if (end.data === 2412) {
            notify('warning', 'Wrong token, please try again.')
        }
    })


}
delete_2af = () => {
    document.querySelector('#on_off_auth_div').style.display = ''
    document.querySelector("#on_off_ver").style.display = 'none'
    document.querySelector("#delete_2af_btn_modal").style.display = 'block'
    document.querySelector('#delete_2af_btn_modal').addEventListener('click', async (event) => {

        let token = document.querySelector('#verify_token_on_off').value;
        let end = await fetch('https://cunion.io:2096/delete_2af', {
            method: 'POST',
            body: JSON.stringify({user_id: user.id, token: token})
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data)
            return data
        })
        if (end.data === 9061) {
            notify("success", 'You have successfully activated your account')
            location.reload()
        } else if (end.data === 1609) {
            notify('danger', 'This account already has an authentication key, please contact support.')
        } else if (end.data === 2412) {
            notify('warning', 'Wrong token, please try again.')
        }
    })



}


close_on_off_form = () => {
    document.querySelector('#on_off_auth_div').style.display = 'none'
    document.querySelector("#on_off_ver").style.display = 'none'
    document.querySelector("#delete_2af_btn_modal").style.display = 'none'
    let ball = user.two_auth_enable == 0 ? false : true;
    document.querySelector('#flexSwitchCheckChecked').checked = ball
}


ver_login = async () => {
    console.log("--> ver_login")
    let tokenInput = document.querySelector('[fa_input_token]');
    console.log('token input:' + tokenInput)
    if(tokenInput == null){
        console.log("token input is null. Critical layout");
    } else {
        console.log("Token input is not null.");
    }
    let token = tokenInput.value;
    console.log("--> token:" + token);
    if (token !== '') {
        console.log("--> token is not empty. send fetch");
        let end = await fetch('https://cunion.io:2096/ver', {
            method: 'POST',
            body: JSON.stringify({id: id, token: token})
        }).then((response) => {
            return response.json();
            console.log("<<-- fetch reponsed");
        }).then((data) => {
            console.log("<<-- Response Data:");
            console.log("code:" + data.data.code);
            console.log(data)
            return data
        })

        if (end.data.code === 9061) {
            console.log("response code 9061");
            notify("success", 'You have successfully activated your account')

            setTimeout(() => {
                RedirectToCabinet()
            }, 700)
        } else if (end.data.code === 1609) {
            console.log("response code 1609");
            notify('danger', 'This account already has an authentication key, please contact support.')

            // setTimeout(() => {
            //     RedirectToCabinet()
            // }, 700)
        } else if (end.data.code === 2412) {
            console.log("response code 2412");
            notify('warning', 'Wrong token, please try again.')
            // setTimeout(() => {
            //     RedirectToCabinet()
            // }, 700)
        }

    }
}


create_authentication_secret = async () => {


    debugger;

    // let token = document.querySelector("#verify_token").value;
    let end = await fetch('https://cunion.io:2096/create_secret', {
        method: 'POST',
        body: JSON.stringify({id: user.id, email: user.email})
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data)
        secret = data.data.secret;
        return data
    })


    document.querySelector('#token_2af').style.display = '';
    // document.querySelector('#verify_token').value = end.data.secret;

    document.querySelector('#header_2af').innerText = 'Set up the Authenticator app'
    let google = document.createElement('a')
    google.href = 'https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2';
    google.value = "Google Play"


    document.querySelector('.card-body p').innerHTML = 'Download Google Authenticator at \n' + '<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2">Google Play</a>\n' + '<br>' +
        'Open the app and select Set up account.' + '<br>' +
        ' 1. Press Menu and then Set up account.' + '<br>' +
        ' 2. Select Enter Key.' + '<br>' +
        ' 3. Provide your email address and this key: ' + '<h3>' + end.data.secret + '</h3>';


    console.log(end.data.url)
    var canvas = document.getElementById('qr')
    document.getElementById('qr').style.display = 'block'

    var url = end.data.url

    QRCode.toCanvas(document.querySelector("#qr"), url, function (error) {
        if (error) console.error(error)
        console.log('success!');
    })
    document.querySelector('#create_secret').style.display = 'none';
    document.querySelector('#recive_token').style.display = 'flex';


    // if (end.ver) {
    //     console.log('ver from setting ', end)
    //     document.querySelector("#verify_token").innerHTML = end.ver
    // }

}





function Login() {
    let email = document.querySelector("[name = email]").value;
    let pass = document.querySelector("[name = password]").value;

    console.log("try to login via email:" + email + ", pass:" + pass);

    document.querySelector(".alert-danger").style.display = "none";
    document.querySelector(".alert-success").style.display = "none";

    RunLoader();

    localStorage.setItem("user_id",12)


    fetch('https://cunion.io/panel/php_scripts/log_in.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'x-auth': localStorage.getItem("user_id"),
            'Access-Control-Allow-Origin': '*'
        },
        body: "user_email=" + email + "&user_pass=" + pass
    }).then((response) => {
        return response.json();
    }).then((data) => {
        id = data.id;
        ProcessLoginResponse(data);
    });
}

function RunLoader() {
    document.querySelector(".spinner-border").style.display = "inline-block";
}

function HideLoader() {
    document.querySelector(".spinner-border").style.display = "none";
}

function ProcessLoginResponse(_data) {
    console.log("Login Processing");

    let data = {
        status: "",
        user_email: "",
        message: "",
        code: -1
    };

    data = _data;
    console.log(data);

    if (data.code === 1) {
        if (data.status === "login_success") {
            if (data.two_auth && data.two_auth_ver == 0) {
                document.querySelector(".spinner-border").style.display = "none";
                document.querySelector(".alert-success > .alert-message").innerHTML = "<strong>Success! </strong>" + data.message;
                document.querySelector(".alert-success").style.display = "block";
                setTimeout(() => {
                    document.querySelectorAll("p.lead")[1].innerText = 'Google Authentication'
                    document.querySelector('.card').style.display = 'none'
                    document.querySelector('#ver').style.display = ''
                }, 700)

            } else {
                console.log("login success");
                document.querySelector(".spinner-border").style.display = "none";
                document.querySelector(".alert-success > .alert-message").innerHTML = "<strong>Success! </strong>" + data.message;
                document.querySelector(".alert-success").style.display = "block";
                setTimeout(() => {
                    RedirectToCabinet();
                }, 700)

            }
        }
    } else if (data.code === -1) {
        if (data.status === "login_failed") {
            console.log("login failed");
            document.querySelector(".spinner-border").style.display = "none";
            document.querySelector(".alert-danger > .alert-message").innerHTML = "<strong>failed! </strong>" + data.message;
            document.querySelector(".alert-danger").style.display = "block";
        }
    }
}

function RedirectToCabinet() {
    console.log('Redirect to cabinet');
    location.href = "https://cunion.io/panel/cabinet/cabinet"
}


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
document.querySelector("[type = submit]").addEventListener("click", function (event) {

    event.preventDefault()

})
