if (document.querySelector("#api_key_submit") != null) {
    document.getElementById("api_key_submit").addEventListener("click", function (event) {
        event.preventDefault()
    });

    // document.getElementById("api_key_rebind").addEventListener("click", function (event) {
    //     event.preventDefault()
    // });
}


function SendVerificationEmail() {
    console.log("Send verification email:")
    document.querySelector('.verification-email-spinner').style.display = "block"
    fetch('https://cunion.io/client/php_scripts/send_verification_email_ajax.php', {
        method: 'POST',
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
        ClearMessageBox();
        document.querySelector("#verification_message_sent").innerHTML = data.message;
        document.querySelector("#verification_message_sent").style.display = "block";
        document.querySelector(".verification-email-spinner").style.display = "none";
        document.querySelector("#message_box").style.display = "block";
    });
}


function ShowVerifiedMessage() {
    ClearMessageBox();
    document.querySelector("#message_box").style.display = "block";
    document.querySelector("#message_already_verified").style.display = "block";
}

function ClearMessageBox() {
    // document.querySelector(".interactive-window").children.forEach((element) => {
    //     element.style.display = "none"
    // });

}

async function ShowConnectionMiniForm() {
    console.log("Show mini connection form");
    ClearMessageBox();
    //document.querySelector("#api_form").style.display = "block";
    //document.querySelector("#api_form").style.display = "none";
    let child = document.querySelector(".tab-pane.fade.active.show").children
    child[0].style.display='none';
    child[1].style.display='block';
    document.querySelector(".col-12.col-xl-4.d-xl-flex>.card.flex-fill.w-100>.card-header").style.display="block"
    document.querySelector("#popup_weekly_sales").style.display="none"
    document.querySelector("#balance_hitory_table").style.display=""
    document.querySelector("#order_history_table>.card-header").style.display=""
    placePie();
    // this.DrawPortfolioChart(canvasId, assetsValues);
    // new Chart(document.getElementById(canvasId), {
    //     type: "pie",
    //     data: {
    //         labels: ["USDT", "Other"],
    //         datasets: [{
    //             data: assetsValues,
    //             backgroundColor: [
    //                 window.theme.primary,
    //                 window.theme.warning,
    //                 // window.theme.danger,
    //                 // "#E8EAED"
    //             ],
    //             borderWidth: 1,
    //             borderColor: window.theme.white
    //         }]
    //     },
    //     options: {
    //         responsive: false,
    //         maintainAspectRatio: false,
    //         cutoutPercentage: 50,
    //         legend: {
    //             display: false
    //         }
    //     }
    // });

}


function placePie(){
    new Chart(document.querySelector("#forcake"), {
        type: "pie",
        data: {
            labels: ["USDT", "Another value"],
            datasets: [{
                data: [260, 125],
                backgroundColor: [
                    window.theme.primary,
                    window.theme.warning,
                    window.theme.danger,
                    "#E8EAED"
                ],
                borderColor: "transparent"
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            }
        }
    });
}

function confettiFalling(){
    var box = document.getElementById("box");
    var colors = ['red', 'green', 'blue', 'yellow', 'purple', 'orange', 'pink'];

    for (var i = 0; i < 1000; i++) {

        // Create 1000 DIV elements for confetti
        var div = document.createElement("div");
        div.classList.add("confetti");
        box.appendChild(div);
    }

    var confetti = document.querySelectorAll('.confetti');

    for (var i = 0; i < confetti.length; i++) {

        var size = Math.random() * 0.01 * [i];

        confetti[i].style.width = 5 + size + 'px';
        confetti[i].style.height = 16 + size + 'px';
        confetti[i].style.left = Math.random() * innerWidth + 'px';

        var background = colors[Math.floor(Math.random() * colors.length)];
        confetti[i].style.backgroundColor = background;

        box.children[i].style.transform = "rotate("+ size*[i] +"deg)";
    }


}

function placeChart(){
    new Chart(document.getElementById("chartjs-dashboard-bar-devices"), {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile",
                backgroundColor: window.theme.primary,
                borderColor: window.theme.primary,
                hoverBackgroundColor: window.theme.primary,
                hoverBorderColor: window.theme.primary,
                data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                barPercentage: .5,
                categoryPercentage: .5
            }, {
                label: "Desktop",
                backgroundColor: window.theme["primary-light"],
                borderColor: window.theme["primary-light"],
                hoverBackgroundColor: window.theme["primary-light"],
                hoverBorderColor: window.theme["primary-light"],
                data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
                barPercentage: .5,
                categoryPercentage: .5
            }]
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 20
                    },
                    stacked: true,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: true,
                }]
            }
        }
    });
}


function SendKeys() {
    if (user.email === 'wydebinance@gmail.com') {
        alert("This is the public account you can not change the api keys here");
        return;
    }

    console.log("Sending Keys...");
    document.querySelector("#api_form_spinner").style.display = "block";

    let api_key = document.querySelector("[name = api_key]").value;
    let secret_key = document.querySelector("[name = secret_key]").value;
    console.log("Sending key:" + " api_key:" + api_key + ", secret_key:" + secret_key);

    fetch('https://cunion.io/client/php_scripts/send_api_keys.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "api_key=" + api_key + "&secret_key=" + secret_key
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
        user.GetModel();
        document.querySelector("#api_form_spinner").style.display = "none";
    });

}

async function  SendKeys_kucoin() {
    if (user.email === 'wydebinance@gmail.com') {
        alert("This is the public account you can not change the api keys here");
        return;
    }

    console.log("Sending Keys...");
    document.querySelector("#api_form_spinner").style.display = "block";
    document.querySelector("#validation-balance-spinner").style.display = "block";



    let api_key = document.querySelector("[name = api_key]").value;
    let secret_key = document.querySelector("[name = secret_key]").value;
    let passphrase = document.querySelector("[name = passphrase]").value;

    console.log("Sending key:" + " api_key:" + api_key + ", secret_key:" + secret_key + ", passphrase:" + passphrase);


    if (api_key != null && secret_key != null && passphrase != null) {

        /// "api_key=" + api_key + "&secret_key=" + secret_key + "&passphrase=" + passphrase


        console.log("fetch is send")
        let url = "https://cunion.io:8000/verify_account";
        let acc= await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({
                apikey: api_key,
                secretkey: secret_key,
                passphrase: passphrase
            })
        }).then((response) => {
            console.log("response for ver script ", response)
            return response.json();
        }).then((data) => {

           return data
            //document.querySelector("#api_form_spinner").style.display = "none";
        });
        console.log("code: ",acc.code)

        if (acc.code === "200000") {
            console.log("we add to db", acc);
            //DisplayTickers()
///insert to db
         await fetch('https://cunion.io/client/php_scripts/send_keys_kucoin.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: "api_key=" + api_key + "&secret_key=" + secret_key + "&passphrase=" + passphrase
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(data);
                user.GetModel();
                // document.querySelector("#api_form_spinner").style.display = "none";
            });
            var message = "You have successfully activated your account";
            var type = "success"
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
            confettiFalling()

        }
        else if(acc.code==401) {
            var message = "Your keys are incorrect, please check them. ";
            var type = "warning"
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
            console.log("notify")
            document.querySelector("#api_form_spinner").style.display='none';
            document.querySelector("#validation-balance-spinner").style.display='none';
        }


    } else {
        console.log("fetch is not send")
    }

}


async function  Rebind_kucoin() {
    if (user.email === 'wydebinance@gmail.com') {
        alert("This is the public account you can not change the api keys here");
        return;
    }

    console.log("Sending Keys...");
    document.querySelector("#api_form_spinner").style.display = "block";

    let api_key = document.querySelector("#api_key_rebind").value;
    let secret_key = document.querySelector("#secret_key_rebind").value;
    let passphrase = document.querySelector("#passphrase_rebind").value;

    console.log("Sending key:" + " api_key:" + api_key + ", secret_key:" + secret_key + ", passphrase:" + passphrase);


    if (api_key != null && secret_key != null && passphrase != null) {

        /// "api_key=" + api_key + "&secret_key=" + secret_key + "&passphrase=" + passphrase


        console.log("fetch is send")
        let url = "https://cunion.io:8000/verify_account";
        let acc= await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({
                apikey: api_key,
                secretkey: secret_key,
                passphrase: passphrase
            })
        }).then((response) => {
            console.log("response for ver script ", response)
            return response.json();
        }).then((data) => {

            return data
            //document.querySelector("#api_form_spinner").style.display = "none";
        });
        console.log("code: ",acc.code)

        if (acc.code === "200000") {
            console.log("we add to db", acc);
            //DisplayTickers()
///insert to db
            await fetch('https://cunion.io/client/php_scripts/send_keys_kucoin.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: "api_key=" + api_key + "&secret_key=" + secret_key + "&passphrase=" + passphrase
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(data);
                user.GetModel();
                // document.querySelector("#api_form_spinner").style.display = "none";
            });
            document.querySelector("#close_model_form").click()
            location.reload();
            // var message = "You have successfully activated your account";
            // var type = "success"
            // var duration = "5000"
            // var ripple = true
            // var dismissible = false
            // var positionX = "right"
            // var positionY = "top"
            // window.notyf.open({
            //     type,
            //     message,
            //     duration,
            //     ripple,
            //     dismissible,
            //     position: {
            //         x: positionX,
            //         y: positionY
            //     }
            // });
            // confettiFalling()

        }
        else if(acc.code==401) {
            var message = "Your keys are incorrect, please check them. ";
            var type = "warning"
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
            console.log("notify")
            document.querySelector("#api_form_spinner").style.display='none';
        }


    } else {
        console.log("fetch is not send")
    }

}


function InitBinanceBalance() {
    if (document.querySelector("#chartjs-dashboard-bar") != null) {//if chart with coins exitst
        // debugger;
        DrawBalanceHistoryGraphBinance();
    }

    console.log("Getting balance data...");

    fetch('https://cunion.io/client/cabinet/binance_api/get_binance_balance.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    }).then((response) => {
        let result = response.json();
        return result;
    }).then((data) => {
        console.log(data);
        balance.ComposeBalance(data.balances, data.prices);
        if (document.querySelector("#chartjs-dashboard-bar") != null) { // If chart with coins exist
            DrawBalance(balance);
            DrawUSDTBalance(balance.availableUSDT, balance.onOrderUSDT);
        }

    }).catch((err) => {
        console.log("err while collecting the balance");
        console.log(err);
    });

}



function DrawBalance(balance) {
    // Bar chart
    document.querySelector("#balance-spinner").style.display = "none";
    document.querySelector("#validation-balance-spinner").style.display = "none";
    document.querySelector("#not_connect_button").style.display='none';


    document.querySelector("#chartjs-dashboard-bar").style.display = "block";

    new Chart(document.getElementById("chartjs-dashboard-bar"), {
        type: "bar",
        data: {
            labels: balance.labels,
            datasets: [{
                backgroundColor: balance.colors,
                borderColor: window.theme.primary,
                hoverBackgroundColor: window.theme.primary,
                hoverBorderColor: window.theme.primary,

                data: balance.coins,
                barPercentage: .5,
                categoryPercentage: .5
            }]
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 0.01
                    },
                    stacked: true,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: true,
                }]
            }
        }
    });
}

