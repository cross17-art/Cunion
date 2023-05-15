var user = {
    email: "",
    authentication_verified: "",
    two_auth_enable: "",
    last_date: "",
    verified: "",
    connected: "",
    apiKey: "",
    secretKey: "",
    passphrase: "",
    nickname: "",
    GetModel: function () {
        fetch('https://cunion.io/panel/php_scripts/get_user_model_by_session.php', {
            method: 'GET',
        }).then((response) => {
            return response.json();
        }).
        then(async (data) => {
            user.email = data.user_data.email;
            user.verified = data.user_data.verified == "1" ? true : false;
            // user.connected = data.user_data.connected == "1" ? true : false;
            user.connected = data.connected;
            user.authentication_verified = data.authentication_verified;
            user.two_auth_enable = data.two_auth_enable;
            user.last_date = data.last_date;
            user.id = data.id;
            user.nickname = data.nickname != null ? data.nickname : 'Children'

            user_balance.id = user.id
            user_balance.email = user.email


            // user_balance.GetData()

            InitUserState();
            let tag = document.getElementsByClassName('tab-pane');

            // let accountResult = getKucoinAccount();

            if (!(user.connected)) {
                document.querySelector("#button_not_connected").style.display = ''
                document.querySelector("#button_not_connected").innerHTML = 'Account Not Connected'

                document.querySelector("#h_not_connected").style.display = 'inline-block'
                document.querySelector("#button_not_connected").addEventListener('click', function () {
                    window.location.href = 'https://cunion.io/panel/cabinet/cabinet_accounts';
                })
            } else {
                document.querySelector("#button_not_connected").style.display = 'none'
                document.querySelector("#h_not_connected").style.display = 'none'
                await this.GetConn();
                user_balance.GetData();
            }

            if (GetPageName() === "cabinet_accounts") {

                if (user.connected) {
                    if (tag[0].className === "tab-pane fade active show") { // Kucoin Tab
                        console.log("tag[0]")
                        document.getElementById("1kucoin_k").style.display = 'none'
                        document.getElementById("open_faq_instructions").style.display = 'none'
                        document.getElementById("main_video_instruction").style.display = 'none'
                        // document.getElementById("oppen_video_faq").style.display = 'none'

                        document.querySelector("#moneyDiv").style.display='';
                        document.querySelector("#roi_table").style.display='';


                        // getKucoinAccount();
                        // await accountResult;
                        DrawBalanceGraphKucoin();
                        DrawFullBalanceGraphKucoin();
                        // Get_user_connection_to_masters();
                        //InitBalance();
                    } else if (tag[1].className === "tab-pane active") { //Binance Tab
                        console.log("tag[1]")
                        InitBinanceBalance();
                        showLogs();
                    } else if (tag[2].className === "tab-pane active") { // FTX tab

                    }
                } else {
                    document.getElementById("1kucoin_k").style.display = ''
                    document.getElementById("open_faq_instructions").style.display = ''
                    document.getElementById("oppen_video_faq").style.display = ''

                    // InitBalance();

                }
            } else if ((GetPageName() === "main_page") && user.connected) {
                // getKucoinAccount();
                DrawUSDTBalance()

            }

            if (GetPageName() === 'kucoin_copy_history') {
                console.log("Kucoin copy history page");
                LoadKucoinHistory();
            }


            if (GetPageName() === 'cabinet_setting') {
                //
                // if(user.authentication_verified==='0'){
                //     // close_windows();
                //     // document.querySelector("#authenticator").style.display='';
                //     compare_date(user.last_date)
                // }

                let ball = user.two_auth_enable == 0 ? false : true;
                document.querySelector('#flexSwitchCheckChecked').checked = ball;
                document.querySelector('#flex_text_auth').innerHTML = ball? 'Do you want turn off Google Authentication':'Do you want turn on Google Authentication';


                if (user.authentication_verified == 0) { //Это значит что юзер не прошел 2ух факторную верификацию
                    if (user.last_date === 1609) { // Это значит что запись secret в таблице 2auth для данного юзера отсутствует
                        //Сюда мы попадаем в случае если юзер не прошел верификацию и запись secret отсутсвует.
                        //Тогда показываем окошко на сознадие secret и куар кода
                        console.log('create secret')
                        document.querySelector("#card_2af").style.display = ''
                        document.querySelector('#create_secret').style.display = 'flex'
                    } else {
                        //Ситуация в которой 2ух факторка не пройдена и запись о secret в таблице 2auth есть.
                        //Поидее нужно отображать окошко с тоглом.
                        //Вопрос может ли сюда попасть юзер....?))
                        document.querySelector("#card_2af").style.display = ''
                        document.querySelector('#header_2af').innerText = 'Google Authentication'
                        //close window with create secret ver
                        document.querySelector("#create_secret_2af").style.display = 'none'
                        //open on/off
                        document.querySelector("#window_ready_2af").style.display = ''

                    }

                } else { // Это значит что двух факторка пройдена
                    //Тогда мы отображаем окошко с кнопкой delete и тоггле на включение выключение.
                    document.querySelector("#card_2af").style.display = ''
                    document.querySelector('#header_2af').innerText = 'Google Authentication'
                    //close window with create secret ver
                    document.querySelector("#create_secret_2af").style.display = 'none'
                    //open on/off
                    document.querySelector("#window_ready_2af").style.display = ''
                }
            }
        }).catch((err)=>{
            console.log(err)
        });
    },
    GetConn: function () {
        fetch('https://cunion.io:2087/ping', {
            method: 'POST',
            body: JSON.stringify({user_id: user.id})
        }).then((response) => {
            return response.json()
        }).then((data) => {
            console.log('code from PING', data.code)
        })
    }
}
setInterval(() => {
    user.GetConn();
}, 10000)


close_windows = () => {
    document.querySelector('#kucoin').style.display = 'none'
    document.querySelector('#FTX').style.display = 'none'
    document.querySelector('#binance').style.display = 'none'
}

compare_date = (date) => {
    if (date === 1609) {
        //open secret


        //     close_windows()
        //     document.querySelector('#create_authenticator').style.display='';
    } else {
        //open token


        // close_windows()
        // document.querySelector('#authenticator').style.display='';
        // // let now_date = new Date();
        // let db_date = new Date(date);
        // const TOTAL_MILLISECONDS_IN_A_WEEK = 1000 * 60 * 60 * 24 ;
        //
        //
        // let difference = now_date - db_date; // difference in milliseconds
        //
        // if (Math.floor(difference / TOTAL_MILLISECONDS_IN_A_WEEK) > 3) {
        //     // close_windows()
        //     // document.querySelector("#authenticator").style.display = '';
        //     console.log('we need create token')
        //
        // } else {
        //     console.log('we dont need create token')
        //     // document.querySelector("#authenticator").style.display = 'none';
        // }
        // console.log('we need create secret')
    }


}
