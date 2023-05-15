var timeStart;
var myWss;

// обработчик проинформирует в консоль когда соединение установится

function ConnectToSocketServer(){
    timeStart = Date.now();
    myWss= new WebSocket('wss://cunion.io:8443');
    myWss.onopen = function () {
        console.log('подключился');
        console.log("delay:", Date.now() - timeStart);
    };
};

// myWss.onmessage = function (message) {
//     console.log(Date.now() + "tickers:" + Object.entries(JSON.parse(message.data)).length);
// };