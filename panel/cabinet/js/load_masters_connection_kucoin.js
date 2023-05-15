
let total=[]
async function Get_user_connection_to_masters(){
    let email = user.email;
    console.log("try to login via email:" + email);


     total =await fetch('https://cunion.io/panel/php_scripts/get_master_connection_kucoin.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "user_email=" + email
    }).then((response) => {
        // console.log("response return list of masters connected to current user  ",response)
        return response.json();
    }).then((data) => {
        return JSON.parse(data)
    });

     // let main_master_div = document.createElement("div");
     // main_master_div.style.marginLeft = '2%';
     // main_master_div.style.border = '2px solid green';
     // main_master_div.style.display = 'inline-block';
     //
     // let table =

    //let div_mater = document.querySelector("#first_master_connection").cloneNode(2);

    if(total.length>0) {
        for (var i = 0; i < total.length; i++) {
            let main_div = document.querySelector("[first_master_connection]").cloneNode(2)
            main_div.querySelector("[master_link]").innerHTML = total[i].nickname == null ? "no_name" : total[i].nickname;
            main_div.querySelector("[master_link]").setAttribute('href', "https://cunion.io/panel/cabinet/cabinet_master_page.php?master-id=" + total[i].id);
            // main_div.querySelector("[scale_coef]").innerHTML = "X" + total[i].scale;

            document.querySelector("[first_master_connection]").parentElement.appendChild(main_div)
            // document.querySelector("[current-connections-block]").style.display='';

        }
        document.querySelector("[first_master_connection]").remove();

    }
    else{
        // let h = document.createElement('h');
        // h.innerHTML= 'Unfortunately, you are not connected to the masters, and therefore you cannot have money ';
        // document.querySelector("[first_master_connection]").parentElement.appendChild(h);
        // document.querySelector("[first_master_connection]").parentElement.appendChild(h);
        document.querySelector("[first_master_connection]").remove();

    }





}

Get_user_connection_to_masters();