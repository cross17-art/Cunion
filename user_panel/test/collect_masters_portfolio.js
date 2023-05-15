const fetch = require('node-fetch');
const crypto = require('crypto')

console.log("Collecting all portfolios balances...");

api = require('kucoin-node-api');

baseConfig = {
    apiKey: '6113f0339e22210006db5315',
    secretKey: '6d48dcf1-2c5e-4353-8231-3f3443abfad9',
    passphrase: 'Knockknock',
    environment: 'live'
}

var allBalances = [];
let mastersPortfolios = [];

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

        let keys = Decrypt(account.passPhrase, account.secretKey, account.apiKey)

        let config = {
            apiKey: keys.decrypt_apikey,
            secretKey: keys.decrypt_seretkey,
            passphrase: keys.decrypt_passphrase,
            environment: 'live'
        }

        let balance = await GetBalance(config);
        let totalBalance = 0;
        let assetArray = [];
        balance.forEach((asset) => {
            if (asset.type === 'trade') {
                if (asset.currency === 'USDT') {
                    totalBalance += parseFloat(asset.balance);
                    assetArray.push({asset:"USDT", in_usdt:parseFloat(asset.balance), base_amount:parseFloat(asset.balance)});
                } else {
                    let ticker = GetTickerByName(asset.currency, tickers);
                    if(ticker !== undefined){
                        let assetInUSDT = parseFloat(asset.balance) * parseFloat(ticker.sell);
                        totalBalance += assetInUSDT;
                        if(assetInUSDT != 0){
                            if(assetInUSDT >= 0.1){

                                assetArray.push({asset:asset.currency, in_usdt:assetInUSDT, base_amount:asset.balance});
                            }
                        }
                    } else {
                        console.log('\x1b[33m%s\x1b[0m', {
                            from : "collect_masters_portfolio",
                            error: "ticker is undefied",
                            ticker: ticker,
                            asset: asset.currency,
                        })
                    }
                }
            }
        });


        let masterPortfolio = {
            user_id: account.user_id,
            email: account.email,
            account_id: account.account_id,
            asset_balance_array: assetArray,
        };

        // console.log(masterPortfolio);
        mastersPortfolios.push(masterPortfolio)
    }

    // console.log(mastersPortfolios);

    await SendPortfoliosToDB(mastersPortfolios);

    return;
};

GetTickerByName = (tickerName, tickers) => {
    return tickers.find((ticker) => {
        if (ticker.symbol === tickerName + "-USDT") {
            return ticker;
        }
    })
}

GetAllKucoinAccounts = async () => {
    let url = 'https://cunion.io/client/copy_server_api/kucoin/get_kucoin_master_accounts.php';
    let accountList = await fetch(url).then((rsp) => {
        return rsp.json()
    }).then((data) => {
        return data.master_accounts;
    });

    return accountList;
};

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


SendPortfoliosToDB = async (allPortfolios) => {
    let url = 'https://cunion.io/client/copy_server_api/kucoin/receive_masters_portfolios.php';

    let result;
    result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(allPortfolios)
    }).then((rsp) => {
        return rsp.json();
    }).then((d) => {
        // console.log('response', data);
        console.log('\x1b[36m%s\x1b[0m', "portfolio saved")
    }).then((err) => {
        console.log(err);
    });

    return result;
};

let timer = setTimeout(async function UpdateBalances(){
    console.log("Collecting the portfolio");
    await CollectBalances();
    setTimeout(UpdateBalances, 10000);
}, 10000)
