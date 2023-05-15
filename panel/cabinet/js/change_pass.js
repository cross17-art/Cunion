function ChangeNickname() {
    console.log("nickname");
    document.querySelector("#change_nickname_suc").style.display = "none";
    document.querySelector("#change_nickname_failed").style.display = "none";

    let new_nickname = document.querySelector("[name = new_nickname]").value;

    console.log("Sending nickname:" + " new_nickname:" + new_nickname);




    if (new_nickname.length != 0) {
        // var regex = /[a-zA-Z0-9]{4,15}[^\s!<>?-@#=+-;'"`$]/g;
        var regex = /[\w]{3,15}[^ $!()#-&@;'"`<>?@()]/g;
        var newstr = new_nickname.match(regex);

        if (newstr!=null && newstr[0].length === new_nickname.length) {
            document.querySelector("#change_nickname_spinner").style.display = "inline-block";
            fetch('https://cunion.io/panel/php_scripts/set_new_nickname.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',

                },
                body: "new_Nickname=" + new_nickname
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(data);
                document.querySelector("#change_nickname_spinner").style.display = "none";
                document.querySelector("#change_nickname_suc").style.display = "block";
                location.reload();
            });
        }else{
            console.log("incorrect passed regex");
            document.querySelector("#change_nickname_failed").style.display = "block";
            document.querySelector("#change_nickname_failed div").innerText = "Fill in the field"
        }


    } else {
        console.log("incorrect passed");
        document.querySelector("#change_nickname_failed").style.display = "block";
        document.querySelector("#change_nickname_failed div").innerText = "Fill in the field"
    }

}

function ChangePass() {
    console.log("pass change");


    document.querySelector("#change_pass_success").style.display = "none";
    document.querySelector("#change_pass_failed").style.display = "none";
    document.querySelector("#restore_pass_success").style.display = "none";

    let new_pass = document.querySelector("[name = new_pass]").value;
    let repeat_pass = document.querySelector("[name = repeat_pass]").value;
    let old_pass = document.querySelector("[name = old_pass]").value;

    console.log("Sending key:" + " new_pass:" + new_pass + ", repeat_pass:" + repeat_pass);

    if(new_pass.length!=0 &&  repeat_pass.length!=0 && old_pass.length!=0) {
         if (new_pass === repeat_pass) {
            document.querySelector("#change_pass_spinner").style.display = "inline-block";
            fetch('https://cunion.io/panel/php_scripts/set_new_pass.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: "new_pass=" + new_pass + "&repeat_pass=" + repeat_pass+"&old_pass="+old_pass
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(data);
                if(data.status==2412){
                    notify("danger","The old password doesn't match")
                }else if(data.status === 9090){
                    notify("warning","This password has been previously used")
                }else{
                    notify("success","Password changed successfully")
                }

                document.querySelector("#change_pass_spinner").style.display = "none";
                resetValueFields()
                // document.querySelector("#change_pass_success").style.display = "block";
            });
        } else {
            console.log("incorrect passed");
            notify("warning","The new passwords don't match")

            // document.querySelector("#change_pass_failed").style.display = "block";
        }
    }else{
        notify("danger","Please fill in the fields")
    }

}

function RestorePass() {
    console.log("pass restore");


    document.querySelector("#change_pass_success").style.display = "none";
    document.querySelector("#change_pass_failed").style.display = "none";
    document.querySelector("#restore_pass_success").style.display = "none";


    document.querySelector("#change_pass_spinner").style.display = "inline-block";
    fetch('https://cunion.io/panel/php_scripts/restore_password.php', {
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
notify = (type, mes) => {
    var message = mes;
    var type = type
    var duration = "5000"
    var ripple = true
    var dismissible = false
    var positionX = "right"
    var positionY = "top"
    window.notyf.open({
        type,
        message,
        duration,
        ripple,
        dismissible,
        position: {
            x: positionX,
            y: positionY
        }
    });
}

function resetValueFields(){
    document.querySelector("[name = new_pass]").value="";
    document.querySelector("[name = repeat_pass]").value="";
    document.querySelector("[name = old_pass]").value="";
}