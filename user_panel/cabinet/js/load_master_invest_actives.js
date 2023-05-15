class TotalInvestLoader {

    masters_total_investmens = [];


    Init = async () => {
        this.masters_total_investmens = await  this.LoadAllTotalInvestments();
        this.DisplayInvestments(this.masters_total_investmens);
    }


    LoadAllTotalInvestments = async () => {
        console.log("LoadAllTotalInvestments... ")
        let url = "https://cunion.io/client/copy_server_api/kucoin/get_total_masters_investments.php";
        let masterInvestments = await fetch(url).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("TotalInvestemnts", data);
            return data.masterTotalInvestments;
        }).catch((err) => {
            console.log("some error while LoadInvestments", err);
        })

        return masterInvestments;
    }

    DisplayInvestments = (masterInvestments) => {
        console.log("Displaying investments")

        masterInvestments.forEach((investment) => {
            let masterId = investment.master_id;
            let totalInvestment = investment.total_investment;
            let followers = investment.followers_count;

            let masterRow = document.querySelector("table[master-table] > tbody > tr[master-id='" + masterId + "']");
            let statistic_td = masterRow.querySelector("td[statistic]")
            let followerStatElem = statistic_td.querySelector("[users_count]") ;
            let investmentStatElem = statistic_td.querySelector("[total_investment]");

            followerStatElem.innerHTML = followers;
            investmentStatElem.innerHTML = '<i class="align-middle me-2 fas fa-fw fa-share-alt"></i>  ' + parseInt(totalInvestment*100)/100 + " USDT";
        })
    }

}

totalInvestLoader = new TotalInvestLoader();
totalInvestLoader.Init();