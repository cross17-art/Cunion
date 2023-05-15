//const https = require("https");
const http = require("http");
const crypto = require('crypto')
const fetch = require('node-fetch');
const {GETKEYS} = require('./database');
var StringDecoder = require('string_decoder').StringDecoder;
const url = require("url");
const api = require('kucoin-node-api')
const fs = require('fs');

// var options = {
//   key: fs.readFileSync('/etc/letsencrypt/live/cunion.io/privkey.pem'),
//   cert: fs.readFileSync('/etc/letsencrypt/live/cunion.io/cert.pem'), q
//   ca: fs.readFileSync('/etc/letsencrypt/live/cunion.io/chain.pem')
// };

var allTickers = [];

async function LoadTickers() {
    allTickers = await GetAllTickers();
}

// LoadTickers();

var server = http.createServer(function (request, res) {
    //
    // res.setHeader('Access-Control-Allow-Origin', '*');
    // res.setHeader('Access-Control-Allow-Headers', 'origin, content-type, accept');
    //
    // console.log("data received")

 //   res.end("hello world");

    if (request.method === 'POST') {
        request.on('data', function (data) {
            buffer += decoder.write(data)
            console.log("-- data -->");
        });
    }
    let parsedUrl = url.parse(request.url, true);


    if (request.method === 'POST') {

        request.on('end', async function () {
            console.log("parse url ", parsedUrl.pathname)
            console.log("--- end --->")
            let end;
            if (parsedUrl.pathname === "/getAccount") {

                res.setHeader('Access-Control-Allow-Origin', '*');
                res.setHeader('Access-Control-Allow-Headers', 'origin, content-type, accept');
                //res.writeHead(200);

                // res.setHeader("Access-Control-Allow-Origin", "*");
                // res.setHeader("Access-Control-Allow-Methods", "*");
                // res.setHeader("Access-Control-Allow-Headers", "content-type");
                end = await ResGetAccount(buffer)
                //console.log("this is response ",end)
                //("end.code",end.code)
                res.end(JSON.stringify(end));

            } else if (parsedUrl.pathname === "/sell_kucoin") {
                let end = await ResSellTicker(buffer);
                res.setHeader('Access-Control-Allow-Origin', '*');
                res.setHeader('Access-Control-Allow-Headers', 'origin, content-type, accept');

                res.end(JSON.stringify(end));
                //console.log("end ", end);
            } else if (parsedUrl.pathname === "/verify_account") {
                res.setHeader('Access-Control-Allow-Origin', '*');
                res.setHeader('Access-Control-Allow-Headers', 'origin, content-type, accept');
                let total_buffer = JSON.parse(buffer)

                const config = {
                    apiKey: total_buffer.apikey,
                    secretKey: total_buffer.secretkey,
                    passphrase: total_buffer.passphrase,
                    //apiKey: '6113a931e895f300069b5a2d',
                    // secretKey: '1e331894-5968-4e59-9ad7-d3b140ca4cb6',
                    // passphrase: 'zxcvb24081963',
                    environment: 'live'
                }
                //console.log("config: ", config)
                console.log("start verify script");
                let end = await verify_getAccounts(config)
                //console.log("end response to verify_getAccounts",end);
                let msg = null;
                console.log("end response code",end.code)
                if (end.code==401) {
                    console.log("end equals null")
                    msg = {
                        code: 401,
                    }
                } else if(end.code === "200000"){
                    console.log("end equals 200000")
                    allTickers = await GetAllTickers();

                    msg = {
                        code: end.code,
                        balance: end,
                        allTickers: allTickers
                    }
                }


                res.end(JSON.stringify(msg));
            }
            else if(parsedUrl.pathname==="/get_deposit_withdrawals_list"){
                res.setHeader('Access-Control-Allow-Origin', '*');
                res.setHeader('Access-Control-Allow-Headers', 'origin, content-type, accept');

                console.log("buffer ",buffer)
                let depositList = await DepositList_lib(buffer);
                let withdrawls = await Withdrawals_lib(buffer);

                let msg={
                    depositlist: depositList,
                    withdrawls: withdrawls
                }

                res.end(JSON.stringify(msg));



            }
            else if(parsedUrl.pathname==="/test"){
                // res.setHeader('Access-Control-Allow-Origin', '*');
                // res.setHeader('Access-Control-Allow-Headers', 'origin, content-type, accept');
                //
                // console.log("buffer: ",buffer)
                // let total = JSON.parse(buffer);
                //
                //
                // let user_keys = await GetKeysById(total.Id);
                // console.log("user keys ",user_keys)
                // var decrypt_keys = Decrypt(user_keys.passphrase, user_keys.secretkey, user_keys.apikey)
                // decrypt_keys = JSON.parse(decrypt_keys)
                // console.log("test get keys by id", decrypt_keys)

            }


            // console.log("allTickers length:", allTickers.length);


            console.log(" --- End connection --- ")

        })


    }


    var decoder = new StringDecoder('utf-8');
    var buffer = '';


    // console.log(request.method)


});

// get DepositList by lib node js (start 29:09:2021 18:42)
async function DepositList_lib(buffer){
    console.log("enter depositlist")
    console.log(" depositlist",buffer)
    let total = JSON.parse(buffer);
    console.log("total",total)
    let user_keys = await GetKeysById(total.Id);

    var decrypt_keys = Decrypt(user_keys.passphrase, user_keys.secretkey, user_keys.apikey)
    decrypt_keys = JSON.parse(decrypt_keys)

    const config = {
        apiKey: decrypt_keys.decrypt_apikey,
        secretKey: decrypt_keys.decrypt_seretkey,
        passphrase: decrypt_keys.decrypt_passphrase,
        //apiKey: '6113a931e895f300069b5a2d',
        // secretKey: '1e331894-5968-4e59-9ad7-d3b140ca4cb6',
        // passphrase: 'zxcvb24081963',
        environment: 'live'
    }

    api.init(config);



    let result ="123"

        result=await api.getDepositList()


     //console.log("Request deposit list full", result)
     //console.log("Request deposit list only items", result.data.items)
    return result;
    //console.log("Res sell key ", decrypt_keys)

}
// END DepositList


//get Withdrawals by lib node js (start 29:09:2021 20:05)


Withdrawals_lib = async (buffer)=>{

    let total = JSON.parse(buffer);

    let user_keys = await GetKeysById(total.Id);

    var decrypt_keys = Decrypt(user_keys.passphrase, user_keys.secretkey, user_keys.apikey)
    decrypt_keys = JSON.parse(decrypt_keys)

    const config = {
        apiKey: decrypt_keys.decrypt_apikey,
        secretKey: decrypt_keys.decrypt_seretkey,
        passphrase: decrypt_keys.decrypt_passphrase,
        //apiKey: '6113a931e895f300069b5a2d',
        // secretKey: '1e331894-5968-4e59-9ad7-d3b140ca4cb6',
        // passphrase: 'zxcvb24081963',
        environment: 'live'
    }

    api.init(config);



    let result ="123"

    result=await api.getWithdrawalsList();



   // console.log("Request Withdrawals list full", result)
    //console.log("Request Withdrawals list only items", result.data.items)
    return result;



}

//END Deposit

//get Account by api kucoin(start 19:02 9061)//

async function verify_getAccounts(_config) {
    let response = null;
    try {
        api.init(_config);
        response = await api.getAccounts()
        return await response
    } catch (err) {
        let error={code: 401}
        return error;

    }

    // return await response;
}

//End//


async function ResSellTicker(buffer) {


    let total = JSON.parse(buffer);

    let user_keys = await GETKEYS(total.email);

    var decrypt_keys = Decrypt(user_keys.passphrase, user_keys.secretkey, user_keys.apikey)
    decrypt_keys = JSON.parse(decrypt_keys)

    const config = {
        apiKey: decrypt_keys.decrypt_apikey,
        secretKey: decrypt_keys.decrypt_seretkey,
        passphrase: decrypt_keys.decrypt_passphrase,
        //apiKey: '6113a931e895f300069b5a2d',
        // secretKey: '1e331894-5968-4e59-9ad7-d3b140ca4cb6',
        // passphrase: 'zxcvb24081963',
        environment: 'live'
    }


    let symbolInfo = await GetSymbolsInfo(config)

    let baseIncrementt = await GetSymbol(total.asset_name + '-USDT', symbolInfo);

    let increment = baseIncrementt.baseIncrement
    //console.log("increment 2", increment)
    let followerQty = await Round(total.asset_amount, increment);

    //console.log("qty for sell(followerQty) ", followerQty)

    let params = {
        side: 'sell',
        symbol: total.asset_name + '-USDT',
        size: followerQty
    }

    let result = await PlaceOrder(config, params)

  //  console.log("Request place order", result)
    return result;
    //console.log("Res sell key ", decrypt_keys)

}

GetSymbolsInfo = async (config) => {

    api.init(config);
    let symbolInfo = await api.getSymbols().then((rsp) => {
        return rsp;
    })
    return symbolInfo.data;
}

async function GetSymbol(symbolName, symbols) {
    let a = await symbols.find((symbol) => {
        if (symbol.symbol === symbolName)
            return symbol;
    })


    return a;
}

//------------------------Place Order------------------
PlaceOrder = async (_conf, params) => {
    api.init(_conf);
    let oid = Date.now();
    let result = await api.placeOrder({
        clientOid: oid, side: params.side, symbol: params.symbol, type: 'market', size: params.size
    }).then((rsp) => {
       // console.log({rsp: rsp});
        return rsp;
    });

    return await result;
};

//----------------------------END-----------------------


async function ResGetAccount(buffer) {
    let total = '';
    // var signature = '';
    total = JSON.parse(buffer)


  //  console.log("total", total)

    let user_keys = await GETKEYS(total.email);
    console.log("user_keys", user_keys)

    console.log("passphrase equals via null",user_keys.passphrase!=null)
    if(user_keys!=null) {
        if (user_keys.passphrase!=null && user_keys.secretkey!=null && user_keys.apikey!=null) {
            //console.log("decrypt");
            //console.log("decrypt");
            var decrypt_keys = Decrypt(user_keys.passphrase, user_keys.secretkey, user_keys.apikey)
            console.log(decrypt_keys)
            decrypt_keys = JSON.parse(decrypt_keys)


            let strForSign = ''
            let nonce = Date.now() + '';
            let method = 'GET'
            var endpoint = '/api/v1/accounts';
            strForSign = nonce + method + endpoint
            let signatureResult = crypto.createHmac('sha256', decrypt_keys.decrypt_seretkey)
                .update(strForSign)
                .digest('base64')
            let passphraseResult = crypto.createHmac('sha256', decrypt_keys.decrypt_seretkey)
                .update(decrypt_keys.decrypt_passphrase)
                .digest('base64')
            let balance = await GetKucoinAccount(signatureResult, passphraseResult, decrypt_keys.decrypt_apikey, nonce);
            allTickers = await GetAllTickers();

            console.log("we get all information")

            await balance;
            let msg = {
                code: "all right",
                balance: balance,
                allTickers: allTickers
            }
            return msg;
        }
        else{
            let msg={
                code:"Something went wrong"

            }
            return msg;
        }
    }
    else{
        let msg={
            code:"Something went wrong"

        }
        return msg;
    }


}

async function GetKucoinAccount(signatureResult, passphraseResult, apikey, nonce) {
    let balance = await fetch("https://api.kucoin.com/api/v1/accounts",
        {
            method: 'GET',
            headers: {
                'KC-API-SIGN': signatureResult,
                'KC-API-TIMESTAMP': nonce,
                'KC-API-KEY': apikey,
                'KC-API-PASSPHRASE': passphraseResult,
                'KC-API-KEY-VERSION': 2,
            }
        }
    ).then((res) => {
        return res.json()
    }).then((data) => {
        //    console.log(data)
        // get(data)
        return data;
    }).catch((err) => {
        console.log(err)
    })

    let acc = await balance;
    return acc;
}

async function GetAllTickers() {
    let Tickers = await fetch("https://api.kucoin.com/api/v1/market/allTickers",
        {
            method: 'GET',
        }
    ).then((res) => {
        return res.json()
    }).then((data) => {
        return data.data.ticker;
    }).catch((err) => {
        console.log(err)
    })
    let acc = await Tickers;
    //console.log("allTikers--->")
    //console.log(JSON.stringify(acc))
    //  console.log("tikers<---");

    return (acc);

}

Round = (lot, minLot) => {
    if (minLot == 1) {
        return parseInt(lot)
    }
    if (minLot > 1) {
        return parseInt(lot / minLot) * minLot
    }
    if (minLot < 1) {
        let counter = Math.pow(10, minLot.toString().split(".")[1].length)
        return parseInt(lot * counter, 10) / counter;
    }
}

function Decrypt(passphrase, secretkey, apikey) {


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


        // console.log("decrypt_apikey:", decrypted_apikey)
        // console.log("decrypt_seretkey:", decrypted_secreatkey)
        // console.log("decrypt_passphrase:", decrypted_passphrase)


        var msg = {
            decrypt_apikey: decrypted_apikey,
            decrypt_seretkey: decrypted_secreatkey,
            decrypt_passphrase: decrypted_passphrase
        }
        return JSON.stringify(msg)


}

setInterval(async function () {
    allTickers = await GetAllTickers();
}, 10000)

//953
//5000
server.listen(5000, function () {

    console.log("the server is listen")

});


///-----------------


///---------------
// class SymbolHandler {
//
//     symbols = [];
//
//     constructor() {
//         this.RequestSymbolInfo().then((symbols) => {
//             console.log("Symbol info request was done");
//         })
//     }
//
//     GetSymbolsInfo = async () => {
//
//         api.init(baseConfig);
//
//         let symbolInfo = await api.getSymbols().then((rsp) => {
//             return rsp;
//         })
//
//         return symbolInfo.data;
//     }
//
//     RequestSymbolInfo = async () => {
//         this.symbols = await this.GetSymbolsInfo();
//         return this.symbols;
//
//     }
//
//     GetSymbol = (symbolName) => {
//         return symbol_handler.symbols.find((symbol) => {
//             if (symbol.symbol === symbolName) return symbol;
//         })
//     }
// }

// module.exports = SymbolHandler;

//-------------------------

// ------------HEaders ---------------
// res.setHeader('Access-Control-Allow-Origin', '*');
// res.setHeader('Access-Control-Allow-Headers', 'origin, content-type, accept');
