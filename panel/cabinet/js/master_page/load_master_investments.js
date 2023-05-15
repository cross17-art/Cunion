class MasterInvestsLoader {

    master_total_investments = [];


    Init = async (masterID) => {
        this.master_total_investments = await this.LoadAllTotalInvestments(masterID);
        this.DisplayInvestments(this.master_total_investments);
    }


    LoadAllTotalInvestments = async (masterID) => {
        console.log("Load Master Investemts... ")
        let url = "https://cunion.io/panel/copy_server_api/kucoin/masters/get_master_investments.php?master-id=" + masterID;
        let result = await fetch(url).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("Total Investments", data);
            return data;
        }).catch((err) => {
            console.log("some error while LoadInvestments", err);
        })


        // {total_investment: data.masterInvestments.total_investment, followers_count:data.masterInvestments.followers_count,  masterBalance:data.masterLastBalance.balance};

        if(result.masterInvestments == null){
            return {total_investment: 0, followers_count:0,  masterBalance:result.masterLastBalance.balance}
        } else {
            return  {total_investment: result.masterInvestments.total_investment, followers_count:result.masterInvestments.followers_count,  masterBalance:result.masterLastBalance.balance};
        }
    }

    DisplayInvestments = (masterInvestments) => {
        console.log("Displaying investments")


            let totalInvestment = 0;
            let followers = 0;
            let masterBalance = masterInvestments.masterBalance;

            if(masterInvestments !== null){
                totalInvestment = masterInvestments.total_investment;
                followers = masterInvestments.followers_count;
            }

            let followerStatElem = document.querySelector("[users_count]") ;
            let investmentStatElem = document.querySelector("[total_investment]");

            followerStatElem.innerHTML = followers;

            let totalInvestLabel = 0;
            let totalSum = parseInt((parseFloat(totalInvestment) + parseFloat(masterBalance))*100)/100;
            if(totalSum < 500){
                totalInvestLabel = "<500";
            } else if(totalSum >= 500 && totalSum < 1000){
                totalInvestLabel = "<1000";
            } else if(totalSum > 1000 && totalSum < 5000){
                totalInvestLabel = "<5000";
            } else if(totalSum > 5000 && totalSum < 10000){
                totalInvestLabel = "<10000";
            } else if(totalSum > 10000){
                totalInvestLabel = ">10000";
            }


            investmentStatElem.innerHTML = '<i class="align-middle me-2 fas fa-fw fa-share-alt"></i>  ' + totalInvestLabel + " USDT";
            // document.querySelector("[statistics_loader]").style.display = "none";
            document.querySelectorAll('[statistic]').forEach((elem) => {
                elem.style.display = "block";
            })

    }
}

GetMasterIDFromURL = () => {
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString)
    return urlParams.get('master-id');
}

totalInvestLoader = new MasterInvestsLoader();
totalInvestLoader.Init(GetMasterIDFromURL());