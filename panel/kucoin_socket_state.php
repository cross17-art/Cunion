<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/user.php");

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php" </script>
    <?php
    die();
} else {
    $user = new User($_SESSION['user_email']);
    if(!$user->IsAdmin()){
        echo json_encode(array('status'=>'failed', 'msg'=>'no_permissions', 'text'=>'please login as admin or contact support'));
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HeartBit Kucoin</title>
    <div id="box" class="bac_box">

    </div>

    <div id="state" style="width: auto;">
        <div info></div>
        <!--        background: repeat url('poligon.png');-->
        <div sockets style=""></div>
    </div>

    <div id="users_state" class="user_div" style="width: auto;">
        <div Online users></div>
        <!--        background: repeat url('poligon.png');-->
        <div id="user" style=""></div>
    </div>

    <div id="users_accounts" class="socket" style="width: 550px">
        <table style="text-align: center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody id="accounts_table_body" style="font-size: 12px">

            </tbody>
        </table>
    </div>


</head>


<body>


</body>
</html>


<style>

    [info] {
        color: white;
        display: table;
        border: 2px solid red;
    }

    body {
        padding: 0px;
        margin: 0px;
        background: #131e22;
    }

    .socket {
        display: block !important;
        border: 2px solid chartreuse;
        background-color: #00E0C5;
        width: 270px;
        /*height: 250px;*/
        padding: 10px 10px 10px 10px;
        float: left;
        margin: 15px;
        opacity: 0.9;
        transform: scale(1);
        transition: transform 0.2s;
    }

    [sockets] {
        /*display: none;*/
        display: table;
        border: 2px solid blue;
    }

    h1 {
        font-size: 10px;
    }

    h2 {
        font-size: 15px;
    }

    li {
        font-size: 12px;
    }


    .bac_box {
        zoom: 29%;
        position: absolute;
        width: 100%;
        height: 100%;
        border: 2px solid red;
    }

    .star {
        top: 50%;
        left: 50%;
        height: 4px;
        width: 4px;
        border-radius: 100%;
        background: white;
        position: absolute;
    }

    .user_div {
        display: block !important;
        border: 2px solid chartreuse;
        background-color: #00E0C5;
        width: 270px;
        /*height: 250px;*/
        padding: 10px 10px 10px 10px;
        float: left;
        margin: 15px;
        opacity: 0.9;
        transform: scale(1);
        transition: transform 0.2s;
    }
    .user{
        display: block;
        text-align: left;
    }





</style>
<script>
    const R = 30;
    const startX = 50;
    const startY = 50;
    let window_XY_related = screen.width / screen.height
    drop_starts = () => {

        var box = document.getElementById("box");

        for (var i = 0; i < 1000; i++) {
            // Create 1000 DIV elements for confetti
            var div = document.createElement("div");
            div.classList.add("star");


            let position_X = (((Math.random() < 0.5) ? -1 : 1) * (Math.random() * (R)));
            let position_Y = (((Math.random() < 0.5) ? -1 : 1) * (Math.random() * (R)));


            if (position_X > 0 && position_Y > 0) { //rightUp

                // console.log("rightUp")

                position_X += startX;
                position_Y = startY - position_Y;
                // width -= b;
                // height -= b;


                var transport_x = -1 * Math.round((screen.width - position_X) * window_XY_related);
                var transport_y = Math.round((screen.height - position_Y) / window_XY_related);

                div.animate([
                    // keyframes
                    {transform: 'translate3D(0, 0, 0)'},
                    {transform: 'translate3D(' + -1 * ((screen.width) / 2) + 'px, ' + ((screen.height) - 1300) + 'px, 0)'}
                ], {
                    // timing options
                    duration: Math.floor(Math.random() * (5000)),
                    iterations: Infinity
                })
                console.log("transport_y  " + transport_y + "   transport_x " + transport_x)

            } else if ((position_X) < 0 && (position_Y) < 0) {//leftDown


                // console.log("leftdown")

                position_X = startX - -position_X;
                position_Y = startY + -position_Y;

                div.animate([
                    // keyframes
                    {transform: 'translate3D(0, 0, 0)'},
                    {transform: 'translate3D(' + ((screen.width) / 3) + 'px, ' + (800 - (screen.height)) + 'px, 0)'}
                ], {
                    // timing options
                    duration: Math.floor(Math.random() * (5000 - 1000)),
                    iterations: Infinity
                })
            } else if ((position_X) > 0 && (position_Y) < 0) {
                // console.log("right down")

                position_X = startX + position_X;
                position_Y = startY + -position_Y;


                div.animate([
                    // keyframes
                    {transform: 'translate3D(0, 0, 0)'},
                    {transform: 'translate3D(' + ((screen.width) / 3) + 'px, ' + (800 - (screen.height)) + 'px, 0)'}
                ], {
                    // timing options
                    duration: Math.floor(Math.random() * (5000 - 1000)),
                    iterations: Infinity
                })
            } else if ((position_X) < 0 && (position_Y) > 0) {
                // console.log("left up")

                position_X = startX - -position_X;
                position_Y = startY - position_Y;
                div.animate([
                    // keyframes
                    {transform: 'translate3D(0, 0, 0)'},
                    {transform: 'translate3D(' + -1 * ((screen.width) / 2) + 'px, ' + ((screen.height) - 1300) + 'px, 0)'}
                ], {
                    // timing options
                    duration: Math.floor(Math.random() * (5000 - 1000)),
                    iterations: Infinity
                })


            }
            // console.log("Second =>position_X  " + position_X + "   position_Y " + position_Y)
            // console.log("Second  => position_X -startX   " ,position_X -startX , "    position_Y - startY" ,  position_Y - startY)

            let X = position_X - startX;
            let Y = (position_Y - startY) * window_XY_related;
            let x2 = Math.pow(X, 2);
            let y2 = Math.pow(Y, 2);

            // console.log("x2+y2 = ", x2 + y2)

            if (x2 + y2 <= Math.pow(R, 2)) {


                // position_Y/=window_XY_related;


                div.style.top = position_X.toString() + "%";
                div.style.left = position_Y.toString() + "%";
                // div.animate([
                //     // keyframes
                //     { transform: 'translate3D(0, 0, 0)' },
                //     { transform: 'translate3D(-100px, -500px, 0)' }
                // ], {
                //     // timing options
                //     duration: 2000,
                //     iterations: Infinity
                // })
                // div.animate("animationStarLeftUp",1000)
                box.appendChild(div);


            }


            // let height= (Math.random() * (63-33 +1)+33);
        }
    }

    drop_starts()

    ProccedUser_Accounts = (data) => {

        document.querySelector("#accounts_table_body").innerHTML = "";

        data.account_balances.forEach((account)=>{
            console.log(account);
            let userAccountState = account.user_id + " | " + account.email + " | " + account.balance + " USdT | " + account.registration_date;
            let newTR = document.createElement('tr');
            newTR.innerHTML += "<td>" + account.user_id + "</td>"
            newTR.innerHTML += "<td>" + account.email + "</td>"
            newTR.innerHTML += "<td>" + account.balance + "</td>"
            newTR.innerHTML += "<td>" + account.registration_date + "</td>"

            document.querySelector("#accounts_table_body").appendChild(newTR);
        })
        debugger;
    }

    draw_online_users = (data) =>{

        delete_users()
        for(let i=0; i<data.length;i++){
            let div = document.createElement('div');
            div.innerHTML=data[i].user_id + " | " +data[i].come_time ;
            div.classList+="user"
            document.querySelector("#users_state").appendChild(div);
        }

    }
    delete_users =()=>{

        let len = document.getElementById("users_state").children.length
        for (let i = 1; i < len; i++) {
            document.getElementById("users_state").children[1].remove();
        }
    }
    let timer2 = setInterval(() => {
        fetch("https://cunion.io/panel/copy_server_api/kucoin/get_kucoin_socket_state.php").then((response) => {
            return response.json();
        }).then((data) => {
            // console.log(data);
            ProceedSocketState(data);
        })

        fetch("https://cunion.io/panel/cabinet/php_scripts/get_all_accounts_balances.php?key=admin_key").then((response) => {
            return response.json();
        }).then((data) => {
            // console.log(data);
            ProccedUser_Accounts(data);
        })


    }, 2000)

    let timer = setInterval(() => {
        let keys="9061"
        fetch("https://cunion.io:2087/online_users", {
            method: 'POST',
            body: JSON.stringify({key:keys})
        })
            .then((response) => {
                return response.json();
            }).then((data) => {
            // console.log(data);
            console.log(data);
            draw_online_users(data)
        })
    }, 1000)


    var lastDate = Date.now();

    ProceedSocketState = (data) => {

        if (data.date !== lastDate) {
            lastDate = data.date;
            let state = document.querySelector("#state");
            let info = document.querySelector("[info]");
            info.innerHTML = data.id + " | " + data.date;

            document.querySelector("title").innerHTML = data.id + " | HeartBeet Kucoin | ";

            let sockets = document.querySelector("#state > [sockets]");
            sockets.innerHTML = "";

            let socketStateArray = JSON.parse(data.state);
            // console.log(socketStateArray);
            socketStateArray.forEach((socketState) => {
                let socketElement = document.querySelector("[templateBlock] > [socket-template]").cloneNode(true);
                socketElement.querySelector("[masterEmail]").innerHTML = socketState.master_email;
                socketState.followers.forEach((follower) => {
                    let followerList = socketElement.querySelector('[followerList]');
                    let followerElement = followerList.querySelector('[follower]').cloneNode(true);
                    followerElement.innerHTML = follower.followerEmail + " | " + follower.scale
                    followerElement.style.display = 'block';
                    followerList.appendChild(followerElement);

                })

                sockets.appendChild(socketElement);
                socketElement.style.display = "block";
                setTimeout(() => {
                    socketElement.style.transform = "scale(1.05)";
                }, 10)
                setTimeout(() => {
                    socketElement.style.transform = "scale(1)";
                }, 200)
            })
        }
    }

</script>


<div templateBlock style="display: none">
    <div socket-template class="socket" style="display: none">
        <h1 name>Kucoin_socket</h1>
        <h2 masterEmail>masterEmail</h2>
        <ul followerList>
            <li follower style="display: none">follower</li>
        </ul>
    </div>
</div>
