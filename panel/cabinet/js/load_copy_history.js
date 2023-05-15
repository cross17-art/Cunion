
function DisplayLogs(eventPairs){
    eventPairs.forEach((eventPair)=>{
        let eventPairElem=document.querySelector("[tr_event]").cloneNode(true);
        // document.getElementById("tbody").appendChild(eventPairElem)
        // document.querySelector(".odd").insertAdjacentElement("afterEnd",eventPairElem)
        document.getElementById("tbody").appendChild(eventPairElem);
        let time = new Date(eventPair.master.time);

        let formatTime = time.getDate() + "/" + (time.getMonth() + 1) + "/" + time.getUTCFullYear() + " " + time.getUTCHours() + ":" + time.getUTCMinutes() + ":"+ time.getUTCSeconds();
        eventPairElem.querySelector("[id]").innerHTML = eventPair.master.ourId;

        eventPairElem.querySelector("[time]").innerHTML = formatTime;
        eventPairElem.querySelector("[symbol]").innerHTML = eventPair.master.symbol;
        eventPairElem.querySelector("[master-email]").innerHTML = eventPair.master.masterEmail;

        // eventPairElem.querySelector("[symbol]>span").classList.add('badge');
        // eventPairElem.querySelector("[symbol]>span").classList.add('br-waring');

        eventPairElem.querySelector("[side]").innerHTML = eventPair.master.side;
        eventPairElem.querySelector("[quantity]").innerHTML = eventPair.master.quantity;


        if(eventPair.follower.status === "Success"){
            eventPairElem.querySelector("[quantity_follower]").innerHTML = eventPair.follower.quantity;
            eventPairElem.querySelector("[-ms]").innerHTML = time.getMilliseconds()+"ms";

            // eventPairElem.querySelector("[status]>span").classList.add('badge');
            // eventPairElem.querySelector("[status]>span").classList.add('bg-success');
            // eventPairElem.querySelector("[status]>span").style.fontSize='100%';
            eventPairElem.querySelector("[status]").classList.add('badge');
            eventPairElem.querySelector("[status]").classList.add('bg-success');
            eventPairElem.querySelector("[status]").style.fontSize='100%';

            // eventPairElem.querySelector("[status]>span").innerHTML=eventPair.follower.status;
            eventPairElem.querySelector("[status]").innerHTML=eventPair.follower.status;

            eventPairElem.querySelector("[msg]").innerHTML ="...";

        }
        if(eventPair.follower.status === "Failed"){
            //let tbl=creat_table(eventPair);
            eventPairElem.querySelector("[quantity_follower]").innerHTML = " ";
            eventPairElem.querySelector("[-ms]").innerHTML = " ";

            // eventPairElem.querySelector("[status]>span").classList.add('badge');
            // eventPairElem.querySelector("[status]>span").classList.add('bg-danger');
            // eventPairElem.querySelector("[status]>span").style.fontSize='100%';
            // eventPairElem.querySelector("[status]>span").innerHTML=eventPair.follower.status;
            eventPairElem.querySelector("[status]").classList.add('badge');
            eventPairElem.querySelector("[status]").classList.add('bg-danger');
            eventPairElem.querySelector("[status]").style.fontSize='100%';
            eventPairElem.querySelector("[status]").innerHTML=eventPair.follower.status;

            eventPairElem.querySelector("[msg]").innerHTML = eventPair.follower.message;


        }

        if(eventPair.follower.status === "Ignore"){
            // let tbl=creat_table(eventPair);

            // eventPairElem.querySelector("[status]>span").classList.add('badge');
            // eventPairElem.querySelector("[status]>span").classList.add('bg-warning');
            // eventPairElem.querySelector("[status]>span").style.fontSize='100%'
            eventPairElem.querySelector("[status]").classList.add('badge');
            eventPairElem.querySelector("[status]").classList.add('bg-warning');
            eventPairElem.querySelector("[status]").style.fontSize='100%';

            eventPairElem.querySelector("[status]>span ").innerHTML=eventPair.follower.status;
            eventPairElem   .querySelector("[msg]").innerHTML = eventPair.follower.message;
        }


    })

    document.querySelector("[tr_event]").remove();

    $("#datatables-dashboard-projects").DataTable({
        pageLength: 6,
        lengthChange: false,
        bFilter: false,
        autoWidth: false,
        ordering: false,
        // sPrevious : "<",
        // sNext  : ">"
        language: {
        "paginate": {
            "previous": "<",
            "next":">"
        }
    }

});


        document.querySelector(".page-link").innerText="<"
        document.querySelector(".paginate_button.page-item.next .page-link").innerText=">"


  


    document.getElementById("datatables-dashboard-projects_info").remove();

}



var logs = [];

var array_of_masterEvent=[];
var array_of_followerEvent=[];
var array_of_stateEvent=[];
var total_array=[];


 // var only_f=[];


async function showLogs(){
    fetch('https://cunion.io/panel/copy_server_api/get_socket_events.php', {
        method:'GET'
    }).then((response) => {
        return response.json();
    }).then((data) => {
        // console.log(data);
        logs = data.data;
        getAllLogs();
        //console.log(total_array);
        // help();
        DisplayLogs(total_array);
    })
}
// function help(){
//
//     logs.forEach((msg)=>{
//         let record = JSON.parse(msg.msg);
//         if (record.msg.role === "Follower") {
//
//             only_f.push(record.msg.data.status);
//
//         }
//     })
// }

function getAllLogs() {

    logs.forEach((msg) => {
        let masterEmail = msg.master_email;

        let record = JSON.parse(msg.msg);
        if (record.msg.role === "Master") {
            var masterEvent = {
                ourId: msg.id,
                time: record.msg.data.T,
                symbol: record.msg.data.s,
                orderID: record.msg.data.c,
                side: record.msg.data.S,
                quantity: record.msg.data.q,
                baseEvent: record,
                masterEmail: masterEmail
            }
            array_of_masterEvent.push(masterEvent);
        }

        if (record.msg.role === "Follower") {
            if (record.msg.eventType === "Failed Copy") {
                let followerEvent = {
                    status: "Failed",
                    code: record.msg.data.code,
                    message: record.msg.data.msg,
                    orderID: record.msg.parentID,
                    baseEvent: record,
                    code: record.msg.data.code
                }
                array_of_followerEvent.push(followerEvent);

            } else if (record.msg.eventType === "Success Copy") {
                let followerEvent = {
                    status: "Success",
                    time: record.msg.data.transactTime,
                    symbol: record.msg.data.symbol,
                    followerOrderID: record.msg.data.clientOrderId,
                    orderID: record.msg.parentID,
                    side: record.msg.data.side,
                    quantity: record.msg.data.executedQty,
                    baseEvent: record
                }
                array_of_followerEvent.push(followerEvent);

            } else if(record.msg.eventType === "Ignore Symbol"){
                let followerEvent =  {
                    status: "Ignore",
                    message: "This symbol is ignored",
                    orderID: record.msg.parentID,
                    baseEvent: record
                }

                array_of_followerEvent.push(followerEvent);
            }
        }

        if (record.msg.eventType === "State") {
            var status = {
                orderID: record.msg.parentID,
                baseEvent: record
            }
            array_of_stateEvent.push(status)
        }
    })


    // console.log("-------------");
    // console.log(array_of_masterEvent);
    //
    //
    // console.log("-------------");
    // console.log(array_of_followerEvent);
    //
    // console.log("-------------");
    // console.log(array_of_stateEvent);


    for (var i = 0; i < array_of_masterEvent.length; i++) {

        var formatFollower = getFollowerEvent(array_of_masterEvent[i].orderID);
        var formatState = getStateEvent(array_of_masterEvent[i].orderID);
        if(formatFollower!=null && formatState!=null) {
            total_array.push({master: array_of_masterEvent[i], follower: formatFollower, state: formatState})
        }
    }

    // console.log("-------------");
    // console.log(total_array);


}

function getFollowerEvent(masterOrderID) {
    for (var i = 0; i < array_of_followerEvent.length; i++) {
        if (masterOrderID === array_of_followerEvent[i].orderID) {
            return array_of_followerEvent[i];
        }
    }
    return null;
}

function getStateEvent(masterOrderID){
    for (var i = 0; i < array_of_stateEvent.length; i++) {
        if (masterOrderID === array_of_stateEvent[i].orderID) {
            return array_of_stateEvent[i];
        }
    }
    return null;
}

