document.onreadystatechange = function (){

    if(document.readyState === "interactive"){
        console.log("page ready. Loading user");
        user.GetModel();

    }
}

function InitUserState(){
    ProcessVerificationState();
    ProcessConnectionState();

    if(!user.connected || !user.verified){
        if(document.querySelector("#finish_verification_message_box") != null){
            document.querySelector("#finish_verification_message_box").style.display = "block";
            document.querySelector("#success_verification_message_box").style.display = "none";
        }

    } else {
        if(document.querySelector("#finish_verification_message_box") != null){
            document.querySelector("#finish_verification_message_box").style.display = "none";
            document.querySelector("#success_verification_message_box").style.display = "block";
        }
    }



}
Init_user_auth = () =>{
    if(user.authentication_verified === '0'){
        document.querySelector('#recive_token').style.display=''
    }else{

    }
}

function ProcessVerificationState(){
    // document.querySelectorAll(".verification_spinner").forEach((spinner) => {
    //     spinner.style.display = "none";
    // });

    if(!user.verified){


        document.querySelector("#email_verification_main_window").style.display = "block";

        // if(document.querySelector("#verified_icon_button") != null){
        //     document.querySelector("#not_verified_icon_button").style.display = "block";
        //     document.querySelector("#verified_icon_button").style.display = "none";
        // }

    }
    // else {
    //
    //     if(document.querySelector("#verified_icon_button") != null){
    //         document.querySelector("#not_verified_icon_button").style.display = "none";
    //         document.querySelector("#verified_icon_button").style.display = "block";
    //     }
    // }
}

function  ProcessConnectionState(){

    if(!user.connected){
        if(document.querySelector(".tab-pane.fade.active.show")!=null) {
            let child = document.querySelector(".tab-pane.fade.active.show").children
            child[0].style.display = 'block'
            document.querySelector("#popup_weekly_sales").style.display = "block";
            //document.querySelector("#api_form").style.display='block'
            if (document.querySelector("#api_key_submit") != null) {
                document.querySelector("#api_key_submit").style.display = "block";
                document.querySelector("#api_key_rebind").style.display = "none";
            }

            if (document.querySelector("#connected_icon_button") != null) {
                document.querySelector("#not_connected_icon_button").style.display = "block";
                document.querySelector("#connected_icon_button").style.display = "none";
            }
        }

    } else {



        // document.querySelector(".connection-badge").classList.remove("bg-warning");
        // document.querySelector(".connection-badge").classList.add("bg-success");


        if(document.querySelector("#api_key_submit") != null){
            document.querySelector("#api_key_submit").style.display = "none";
            document.querySelector("#api_key_rebind").style.display = "block";
            document.querySelector("input[name = api_key]").value = user.apiKey;
            document.querySelector("input[name = secret_key]").value = user.secretKey;

            ShowConnectionMiniForm();
        }

        // if(document.querySelector("#connected_icon_button") != null) {
        //     document.querySelector("#not_connected_icon_button").style.display = "none";
        //     document.querySelector("#connected_icon_button").style.display = "block";
        // }

    }

}