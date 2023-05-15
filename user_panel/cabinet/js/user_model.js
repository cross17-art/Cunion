var user = {
    email: "",
    verified: "",
    connected: "",
    apiKey: "",
    secretKey: "",
    passphrase: "",
    nickname: "",
    GetModel: function () {
        console.log("Try to get use model from server");
        fetch('https://cunion.io/client/php_scripts/get_user_model_by_session.php', {
            method: 'GET',
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data);
            user.email = data.user_data.email;
            user.verified = data.user_data.verified == "1" ? true : false;
            user.connected = data.user_data.connected == "1" ? true : false;
            user.apiKey = data.api_key;
            user.secretKey = data.secret_key;
            user.passphrase = data.passphrase;
            user.nickname = data.nickname!=null ? data.nickname : 'Children'

            InitUserState();
            let tag = document.getElementsByClassName('tab-pane');

            getKucoinAccount();
            if(!(user.connected)){
                document.querySelector("#button_not_connected").style.display=''
                document.querySelector("#button_not_connected").addEventListener('click',function () {
                    window.location.href='https://cunion.io/client/cabinet/cabinet_accounts.php';
                })
            }
            else{
                document.querySelector("#button_not_connected").style.display='none'

            }




            if (GetPageName() === "cabinet_accounts") {
                if (user.connected) {

                    if (tag[0].className === "tab-pane fade active show") { // Kucoin Tab
                        console.log("tag[0]")
                       // getKucoinAccount();
                        DrawBalanceGraphKucoin();
                        //InitBalance();
                    } else if (tag[1].className === "tab-pane active") { //Binance Tab
                        console.log("tag[1]")
                        InitBinanceBalance();
                        showLogs();


                    } else if (tag[2].className === "tab-pane active") { // FTX tab

                    }
                } else {
                    // InitBalance();

                }
            }
            else if((GetPageName()==="main_page")&& user.connected){
               // getKucoinAccount();
                DrawUSDTBalance()

            }

            if(GetPageName() === 'kucoin_copy_history'){
                console.log("Kucoin copy history page");
                LoadKucoinHistory();
            }
        });
    }
}


