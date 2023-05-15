
document.querySelector("[type = submit]").addEventListener("click", function(event){
    event.preventDefault()
});

function RestorePass(){
    let email = document.querySelector("[name = email]").value;

    console.log("try to restore pass via email:" + email);

    document.querySelector(".alert-danger").style.display = "none";
    document.querySelector(".alert-success").style.display = "none";

    RunLoader();

    fetch('https://cunion.io/client/php_scripts/restore_password.php', {
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
        }
    } else if(data.code === -1){
        if(data.status === "failed"){
            console.log("restore failed");
            document.querySelector(".spinner-border").style.display = "none";
            document.querySelector(".alert-danger > .alert-message").innerHTML = "<strong>failed! </strong>" + data.message;
            document.querySelector(".alert-danger").style.display = "block";
        }
    }
}
