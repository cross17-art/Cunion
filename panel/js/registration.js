
document.getElementById("submit_register_form_button").addEventListener("click", function(event){
    event.preventDefault()
});

function Register(){
    console.log("Register");

    RunLoader();

    let email = document.querySelector("#Email").value;
    let pass = document.querySelector("#Pass").value;
    fetch('https://cunion.io/panel/php_scripts/registration.php', {
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
            console.log("status success");
            window.scrollTo(0, 0);
            document.querySelector(".error-box").style.display = "none";
            document.querySelector("#submit_register_form_button").style.display = "none";
            document.querySelector(".registration-input-section").style.opacity = "0";
            document.querySelector(".registration-input-section").style.visibility = "hidden";


            document.querySelector(".success-box").style.display = "block";
            document.querySelector(".success-box").innerHTML = data.message;


            document.querySelector("#column_registration_instruction").style.display = "none";
            document.querySelector("#column_registration_success_information").style.display = "block";
            document.querySelector("#column_registration_success_information").style.opacity = "1";

            setTimeout(() => {
                document.querySelector(".success-box").style.trasition = "opacity:0.7s";
                document.querySelector(".success-box").style.opacity = "0";
            }, 1000);


            setTimeout(() => {
                document.querySelector("#column_registration_block").style.display = "none";
                document.querySelector("#column_cabinet_access").style.display = "block";
            }, 1700);


        }
    } else if(data.code === -1){
        if(data.status === "reg_failed"){
            console.log("status failed");
            document.querySelector(".error-box").style.display = "block";
            document.querySelector(".alert-warning").innerHTML = data.message;
        }
    }

}

function SendKeys(){
    console.log("sending keys...")
}