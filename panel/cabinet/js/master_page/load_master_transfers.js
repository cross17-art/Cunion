class TransferLoader {

    masterEmail;
    transferHistory = []
    transferList = [];

    constructor() {
        if (GetPageName() == 'master_page') {
            this.masterEmail = document.querySelector('[master_order_history_table]').getAttribute('email')
        }
    }

    LoadMasterTransfersHistory = async () => {
        let transferHistory = await fetch('https://cunion.io:2083', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({get_master_transfer_history: {master_email: this.masterEmail}})
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("---> Transfer History received...");
            return data;
        })


        this.transferHistory = transferHistory.master_transfer_history;

        this.transferList[this.masterEmail] = [];
        transferHistory.master_transfer_history.forEach((_transfer_record) => {
            const transfer = new Transfer(_transfer_record)
            const userEmail = transfer.userEmail;
            this.transferList[userEmail].push(transfer);
        })
        return transferHistory.master_transfer_history

    }

    LoadAllTransfersByEmailList = async (email_array) => {

        let transferHistory = await fetch('https://cunion.io:2083', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({get_masters_transfer_history_list: {master_email_list: email_array}})
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("---> Transfer History received...");
            console.log(data.length);
            return data;
        })


        transferHistory.master_transfer_history_list.forEach((_transferRecord) => {
            const transfer = new Transfer(_transferRecord);
            const userEmail = transfer.userEmail;
            if (this.transferList[userEmail] != undefined) {
                this.transferList[userEmail].push(transfer);
            } else {
                this.transferList[userEmail] = [];
                this.transferList[userEmail].push(transfer);
            }
        });

        return transferHistory.master_transfer_history_list;
    };

    DisplayTransfersOnMasterPage(transfers) {
        console.log("displaying transfers");
        let totalTransfer = 0;

        const transferTemplate = document.querySelector('[transfer-template]');
        const fullTransferTemplate = document.querySelector('[full-transfer-template]');
        const transferTableBody = document.querySelector('[transfer-table-body]');
        const fullTransferTableBody = document.querySelector('[full-transfer-table-body]');

        let preparedTransfers = []

        transfers.forEach((_transferRecord, index, array) => {
            const transfer = new Transfer(_transferRecord);
            if (Math.abs(transfer.funds) > 0.01) {
                preparedTransfers.push(_transferRecord);
            }
        });

        preparedTransfers.forEach((_transferRecord, index, array) => {
            const transfer = new Transfer(_transferRecord);
            let date = transfer.GetDate();
            let asset = transfer.GetAssetName();
            let assetAmount = transfer.GetAssetAmount();
            let funds = transfer.GetFunds();
            let btcFunds = transfer.GetBTCFunds();

            totalTransfer += funds;

            let newTransferElement = transferTemplate.cloneNode(true);
            let newFullTransferElement = fullTransferTemplate.cloneNode(true);

            if (index >= array.length - 5) {
                newTransferElement.querySelector('[transfer-date]').innerHTML = date;
                newTransferElement.querySelector('[transfer-asset-name]').innerHTML = asset;
                newTransferElement.querySelector('[transfer-asset-amount]').innerHTML = parseInt(assetAmount * 100000) / 100000;
                newTransferElement.querySelector('[transfer-funds]').innerHTML = parseInt(funds * 1000) / 1000;
                newTransferElement.style.display = '';
                transferTableBody.appendChild(newTransferElement);
            }

            newFullTransferElement.querySelector('[transfer-date]').innerHTML = date;
            newFullTransferElement.querySelector('[transfer-asset-name]').innerHTML = asset;
            newFullTransferElement.querySelector('[transfer-asset-amount]').innerHTML = parseInt(assetAmount * 10000) / 10000;
            newFullTransferElement.querySelector('[transfer-funds]').innerHTML = parseInt(funds * 1000) / 1000;
            newFullTransferElement.querySelector('[transfer-btc-funds]').innerHTML = parseInt(btcFunds * 1000) / 1000;
            newFullTransferElement.style.display = '';
            fullTransferTableBody.appendChild(newFullTransferElement);

        })

        return totalTransfer;
    }

    GetSumTransferByMasterEmailFromToDay = (master_email, date_from, date_to) => {
        let totalUSDTTransferAmount = 0;
        if (this.transferList[master_email] != undefined) {
            /**
             @param {Transfer} transfer
             */
            this.transferList[master_email].forEach((transfer) => {

                //Something is wrong with the server time zone in values date_from, date_to, transfer Date
                let dateFromEndDay = new Date(date_from); //Calculateing the end of the day to catch the transfer that was made after the balance point was placed
                dateFromEndDay.setHours(dateFromEndDay.getHours() + 3); //To calculate correct time need to pluss 3 hours. Will be in moscow time
                // dateFromEndDay.setMinutes(59);
                // dateFromEndDay.setSeconds(59);
                let date_to_Moscow = new Date(date_to);
                date_to_Moscow.setHours(date_to_Moscow.getHours() + 3);

                if (transfer.date >= date_to && transfer.date <= date_from) {
                    totalUSDTTransferAmount += transfer.funds;
                }


                // if(new Date(transfer.date) >= date_to_Moscow && new Date(transfer.date) <= dateFromEndDay){
                //     totalUSDTTransferAmount += transfer.funds;
                // }
            })
        } else {
            console.log("Error while calculating the transfer sum + err:1125");
        }

        return totalUSDTTransferAmount;
    }

    GetSumTransferByMasterEmailFromToDay_InBTC = (master_email, date_from, date_to) => {
        let totalBTCTTransferAmount = 0;
        if (this.transferList[master_email] != undefined) {
            /**
             @param {Transfer} transfer
             */
            this.transferList[master_email].forEach((transfer) => {

                //Something is wrong with the server time zone in values date_from, date_to, transfer Date
                let dateFromEndDay = new Date(date_from); //Calculateing the end of the day to catch the transfer that was made after the balance point was placed
                dateFromEndDay.setHours(dateFromEndDay.getHours() + 3); //To calculate correct time need to pluss 3 hours. Will be in moscow time
                // dateFromEndDay.setMinutes(59);
                // dateFromEndDay.setSeconds(59);
                let date_to_Moscow = new Date(date_to);
                date_to_Moscow.setHours(date_to_Moscow.getHours() + 3);

                if (transfer.date >= date_to && transfer.date <= date_from) {
                    totalBTCTTransferAmount += transfer.btcAmount;
                }

            })
        } else {
            console.log("Error while calculating the transfer sum + err:1125");
        }

        return totalBTCTTransferAmount;
    }


    GetCumulativeTransferForTheDayByMasterEmail(master_email, startDayTime) {
        console.log("try to calculate sum transfer");
        const transferList = this.transferList[master_email];
        const startTime = new Date(startDayTime);
        const endTime = new Date(new Date(startTime).setDate(startTime.getDate() + 1))


        let cumulativeTransfer = null;
        if (this.transferList[master_email] != undefined) {
            this.transferList[master_email].forEach((transfer) => {
                if (new Date(transfer.date) > startTime && new Date(transfer.date) < endTime) {
                    cumulativeTransfer += transfer.funds;
                }
            })
        }

        return Math.abs(cumulativeTransfer) > 0.01 ? cumulativeTransfer : null;

    }


    GetCumulativeTransferForTheDayByMasterEmail_InBTC(master_email, startDayTime) {
        console.log("try to calculate sum transfer");
        const transferList = this.transferList[master_email];
        const startTime = new Date(startDayTime);
        const endTime = new Date(new Date(startTime).setDate(startTime.getDate() + 1))


        let cumulativeTransfer = null;
        if (this.transferList[master_email] != undefined) {
            this.transferList[master_email].forEach((transfer) => {
                if (new Date(transfer.date) > startTime && new Date(transfer.date) < endTime) {
                    cumulativeTransfer += transfer.btcAmount;
                }
            })
        }

        return Math.abs(cumulativeTransfer) > 0.01 ? cumulativeTransfer : null;

    }
}


class Transfer {

    date;
    assetName;
    assetAmount;
    funds;
    btcAmount;
    userEmail;

    constructor(_transferRecord) {
        this.date = _transferRecord.date;
        this.userEmail = _transferRecord.email;
        this.assetName = _transferRecord.asset;
        this.assetAmount = _transferRecord.transfer_amount;
        this.btcAmount = _transferRecord.btc_transfer_ammount
        this.funds = _transferRecord.usdt_transfer_amount;
    }

    GetDate = () => {
        return date_handler.Format(this.date);
    }

    GetAssetName = () => {
        return this.assetName;
    }

    GetAssetAmount = () => {
        return this.assetAmount;
    }

    GetFunds = () => {
        return this.funds;
    }

    GetBTCFunds = () => {
        return this.btcAmount;
    }
}

transfer_loader = new TransferLoader();