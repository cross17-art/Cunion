
document.querySelector("[type = submit]").addEventListener("click", function(event){
    event.preventDefault()
});

function Login(){
    let email = document.querySelector("[name = email]").value;
    let pass = document.querySelector("[name = password]").value;

    console.log("try to login via email:" + email + ", pass:" + pass);

    document.querySelector(".alert-danger").style.display = "none";
    document.querySelector(".alert-success").style.display = "none";

    RunLoader();

    fetch('https://cunion.io/client/php_scripts/log_in.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "user_email=" + email + "&user_pass=" + pass
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
        ProcessLoginResponse(data);
    });
}

function RunLoader(){
    document.querySelector(".spinner-border").style.display = "inline-block";
}

function HideLoader(){
    document.querySelector(".spinner-border").style.display = "none";
}

function ProcessLoginResponse(_data){
    console.log("Login Processing");

    let data = {
        status: "",
        user_email: "",
        message: "",
        code: -1
    };

    data = _data;
    console.log(data);

    if(data.code === 1 ){
        if(data.status === "login_success"){
            console.log("login success");
            document.querySelector(".spinner-border").style.display = "none";
            document.querySelector(".alert-success > .alert-message").innerHTML = "<strong>Success! </strong>" + data.message;
            document.querySelector(".alert-success").style.display = "block";
            setTimeout(() => {
                RedirectToCabinet();
            }, 700)

        }
    } else if(data.code === -1){
        if(data.status === "login_failed"){
            console.log("login failed");
            document.querySelector(".spinner-border").style.display = "none";
            document.querySelector(".alert-danger > .alert-message").innerHTML = "<strong>failed! </strong>" + data.message;
            document.querySelector(".alert-danger").style.display = "block";
        }
    }
}

function RedirectToCabinet(){
    location.href = "https://cunion.io/client/cabinet/cabinet.php"
}