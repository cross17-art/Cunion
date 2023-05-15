class TotalInvestLoader {

    masters_total_investmens = [];
    master_last_balances = [];
    ResolvePromise;
    totalInvestmentsPromise = new Promise((resolve,reject) => {
        this.ResolvePromise = resolve;
    });

    Init = async () => {
        const result = await this.LoadAllTotalInvestments();
        this.masters_total_investmens = result.investments;
        this.master_last_balances = result.lastPoints;
        this.DisplayInvestments(this.masters_total_investmens, this.master_last_balances);
    }


    LoadAllTotalInvestments = async () => {
        console.log("LoadAllTotalInvestments... ")
        let url = "https://cunion.io/panel/copy_server_api/kucoin/get_total_masters_investments.php";
        let masterInvestments = await fetch(url).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("TotalInvestemnts", data);
            return {
                investments: data.masterTotalInvestments,
                lastPoints: data.masterLastBalances,
            };
        }).catch((err) => {
            console.log("some error while LoadInvestments", err);
        })

        return masterInvestments;
    }

    DisplayInvestments = (masterInvestments, lastPoints) => {
        console.log("Displaying investments")

        lastPoints.forEach((lastPoint) => {
            let masterId = lastPoint.master_id;
            const investRecord = totalInvestLoader.GetInvestmentsByMasterId(masterId);
            let totalInvestment = investRecord == undefined ? 0 : parseFloat(investRecord.total_investment);
            let followers = investRecord == undefined ? 0 : parseInt(investRecord.followers_count);
            let masterBalance = parseFloat(lastPoint.balance);

            let masterRow = document.querySelector("table[master-table] > tbody > tr[master-id='" + masterId + "']");
            if(masterRow != null){
                let statistic_td = masterRow.querySelector("td[statistic]")
                let followerStatElem = statistic_td.querySelector("[users_count]") ;
                let investmentStatElem = statistic_td.querySelector("[total_investment]");


                let totalInvestLabel = 0;
                let totalSum = parseInt((totalInvestment + masterBalance)*100)/100;
                if(totalSum < 500){
                    totalInvestLabel = "<500";
                } else if(totalSum > 500 && totalSum < 1000) {
                    totalInvestLabel = "<1000";
                } else if(totalSum > 1000 && totalSum < 5000){
                    totalInvestLabel = "<5000";
                } else if(totalSum > 5000 && totalSum < 10000){
                    totalInvestLabel = "<10000";
                } else if(totalSum > 10000){
                    totalInvestLabel = ">10000";
                }

                followerStatElem.innerHTML = followers;
                // investmentStatElem.innerHTML = '<i class="align-middle me-2 fas fa-fw fa-share-alt"></i>  ' + parseInt((totalInvestment + masterBalance)*100)/100 + " USDT";
                investmentStatElem.innerHTML = '<i class="align-middle me-2 fas fa-fw fa-share-alt"></i>  ' + totalInvestLabel + " USDT";
            }
        })

        this.ResolvePromise();

    }

    GetInvestmentsByMasterId(masterId) {
        return this.masters_total_investmens.find((masterInvestmentRecord) => {
            if(masterInvestmentRecord.master_id == masterId){
                return masterInvestmentRecord;
            }
        })
    }

    GetLastPointsByMasterId(masterId){
        return this.masters_total_investmens.find((masterLastBalancePointsRecord) => {
            if(masterLastBalancePointsRecord.master_id = masterId){
                return masterLastBalancePointsRecord;
            }
        })
    }
}

totalInvestLoader = new TotalInvestLoader();
totalInvestLoader.Init();