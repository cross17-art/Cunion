

function ChangeNickname(){
    console.log("nickname");
    document.querySelector("#change_nickname_suc").style.display = "none";
    document.querySelector("#change_nickname_failed").style.display = "none";

        let new_nickname = document.querySelector("[name = new_nickname]").value;

    console.log("Sending nickname:" + " new_nickname:" + new_nickname);

    if(new_nickname){
        document.querySelector("#change_nickname_spinner").style.display = "inline-block";
        fetch('https://cunion.io/client/php_scripts/set_new_nickname.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: "new_Nickname="+ new_nickname
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data);
            document.querySelector("#change_nickname_spinner").style.display = "none";
            document.querySelector("#change_nickname_suc").style.display = "block";
        });
    } else {
        console.log("incorrect passed");
        document.querySelector("#change_nickname_failed").style.display = "block";
    }

}
function ChangePass(){
    console.log("pass change");


    document.querySelector("#change_pass_success").style.display = "none";
    document.querySelector("#change_pass_failed").style.display = "none";
    document.querySelector("#restore_pass_success").style.display = "none";

    let new_pass = document.querySelector("[name = new_pass]").value;
    let repeat_pass = document.querySelector("[name = repeat_pass]").value;

    console.log("Sending key:" + " new_pass:" + new_pass + ", repeat_pass:" + repeat_pass);

    if(new_pass === repeat_pass){
        document.querySelector("#change_pass_spinner").style.display = "inline-block";
        fetch('https://cunion.io/client/php_scripts/set_new_pass.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: "new_pass=" + new_pass + "&repeat_pass=" + repeat_pass
        }).then((response) => {
            return response.json();
        }).then((data) => {
            console.log(data);
            document.querySelector("#change_pass_spinner").style.display = "none";
            document.querySelector("#change_pass_success").style.display = "block";
        });
    } else {
        console.log("incorrect passed");
        document.querySelector("#change_pass_failed").style.display = "block";
    }
}

function RestorePass(){
    console.log("pass restore");


    document.querySelector("#change_pass_success").style.display = "none";
    document.querySelector("#change_pass_failed").style.display = "none";
    document.querySelector("#restore_pass_success").style.display = "none";


    document.querySelector("#change_pass_spinner").style.display = "inline-block";
    fetch('https://cunion.io/client/php_scripts/restore_password.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
        document.querySelector("#change_pass_spinner").style.display = "none";
        document.querySelector("#restore_pass_success").style.display = "block";
    });

}