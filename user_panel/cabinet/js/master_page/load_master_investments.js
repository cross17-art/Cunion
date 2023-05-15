class MasterInvestsLoader {

    master_total_investments = [];


    Init = async (masterID) => {
        this.master_total_investments = await this.LoadAllTotalInvestments(masterID);
        this.DisplayInvestments(this.master_total_investments);
    }


    LoadAllTotalInvestments = async (masterID) => {
        console.log("Load Master Investemts... ")
        let url = "https://cunion.io/client/copy_server_api/kucoin/masters/get_master_investments.php?master-id=" + masterID;
        let masterInvestments = await fetch(url).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            console.log("Total Investments", data);
            return data.masterInvestments;
        }).catch((err) => {
            console.log("some error while LoadInvestments", err);
        })

        return masterInvestments;
    }

    DisplayInvestments = (masterInvestments) => {
        console.log("Displaying investments")


            let totalInvestment = 0;
            let followers = 0;

            if(masterInvestments !== null){
                totalInvestment = masterInvestments.total_investment;
                followers = masterInvestments.followers_count;
            }

            let followerStatElem = document.querySelector("[users_count]") ;
            let investmentStatElem = document.querySelector("[total_investment]");

            followerStatElem.innerHTML = followers;
            investmentStatElem.innerHTML = '<i class="align-middle me-2 fas fa-fw fa-share-alt"></i>  ' + parseInt(totalInvestment*100)/100 + " USDT";

            document.querySelector("[statistics_loader]").style.display = "none";
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