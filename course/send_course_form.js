

function SendForm(){
    let name = document.querySelector("input[name=name]").value;
    let email = document.querySelector("input[name=email]").value;
    let phone = document.querySelector("input[name=phone]").value;


    if(name != null && email != null && email.includes('@')){
        fetch('https://cunion.io/course/save_course_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name:name,
                email:email,
                phone:phone
            })
        }).then((response) => {
            return response.json();// TODO json
        }).then((data) => {
            console.log(data);
            document.querySelector("#registration_form").style.display = "none";
            document.querySelector("#success_form").style.display = "block";
        });
    } else {
        console.log("Wrong data");
    }
}


