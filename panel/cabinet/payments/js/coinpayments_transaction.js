import fetch  from "node-fetch";
let array = [];

//https://cunion.io/panel/cabinet/payments/php/ChekTransactionById.php
function getAllNotCompletedTransaction(){
    fetch('https://cunion.io/panel/cabinet/payments/php/GetAllNotCompletedTransactionList.php', {
        method: 'GET'
    }).then((response) => {
        return response.json();
    })
}

getAllNotCompletedTransaction();