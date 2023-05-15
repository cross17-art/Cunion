var myWs = new WebSocket('ws://178.127.170.210:9000');

async function SendMsg(){
    var text=document.getElementById('message').value;
    myWs.send(JSON.stringify({type: 'msg', data: text.toString()}))



    console.log(text);
}

function create_sender(){


    var main_div=document.createElement("div");
    main_div.className="chat-message-right pb-4";

    var second_div=document.createElement("div");
    var img_sd=new Image();
    img_sd.src="img/avatars/avatar.jpg";                                //Avatar
    img_sd.className="rounded-circle me-1";
    img_sd.width=40;
    img_sd.height=40;
    img_sd.alt="Ivan";                                                  //(rename) User name&&&& --нужно ли это?--
    var div_with_time=document.createElement("div");
    div_with_time.className="text-muted small text-nowrap mt-2";
    div_with_time.innerHTML="123123";                                   //time
    second_div.appendChild(img_sd);
    second_div.appendChild(div_with_time);

    var third_div=document.createElement("div");
    third_div.className="flex-shrink-1 bg-light rounded py-2 px-3 me-3";
    var div_with_name=document.createElement("div");
    div_with_name.className="fw-bold mb-1";
    div_with_name.innerHTML="Ivan";                                     //Second log
    third_div.appendChild(div_with_name);
    var div_with_msg=document.createElement("div");
    div_with_msg.innerHTML="msg";
    third_div.appendChild(div_with_msg);


    main_div.appendChild(second_div);
    main_div.appendChild(third_div);

    document.querySelector(".chat-messages.p-4").appendChild(main_div);


}





// myWs.onopen = function () {
//     console.log('подключился');
// };

// обработчик сообщений от сервера

// myWs.onmessage = function (message) {
//     console.log('Message: %s', message.data);
// };
// // функция для отправки echo-сообщений на сервер
// function wsSendEcho(value) {
//     myWs.send(JSON.stringify({action: 'ECHO', data: value.toString()}));
// }
// // функция для отправки команды ping на сервер
// function wsSendPing() {
//     myWs.send(JSON.stringify({action: 'PING'}));
// }
//



