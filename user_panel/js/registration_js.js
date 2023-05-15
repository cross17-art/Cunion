
document.getElementById("submit_register_form_button").addEventListener("click", function(event){
    event.preventDefault()
});

function Register(){
    console.log("Register");

    RunLoader();

    let email = document.querySelector("#Email").value;
    let pass = document.querySelector("#Pass").value;
    fetch('https://cunion.io/client/php_scripts/registration.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "user_email=" + email + "&user_pass=" + pass
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data);
        HideLoader();
        ProcessRegistrationResponse(data);
    });
}

// --- Loader
function RunLoader(){
    document.querySelector(".cf-loader").style.display = "inline";
}

function HideLoader(){
    document.querySelector(".cf-loader").style.display = "none";
}

// --- Response Action
function ProcessRegistrationResponse(_data){
    console.log("Registration Processing");

    let data = {
        status: "",
        user_email: "",
        message: "",
        code: -1
    };

    data = _data;
    console.log(data);

    if(data.code === 1 ){
        if(data.status === "reg_success"){
            console.log("status success")
        }
    } else if(data.code === -1){
        if(data.status === "reg_failed"){
            console.log("status failed")
        }
    }

}