var mysql = require('mysql');
var connection;


GetConnection = ()=>{

    connection = mysql.createConnection({
        host: 'localhost',
        user: 'trd_db_user',
        password: 'trd_db_pass01',
        database: 'trd_db'
    });
    connection.connect(function (err){
        if(err){
            throw err;
        }
    })
    return connection;
}

// async function get_keys(email) {
//     var qi = "SELECT accounts.apikey,accounts.secretkey, accounts.passphrase FROM `accounts` JOIN users on users.id=user_id where users.email= ?";
//    // console.log('qi from bd')
//     let result = new Promise((resolve, reject) => {
//         connection.query(qi, email, (err, rows, failds) => {
//             if (err) {
//                 reject(err.text());
//                 return;
//             }
//             // console.log("rows", rows)
//             // console.log("rows[0]", rows[0])
//             // console.log(rows[0]===undefined)
//             let user=null;
//             // console.log(!(rows[0]!=undefined))
//             if(rows[0]!=undefined)
//             {
//
//
//               user= {
//                     apikey: rows[0].apikey,
//                     secretkey: rows[0].secretkey,
//                     passphrase: rows[0].passphrase
//                 }
//             }
//             resolve(user);
//         });
//     })
//     let a = await result;
//     // console.log("user",user)
//     return a;
// }



GETKEYS = async (email) => {
    // connection = mysql.createConnection({
    //     host: 'localhost',
    //     user: 'trd_db_user',
    //     password: 'trd_db_pass01',
    //     database: 'trd_db'
    // });
    // let connectionPromise = await new Promise((resolve, reject) => {
    //     let res = connection.connect(function (err) {
    //         if (err) {
    //             reject(err);
    //             throw err;
    //         }
    //
    //     //    console.log("connection 1")
    //         resolve(res);
    //     })
    // })

    await GetConnection();
    var user;

//    user = await get_keys(email);
    var qi = "SELECT accounts.apikey,accounts.secretkey, accounts.passphrase FROM `accounts` JOIN users on users.id=user_id where users.email= ?";
    // console.log('qi from bd')
    let result = new Promise((resolve, reject) => {
        connection.query(qi, email, (err, rows, failds) => {
            if (err) {
                reject(err.text());
                return;
            }
            // console.log("rows", rows)
            // console.log("rows[0]", rows[0])
            // console.log(rows[0]===undefined)
            let user=null;
            // console.log(!(rows[0]!=undefined))
            if(rows[0]!=undefined)
            {


                user= {
                    apikey: rows[0].apikey,
                    secretkey: rows[0].secretkey,
                    passphrase: rows[0].passphrase
                }
            }
            resolve(user);
        });
    })
     await result;
    // console.log("user",user)


    return result;
}


GetKeysById =  async (Id)=>{

    await GetConnection();
    console.log("enter in getkeysbyid",Id)
    var qi = "SELECT accounts.apikey,accounts.secretkey, accounts.passphrase FROM `accounts` JOIN users on users.id=user_id where users.id= ?";
    // console.log('qi from bd')
    let result = new Promise((resolve, reject) => {
        connection.query(qi, Id, (err, rows, failds) => {
            if (err) {
                reject(err);
                console.log("error in db ",err)
                return;
            }
            // console.log("rows", rows)
            // console.log("rows[0]", rows[0])
            // console.log(rows[0]===undefined)
            let user=null;
            console.log("rows from db",rows[0])
            if(rows[0]!=undefined)
            {
                console.log(rows[0].apikey)
                console.log(rows[0].secretkey)
                console.log(rows[0].passphrase)
                user= {
                    apikey: rows[0].apikey,
                    secretkey: rows[0].secretkey,
                    passphrase: rows[0].passphrase
                }
            }
            resolve(user);
        });
    })
    return await result
}

module.exports = {GETKEYS,GetKeysById};
// module.exports = {GetKeysById};