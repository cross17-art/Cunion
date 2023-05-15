var iconUp = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-up align-middle me-2\"><polyline points=\"23 6 13.5 15.5 8.5 10.5 1 18\"></polyline><polyline points=\"17 6 23 6 23 12\"></polyline></svg>";
var iconDown = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-down align-middle me-2\"><polyline points=\"23 18 13.5 8.5 8.5 13.5 1 6\"></polyline><polyline points=\"17 18 23 18 23 12\"></polyline></svg>";

class  MasterOrderHistoryHandler{

    masterEmail;
    orderHistory = []
    constructor() {
        this.masterEmail = document.querySelector('[master_order_history_table]').getAttribute('email')
    }

    Init = async () => {
        this.orderHistory = await  this.LoadMasterOrdersHistory();
        this.DisplayOrderHistory(this.orderHistory);
    }

    LoadMasterOrdersHistory = async () => {
        let masterHistory = await fetch('https://cunion.io:2083', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({get_master_order_history: {master_email: this.masterEmail}})
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("---> History received...");
            return data;
        })

        return masterHistory;
    }


    DeleteMasterOrderHistory = async () => {
        let result = await fetch('https://cunion.io:2083', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({delete_master_order_history: {master_email: this.masterEmail}})
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("---> History deleted...");
            return data;
        })

    }

    DisplayOrderHistory = (history) => {
        console.log("display history...", history);
        let orderTemplate = document.querySelector('table[master_order_history_table]>tbody>tr[master_order_history_tr_template]');
        history.master_order_history.forEach((order, index, array) => {
            this.AppendOrder(order, orderTemplate);
            if(GetPageName() == 'master_page' && index < 20){
                this.AppendOrderToPublicView(order, orderTemplate)
            }
        })

        $("#master_order_history_table").DataTable({
            pageLength: 20,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            order: [[ 0, "desc" ]]
        });

    }
    //
    // AppendOrder = (order, orderTemplate) => {
    //     var newOrderTr = orderTemplate.cloneNode(true);
    //     let date = new Date(order.date);
    //     newOrderTr.querySelector('td[date]').innerHTML = date_handler.Format(date);
    //
    //     newOrderTr.querySelector('td>span[symbol]').innerHTML = order.symbol;
    //     let icon1 = link_icon[search_image(order.symbol.split("-")[0])];
    //     let icon2 = link_icon[search_image(order.symbol.split("-")[1])];
    //     newOrderTr.querySelector(".quote-asset").setAttribute('src', icon1 == undefined ? "" : icon1.currentSRC);
    //     newOrderTr.querySelector(".base-asset").setAttribute('src', icon2 == undefined ? "" : icon2.currentSRC);
    //
    //     if (order.side === 'buy') {
    //         newOrderTr.querySelector('td[side]').style.color = '#4bbf73'
    //         newOrderTr.querySelector('td[side]').innerHTML = 'Buy ' + iconUp;
    //     } else {
    //         newOrderTr.querySelector('td[side]').innerHTML = 'Sell ' + iconDown;
    //         newOrderTr.querySelector('td[side]').style.color = '#d9534f'
    //     }
    //
    //     newOrderTr.querySelector('td[qty]').innerHTML = order.qty;
    //     document.querySelector('table[master_order_history_table]>tbody').appendChild(newOrderTr);
    //     newOrderTr.style.display = "";
    // }

    CreateNewTR = (order, orderTemplate) => {
        var newOrderTr = orderTemplate.cloneNode(true);
        let date = new Date(order.date);
        newOrderTr.querySelector('td[date]').innerHTML = date_handler.Format(date);

        newOrderTr.querySelector('td>span[symbol]').innerHTML = order.symbol;
        let icon1 = link_icon[search_image(order.symbol.split("-")[0])];
        let icon2 = link_icon[search_image(order.symbol.split("-")[1])];
        newOrderTr.querySelector(".quote-asset").setAttribute('src', icon1 == undefined ? "" : icon1.currentSRC);
        newOrderTr.querySelector(".base-asset").setAttribute('src', icon2 == undefined ? "" : icon2.currentSRC);

        if (order.side === 'buy') {
            newOrderTr.querySelector('td[side]').style.color = '#4bbf73'
            newOrderTr.querySelector('td[side]').innerHTML = 'Buy ' + iconUp;
        } else {
            newOrderTr.querySelector('td[side]').innerHTML = 'Sell ' + iconDown;
            newOrderTr.querySelector('td[side]').style.color = '#d9534f'
        }

        newOrderTr.querySelector('td[qty]').innerHTML = order.qty;

        let orderPrice = "--";
        if(order.master_order_statistics != 'undefined'){
            let orderStatistics = JSON.parse(order.master_order_statistics);
            if(orderStatistics != null && orderStatistics != undefined){
                  orderPrice = this.GetOrderPrice(orderStatistics);
            }
        }
        newOrderTr.querySelector('td[price]').innerHTML = parseInt(orderPrice * 10000) / 10000;

        return newOrderTr;
    }


    AppendOrderToTable = (tableElem, newOrderTr) => {
        tableElem.appendChild(newOrderTr);
        newOrderTr.style.display = "";
    }

    AppendOrder = (order, orderTemplate) => {
        let newOrderTr = this.CreateNewTR(order, orderTemplate)
        let tableElem = document.querySelector('table[master_order_history_table]>tbody')
        this.AppendOrderToTable(tableElem, newOrderTr)
    }


    AppendOrderToPublicView = (order, orderTemplate) => {
        let newOrderTr = this.CreateNewTR(order, orderTemplate)
        let tableElem = document.querySelector('table[public_master_order_history_table]>tbody')
        this.AppendOrderToTable(tableElem, newOrderTr)
        console.log("append public")
    }

    GetOrderPrice(orderStatistics){
        return orderStatistics.dealFunds/orderStatistics.dealSize;
    }

}

const master_order_history_handler = new MasterOrderHistoryHandler()

master_order_history_handler.Init();