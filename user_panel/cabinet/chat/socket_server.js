const WebSocket = require('ws');
// const mysql = require('mysql');
const wsServer = new WebSocket.Server({port: 9000});

//helloo from local

wsServer.on('connection', onConnect);
function onConnect(wsClient) {
    console.log('Новый пользователь');
    // отправка приветственного сообщения клиенту
    wsClient.send('Привет');
    wsClient.on('message', function(message) {
        const jsonMessage = JSON.parse(message);

        switch (jsonMessage.type) {
            case "msg":
                console.log(jsonMessage.data);

        }
    })
    wsClient.on('close', function() {
        // отправка уведомления в консоль
        console.log('Пользователь отключился');
    })
}


var servername = "localhost";
var username = "u1243966_brother";
var password = "trd_db_pass01";
var database = "u1243966_trade_brothers";

// const connection=mysql.createConnection({
//     host: servername,
//     user: username,
//     password: password,
//     database: database
// })
// connection.connect((err) => {
//     if (err) throw err;
//     console.log('Connected!');
// });
//
// function insert_db(){
//
//     var query="INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);"
//
//
// }