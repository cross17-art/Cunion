const fetch = require('node-fetch');
const crypto = require('crypto')

console.log("Collecting all kucoin balances...");

api = require('kucoin-node-api');

baseConfig = {
    apiKey: '6113f0339e22210006db5315',
    secretKey: '6d48dcf1-2c5e-4353-8231-3f3443abfad9',
    passphrase: 'Knockknock',
    environment: 'live'
}

var allBalances = [];

api.init(baseConfig);

GetTickers = async () => {
    return await api.getAllTickers().then((rsp) => {
        return rsp.data.ticker
    }).catch((e) => {
        console.log(e);
    })
}

GetBalance = async (_config) => {
    api.init(_config);
    return await api.getAccounts().then((rsp) => {
        return rsp.data;
    }).catch((e) => {
        console.log(e);
    })
}

CollectBalances = async () => {
    console.log("start collecting balances")

    let tickers = await GetTickers();

    let allAccounts = await GetAllKucoinAccounts();

    for (let i = 0; i < allAccounts.length; i++) {
        let account = allAccounts[i]

        let keys = Decrypt(account.passphrase, account.secretkey, account.apikey)

        let config = {
            apiKey: keys.decrypt_apikey,
            secretKey: keys.decrypt_seretkey,
            passphrase: keys.decrypt_passphrase,
            environment: 'live'
        }


        let balance;
        try {
            balance = await GetBalance(config);
        } catch (err){
            console.log({
                type:"error_get_balance",
                account_id: account.id,
                user_email: account.email,
            },err);
        }

        if(balance != undefined) {
            let totalBalance = 0;
            balance.forEach((asset) => {
                if (asset.type === 'trade') {
                    if (asset.currency === 'USDT') {
                        totalBalance += parseFloat(asset.balance);
                    } else {
                        let ticker = GetTickerByName(asset.currency, tickers);
                        if(ticker !== undefined ){
                            let assetInUSDT = parseFloat(asset.balance) * parseFloat(ticker.sell);
                            totalBalance += assetInUSDT;
                        } else {
                            console.log({
                                from: "collect_kucoin_balances",
                                type:"undefined_symbol",
                                ticker: asset.currency,
                                msg: "Can not find tikcer:" + asset.currency + "-USDT"
                            })
                        }

                    }
                }
            })
            console.log({
                user_id: account.user_id,
                email: account.email,
                totalBalance: totalBalance
            })

            allBalances.push({
                user_id: account.user_id,
                total_balance:totalBalance
            })
        }
    }

    console.log(allBalances);

    SendBalancesToTrdServer(allBalances);
    console.log("end...");
}

GetTickerByName = (tickerName, tickers) => {
    return tickers.find((ticker) => {
        if (ticker.symbol === tickerName + "-USDT") {
            return ticker;
        }
    })
}

GetAllKucoinAccounts = async () => {
    let url = 'https://cunion.io/client/copy_server_api/kucoin/get_kucoin_accounts.php';
    let accountList = await fetch(url).then((rsp) => {
        return rsp.json()
    }).then((data) => {
        return data.accounts;
    });

    return accountList;
}

//--------------

function Decrypt(passphrase, secretkey, apikey) {
    //console.log("api key not decrypt", apikey)
    //var textToEncrypt = new Date().toISOString().substr(0,19) + '|My super secret information.';
    var encryptionMethod = 'AES-256-CBC';
    var secret = "fTjWmZq4t7w!z%C*F-JaNdRgUkXp2r5u"; //must be 32 char length
    var iv = secret.substr(0, 16);

    //var decryptedMessage = decrypt(apikey, encryptionMethod, secret, iv);
    var decrypted_apikey = crypto.createDecipheriv(encryptionMethod, secret, iv);
    decrypted_apikey = decrypted_apikey.update(apikey, 'base64', 'utf8') + decrypted_apikey.final('utf8');
    //
    var decrypted_secreatkey = crypto.createDecipheriv(encryptionMethod, secret, iv);
    decrypted_secreatkey = decrypted_secreatkey.update(secretkey, 'base64', 'utf8') + decrypted_secreatkey.final('utf8');

    //
    var decrypted_passphrase = crypto.createDecipheriv(encryptionMethod, secret, iv);
    decrypted_passphrase = decrypted_passphrase.update(passphrase, 'base64', 'utf8') + decrypted_passphrase.final('utf8');

    return {
        decrypt_apikey: decrypted_apikey,
        decrypt_seretkey: decrypted_secreatkey,
        decrypt_passphrase: decrypted_passphrase
    }
}


SendBalancesToTrdServer = async (totalBalances) => {
    let url = 'https://cunion.io/client/copy_server_api/kucoin/receive_all_kucoin_balances.php';

    let result;
    result = fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(totalBalances)
    }).then((rsp) => {
        return rsp.json();
    }).then((data) => {
        console.log(data);
    });
}

CollectBalances();

