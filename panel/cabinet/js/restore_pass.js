
document.querySelector("[type = submit]").addEventListener("click", function(event){
    event.preventDefault()
});

function RestorePass(){
    let email = document.querySelector("[name = email]").value;

    console.log("try to restore pass via email:" + email);

    document.querySelector(".alert-danger").style.display = "none";
    document.querySelector(".alert-success").style.display = "none";

    // RunLoader();
    //

    if(email.length !=0){

        if(validateEmail(email)){
            fetch('https://cunion.io/panel/php_scripts/restore_password.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: "user_email=" + email
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(data);
                ProcessRestoreResponse(data);
            });
        }else{
            notify("warning","Invalid mail")
            StopLoader();
        }

    }
    else{
        notify("danger","Fill in the fields")

    }

}

function RunLoader(){
    document.querySelector(".spinner-border").style.display = "inline-block";
}

function ProcessRestoreResponse(_data){
    console.log("Restore Pass Processing");

    let data = {
        status: "",
        user_email: "",
        message: "",
        code: -1
    };

    data = _data;
    console.log(data);

    if(data.code === 1 ){
        if(data.status === "success"){
            console.log("restore success");
            document.querySelector(".spinner-border").style.display = "none";
            document.querySelector(".alert-success > .alert-message").innerHTML = "<strong>Success! </strong>" + data.message;
            document.querySelector(".alert-success").style.display = "block";
            document.querySelector("[type = submit]").style.display = "none";
            setTimeout(()=>{
                location.href = "https://cunion.io/panel/cabinet/sign_in_form";
            },2000)
        }

    } else if(data.code === -1){
        if(data.status === "failed"){
            console.log("restore failed");
            document.querySelector(".spinner-border").style.display = "none";
            document.querySelector(".alert-danger > .alert-message").innerHTML = "<strong>failed! </strong>" + data.message;
            document.querySelector(".alert-danger").style.display = "block";
            setTimeout(()=>{
                document.querySelector(".spinner-border").style.display = "none";
                document.querySelector(".alert-danger > .alert-message").innerHTML = "<strong>failed! </strong>" + data.message;
                document.querySelector(".alert-danger").style.display = "none";

            },2000)

        }
    }
}

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

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
